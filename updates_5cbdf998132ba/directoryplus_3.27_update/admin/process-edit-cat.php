<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/../inc/iso-639-1-native-names.php');
require_once(__DIR__ . '/_admin_inc.php');
require_once(__DIR__ . '/../inc/img-exts.php');
require_once(__DIR__ . '/../sitemaps/sitemap-functions.php');

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

// language
$query = "SELECT * FROM language WHERE lang = :lang AND section = :section AND template = :template";
$stmt = $conn->prepare($query);
$stmt->bindValue(':lang', $html_lang);
$stmt->bindValue(':section', 'admin');
$stmt->bindValue(':template', 'categories');
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	${$row['var_name']} = $row['translated'];
}

// cat details
$params = array();
parse_str($_POST['params'], $params);

$cat_id       = !empty($params['cat_id'      ]) ? $params['cat_id'      ] : '';
$cat_name     = !empty($params['cat_name'    ]) ? $params['cat_name'    ] : '';
$plural_name  = !empty($params['plural_name' ]) ? $params['plural_name' ] : '';
$cat_slug     = !empty($params['cat_slug'    ]) ? $params['cat_slug'    ] : '';
$cat_icon     = !empty($params['cat_icon'    ]) ? $params['cat_icon'    ] : '';
$cat_bg       = !empty($params['cat_bg'      ]) ? $params['cat_bg'      ] : '';
$cat_order    = !empty($params['cat_order'   ]) ? $params['cat_order'   ] : 0;
$cat_parent   = !empty($params['cat_parent'  ]) ? $params['cat_parent'  ] : 0;
$uploaded_img = !empty($params['uploaded_img']) ? $params['uploaded_img'] : '';
$cat_lang     = !empty($params['cat_lang'    ]) ? $params['cat_lang'    ] : array();

/*--------------------------------------------------
Original category link
--------------------------------------------------*/
$query = "SELECT cat_slug FROM cats WHERE id = :cat_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':cat_id', $cat_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$original_slug = !empty($row['cat_slug']) ? $row['cat_slug'] : '';
$original_cat_link = "$baseurl/$route_listings/$original_slug";

/*--------------------------------------------------
Category names translations
--------------------------------------------------*/
/*
type ---------- property(used for cat id) ---------- value
cat-lang ------ 1 ---------------------------------- en;café;cafés
*/

// delete previous values
$query = "DELETE FROM config WHERE type = 'cat-lang' AND property = :cat_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':cat_id', $cat_id);
$stmt->execute();

// process submitted values
if(!empty($cfg_languages) && is_array($cfg_languages) && !empty($cat_lang)) {
	foreach($cfg_languages as $v) {
		$value_string = "$v;";

		$cat_name_singular = '';
		if(!empty($cat_lang[$v])) {
			$cat_name_singular = $cat_lang[$v];
		}

		$cat_name_plural = '';
		if(!empty($cat_lang[$v . '_plural'])) {
			$cat_name_plural = $cat_lang[$v . '_plural'];
		}

		$value_string .= $cat_name_singular . ';' . $cat_name_plural;

		$query = "INSERT INTO config(type, property, value) VALUES ('cat-lang', :cat_id, :value_string)";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':cat_id', $cat_id);
		$stmt->bindValue(':value_string', $value_string);
		$stmt->execute();
	}
}

// trim
$cat_name     = trim($cat_name);
$plural_name  = trim($plural_name);
$cat_slug     = trim($cat_slug);
$cat_icon     = trim($cat_icon);
$cat_bg       = trim($cat_bg);
$cat_order    = trim($cat_order);
$cat_parent   = trim($cat_parent);
$uploaded_img = trim($uploaded_img);

// prepare vars
$cat_order  = is_numeric($cat_order) ? $cat_order : 0;
$cat_parent = is_numeric($cat_parent) ? $cat_parent : 0;

// cat slug
if(empty($cat_slug)) {
	$cat_slug = to_slug($cat_name);
}

if(!empty($cat_slug)) {
	// make sure cat_slug is unique
	$is_slug_unique = false;
	$count = 2;
	$new_cat_slug = $cat_slug;

	while(!$is_slug_unique) {
		$query = "SELECT COUNT(*) AS total_rows FROM cats WHERE cat_slug = :cat_slug AND id <> :cat_id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':cat_id', $cat_id);
		$stmt->bindValue(':cat_slug', $new_cat_slug);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if($row['total_rows'] == 0) {
			$is_slug_unique = true;
		}

		else {
			$new_cat_slug = $cat_slug . '-' . $count;
		}

		$count++;
	}

	// insert into db
	$query = "UPDATE cats SET
		name        = :name,
		plural_name = :plural_name,
		cat_slug    = :cat_slug,
		parent_id   = :parent_id,
		cat_icon    = :cat_icon,
		cat_bg      = :cat_bg,
		cat_order   = :cat_order
		WHERE id = :cat_id";

	$stmt = $conn->prepare($query);
	$stmt->bindValue(':name', $cat_name);
	$stmt->bindValue(':plural_name', $plural_name);
	$stmt->bindValue(':cat_slug', $new_cat_slug);
	$stmt->bindValue(':parent_id', $cat_parent);
	$stmt->bindValue(':cat_icon', $cat_icon);
	$stmt->bindValue(':cat_bg', $cat_bg);
	$stmt->bindValue(':cat_order', $cat_order);
	$stmt->bindValue(':cat_id', $cat_id);

	if($stmt->execute()) {
		echo $txt_cat_edited;

		// sitemap
		if($cfg_enable_sitemaps) {
			// remove old link
			sitemap_remove_url($original_cat_link);

			// add edited link
			$cat_link = $baseurl . '/'. $route_listings . '/' . $new_cat_slug;
			sitemap_add_url($cat_link);
		}
	}

	/*--------------------------------------------------
	Category image
	--------------------------------------------------*/

	// get extension of uploaded image
	if(!empty($uploaded_img)) {
		$img_tmp = $pic_basepath . '/category-tmp/' . $uploaded_img;
		$path_parts = pathinfo($img_tmp);
		$img_ext = $path_parts['extension'];

		// unlink previous image(s)
		foreach($img_exts as $k => $v) {
			if(is_file($pic_basepath . '/category/cat-' . $cat_id . '.' . $v)) {
				unlink($pic_basepath . '/category/cat-' . $cat_id . '.' . $v);
			}
		}

		// final destination
		$img_final = $pic_basepath . '/category/cat-' . $cat_id . '.' . $img_ext;

		if(is_file($img_tmp)) {
			if(copy($img_tmp, $img_final)) {
				unlink($img_tmp);
			}
		}
	}
}

else {
	echo $txt_cat_name_empty;
}