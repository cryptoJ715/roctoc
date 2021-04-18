<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php');

// pagination
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$limit = $items_per_page;

if($page > 1) {
	$offset = ($page-1) * $limit + 1;
}

else {
	$offset = 1;
}

$page_url = "$baseurl/admin/plans-trash?page=";

// get plans in trash
$query = "SELECT COUNT(*) AS c FROM plans WHERE plan_status = -1";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['c'];

if($total_rows > 0) {
	$pager = new DirectoryPlus\PageIterator($limit, $total_rows, $page);
	$start = $pager->getStartRow();

	// the query
	$query = "SELECT * FROM plans WHERE plan_status = -1 ORDER BY plan_order LIMIT :start, :limit";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':start', $start);
	$stmt->bindValue(':limit', $limit);
	$stmt->execute();

	$plans_arr = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$plan_id     = !empty($row['plan_id'    ]) ? $row['plan_id'    ] : '';
		$plan_type   = !empty($row['plan_type'  ]) ? $row['plan_type'  ] : '';
		$plan_name   = !empty($row['plan_name'  ]) ? $row['plan_name'  ] : '';
		$plan_price  = !empty($row['plan_price' ]) ? $row['plan_price' ] : '';
		$plan_status = !empty($row['plan_status']) ? $row['plan_status'] : '';

		// sanitize
		$plan_name = e($plan_name);

		$cur_arr = array(
				'plan_id'     => $plan_id,
				'plan_type'   => $plan_type,
				'plan_name'   => $plan_name,
				'plan_price'  => $plan_price,
				'plan_status' => $plan_status,
		);

		$plans_arr[] = $cur_arr;
	}
}