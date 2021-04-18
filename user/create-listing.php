<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/user_area_inc.php');

/*--------------------------------------------------
Plans
--------------------------------------------------*/
$plan_id = (!empty($route[2])) ? $route[2] : '';

if(empty($plan_id)) {
	trigger_error("Invalid plan selection", E_USER_ERROR);
	die();
}
/*--------------------------------------------------
All categories array
--------------------------------------------------*/
$cats_arr = array();
$query = "SELECT * FROM cats WHERE cat_status = 1 ORDER BY plural_name";
$stmt = $conn->prepare($query);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$cur_loop_arr = array(
		'cat_id'      => $row['id'],
		'cat_name'    => $row['name'],
		'plural_name' => $row['plural_name'],
		'parent_id'   => $row['parent_id']
	);

	$cats_arr[] = $cur_loop_arr;
}

// group by parents
$cats_grouped_by_parent = group_cats_by_parent($cats_arr);

/*--------------------------------------------------
session to prevent multiple form submissions
--------------------------------------------------*/
$submit_token = uniqid('', true);
$_SESSION['submit_token'] = $submit_token;

// also set cookie in case session expires
$_COOKIE['submit_token'] = $submit_token;

/*--------------------------------------------------
Custom fields: Global fields
--------------------------------------------------*/

// init arrays
$custom_fields = array();
$custom_fields_ids = array();

// find global fields
$query = "SELECT f.*, tr.field_name AS tr_field_name, tr.tooltip AS tr_tooltip, tr.values_list AS tr_values_list
			FROM custom_fields f
			LEFT JOIN rel_cat_custom_fields rc ON f.field_id = rc.field_id
			LEFT JOIN translation_cf tr ON f.field_id = tr.field_id AND tr.lang = :html_lang
			WHERE rc.rel_id IS NULL AND field_status = 1
			ORDER BY f.field_order";

$stmt = $conn->prepare($query);
$stmt->bindValue(':html_lang', $html_lang);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$this_field_id    = !empty($row['field_id'   ]) ? $row['field_id'   ] : 0;
	$this_field_name  = !empty($row['field_name' ]) ? $row['field_name' ] : '';
	$this_field_type  = !empty($row['field_type' ]) ? $row['field_type' ] : 'text';
	$this_values_list = !empty($row['values_list']) ? $row['values_list'] : '';
	$this_tooltip     = !empty($row['tooltip'    ]) ? $row['tooltip'    ] : '';
	$this_icon        = !empty($row['icon'       ]) ? $row['icon'       ] : '';
	$this_required    = !empty($row['required'   ]) ? $row['required'   ] : 0;
	$this_searchable  = !empty($row['searchable' ]) ? $row['searchable' ] : 0;

	// required
	$this_required    = !empty($this_required) ? 'required' : '';

	// field translation values
	$this_tr_field_name  = !empty($row['tr_field_name' ]) ? $row['tr_field_name' ] : $this_field_name;
	$this_tr_tooltip     = !empty($row['tr_tooltip'    ]) ? $row['tr_tooltip'    ] : $this_tooltip;
	$this_tr_values_list = !empty($row['tr_values_list']) ? $row['tr_values_list'] : $this_values_list;

	// build array
	$custom_fields[] = array(
		'field_id'       => $this_field_id,
		'field_name'     => $this_field_name,
		'tr_field_name'  => $this_tr_field_name,
		'field_type'     => $this_field_type,
		'values_list'    => $this_values_list,
		'tr_values_list' => $this_tr_values_list,
		'tooltip'        => $this_tooltip,
		'tr_tooltip'     => $this_tr_tooltip,
		'icon'           => $this_icon,
		'required'       => $this_required,
		'searchable'     => $this_searchable,
		'field_value'    => '', // this is not used in create listing but required in get-custom-fields.php
	);

	$custom_fields_ids[] = $this_field_id;
}

if(!empty($custom_fields_ids)) {
	$custom_fields_ids = implode(',', $custom_fields_ids);
}

else {
	$custom_fields_ids = '';
}

/*--------------------------------------------------
canonical
--------------------------------------------------*/
$canonical = $baseurl . '/user/create-listing';

/*--------------------------------------------------
translations
--------------------------------------------------*/
$txt_html_title = str_replace('%site_name%', $site_name, $txt_html_title);
$txt_main_title = str_replace('%site_name%', $site_name, $txt_main_title);
