<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/user_area_inc.php');

// pagination
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$limit = $items_per_page;

if($page > 1) {
	$offset = ($page-1) * $limit + 1;
}

else {
	$offset = 1;
}

$page_url = "$baseurl/user/my-listings?page=";

// query ads, count total places for current user
$query = "SELECT COUNT(*) AS c FROM places
	WHERE status != 'trashed' AND userid = :userid";
$stmt = $conn->prepare($query);
$stmt->bindValue(':userid', $userid);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['c'];

// if user has places
if($total_rows > 0) {
	$pager = new DirectoryPlus\PageIterator($limit, $total_rows, $page);
	$start = $pager->getStartRow();

	$query = "SELECT p.place_id, p.place_name, p.slug AS place_slug, p.description, p.logo, p.submission_date, p.status,
				c.city_id, c.city_name, c.slug AS city_slug,
				s.state_name, s.slug AS state_slug,
				rel.cat_id,
				cats.name AS cat_name, cats.cat_slug, cats.id AS cat_id,
				ph.filename, ph.dir
				FROM places p
				LEFT JOIN cities c ON p.city_id = c.city_id
				LEFT JOIN states s ON c.state_id = s.state_id
				LEFT JOIN rel_place_cat rel ON rel.place_id = p.place_id
				LEFT JOIN cats ON rel.cat_id = cats.id
				LEFT JOIN photos ph ON p.place_id = ph.place_id
				WHERE p.userid = :userid AND p.status != 'trashed'
				GROUP BY p.place_id
				ORDER BY p.place_id DESC
				LIMIT :start, :limit";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':userid', $userid);
	$stmt->bindValue(':start', $start);
	$stmt->bindValue(':limit', $limit);
	$stmt->execute();

	$list_items = array();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$this_cat_id          = !empty($row['cat_id'         ]) ? $row['cat_id'         ] : '';
		$this_cat_slug        = !empty($row['cat_slug'       ]) ? $row['cat_slug'       ] : '';
		$this_city_id         = !empty($row['city_id'        ]) ? $row['city_id'        ] : null;
		$this_city_name       = !empty($row['city_name'      ]) ? $row['city_name'      ] : '';
		$this_city_slug       = !empty($row['city_slug'      ]) ? $row['city_slug'      ] : '';
		$this_description     = !empty($row['description'    ]) ? $row['description'    ] : '';
		$this_dir             = !empty($row['dir'            ]) ? $row['dir'            ] : '';
		$this_filename        = !empty($row['filename'       ]) ? $row['filename'       ] : '';
		$this_logo            = !empty($row['logo'           ]) ? $row['logo'           ] : '';
		$this_place_id        = !empty($row['place_id'       ]) ? $row['place_id'       ] : '';
		$this_place_name      = !empty($row['place_name'     ]) ? $row['place_name'     ] : '';
		$this_place_slug      = !empty($row['place_slug'     ]) ? $row['place_slug'     ] : 'slug';
		$this_state_id        = !empty($row['state_id'       ]) ? $row['state_id'       ] : null;
		$this_state_slug      = !empty($row['state_slug'     ]) ? $row['state_slug'     ] : '';
		$this_status          = !empty($row['status'         ]) ? $row['status'         ] : '';
		$this_submission_date = !empty($row['submission_date']) ? $row['submission_date'] : '';

		// sanitize
		$this_cat_slug        = e($this_cat_slug);
		$this_city_name       = e($this_city_name);
		$this_city_slug       = e($this_city_slug);
		$this_description     = e($this_description);
		$this_dir             = e($this_dir);
		$this_filename        = e($this_filename);
		$this_logo            = e($this_logo);
		$this_place_name      = e($this_place_name);
		$this_place_slug      = e($this_place_slug);
		$this_state_slug      = e($this_state_slug);
		$this_status          = e($this_status);
		$this_submission_date = e($this_submission_date);

		// listing link
		$this_listing_link = get_listing_link($this_place_id, $this_place_slug, $this_cat_id, $this_cat_slug, $this_city_id, $this_city_slug, $this_state_slug, $cfg_permalink_struct);

		// photo_url
		$this_photo_url = $baseurl . '/assets/imgs/blank.png';

		if(!empty($this_filename)) {
			if(file_exists("$pic_basepath/$place_thumb_folder/$this_dir/$this_filename")) {
				$this_photo_url = "$pic_baseurl/$place_thumb_folder/$this_dir/$this_filename";
			}
		}

		// logo
		if(!empty($this_logo)) {
			if(file_exists($pic_basepath . '/logo/' . substr($this_logo, 0, 2) . '/' . $this_logo)) {
				$this_photo_url = $pic_baseurl . '/logo/' . substr($this_logo, 0, 2) . '/' . $this_logo;
			}
		}

		// status
		$this_status = strtolower($this_status);

		// description
		if(!empty($this_description)) {
			$this_description = mb_substr($this_description, 0, 75) . '...';
		}

		$cur_loop_arr = array(
			'cat_slug'        => $this_cat_slug,
			'city_id'         => $this_city_id,
			'city_name'       => $this_city_name,
			'city_slug'       => $this_city_slug,
			'description'     => $this_description,
			'link_url'        => $this_listing_link,
			'photo_url'       => $this_photo_url,
			'place_id'        => $this_place_id,
			'place_name'      => $this_place_name,
			'place_slug'      => $this_place_slug,
			'state_id'        => $this_state_id,
			'state_slug'      => $this_state_slug,
			'status'          => $this_status,
			'submission_date' => $this_submission_date,
		);

		// add cur loop to places array
		$list_items[] = $cur_loop_arr;
	} // end while
}

// translation substitutions
$txt_html_title = str_replace('%site_name%', $site_name, $txt_html_title);

/*--------------------------------------------------
canonical
--------------------------------------------------*/
$canonical = $baseurl . '/user/my-listings';
