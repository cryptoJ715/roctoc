<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php');
require_once(__DIR__ . '/../sitemaps/sitemap-functions.php');

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

// listings details
$listing_id = !empty($_POST['place_id'  ]) ? $_POST['place_id'  ] : '';
$place_slug = !empty($_POST['place_slug']) ? $_POST['place_slug'] : '';
$cat_id     = !empty($_POST['cat_id'    ]) ? $_POST['cat_id'    ] : '';
$cat_slug   = !empty($_POST['cat_slug'  ]) ? $_POST['cat_slug'  ] : '';
$city_id    = !empty($_POST['city_id'   ]) ? $_POST['city_id'   ] : '';
$city_slug  = !empty($_POST['city_slug' ]) ? $_POST['city_slug' ] : '';
$state_slug = !empty($_POST['state_slug']) ? $_POST['state_slug'] : '';

// response array
$response = array();

// get paid status
$query = "SELECT paid FROM `places` where place_id = :place_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':place_id', $listing_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$paid = $row['paid'];

if($paid == 1){
	$query = "UPDATE places SET paid = 0 WHERE place_id= :place_id";
	$paid = 'unpaid';
}

else {
	$query = "UPDATE places SET paid = 1 WHERE place_id= :place_id";
	$paid = 'paid';
}

$stmt = $conn->prepare($query);
$stmt->bindValue(':place_id', $listing_id);
$stmt->execute();

// get status
$query = "SELECT status FROM `places` where place_id = :place_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':place_id', $listing_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$status = $row['status'];

// sitemaps
if($cfg_enable_sitemaps) {
	$link_url = get_listing_link($listing_id, $place_slug, $cat_id, $cat_slug, $city_id, $city_slug, $state_slug, $cfg_permalink_struct);

	if($status == 'approved' && $paid == 'paid'){
		if(!empty($link_url)) {
			sitemap_add_url($link_url);
		}
	}

	elseif($status == 'approved' && $paid == 'unpaid'){
		if(!empty($link_url)) {
			sitemap_remove_url($link_url);
		}
	}

	elseif($status == 'pending' && $paid == 'paid'){

	}

	else {
		// $status == 'pending' && $paid == 'unpaid'
	}
}

// response
$response['listing_id'] = $listing_id;
$response['place_slug'] = $place_slug;
$response['cat_id'    ] = $cat_id;
$response['cat_slug'  ] = $cat_slug;
$response['city_id'   ] = $city_id;
$response['city_slug' ] = $city_slug;
$response['state_slug'] = $state_slug;
$response['paid'      ] = $paid;

echo json_encode($response);