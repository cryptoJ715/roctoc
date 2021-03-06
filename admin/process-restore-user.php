<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php');

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

$restore_user_id = (!empty($_POST['restore_user_id'])) ? $_POST['restore_user_id'] : 0;

// update status
if(!empty($restore_user_id)) {
	$query = "UPDATE users SET status = 'approved' WHERE id = :restore_user_id";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':restore_user_id', $restore_user_id);
	$stmt->execute();
}
