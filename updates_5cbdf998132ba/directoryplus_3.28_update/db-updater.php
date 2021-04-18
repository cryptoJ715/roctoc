<?php
// prevent direct access
if (!isset($version)) {
	http_response_code(403);
	exit;
}

/*--------------------------------------------------
check v.3.12 update
--------------------------------------------------*/

// if 'rel_favorites' table doesn't exist, update to v.3.12
$query = "SELECT count(*) AS c FROM information_schema.TABLES WHERE (TABLE_SCHEMA = '$db_name') AND (TABLE_NAME = 'rel_favorites')";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($row['c'] < 1) {
	$sql = file_get_contents('sql/directoryplus_3.12_update.sql');

	$sql = explode(";\n", $sql);

	try {

		// begin transaction
		$conn->beginTransaction();

		foreach($sql as $k => $v) {
			try {
				$v = trim($v);

				if(!empty($v)) {
					$stmt = $conn->prepare($v);
					$stmt->execute();
				}
			}

			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}

		// commit
		$conn->commit();
	}

	catch(PDOException $e) {
		$conn->rollBack();
		$result_message =  $e->getMessage();

		echo $result_message;
	}
}

/*--------------------------------------------------
check v.3.13 update
--------------------------------------------------*/

// if 'plan_types' table doesn't exist, update to v.3.13
$query = "SELECT count(*) AS c FROM information_schema.TABLES WHERE (TABLE_SCHEMA = '$db_name') AND (TABLE_NAME = 'plan_types')";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($row['c'] < 1) {
	$sql = file_get_contents('sql/directoryplus_3.13_update.sql');

	$sql = explode(";\n", $sql);

	try {

		// begin transaction
		$conn->beginTransaction();

		foreach($sql as $k => $v) {
			try {
				$v = trim($v);

				if(!empty($v)) {
					$stmt = $conn->prepare($v);
					$stmt->execute();
				}
			}

			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}

		// commit
		$conn->commit();
	}

	catch(PDOException $e) {
		$conn->rollBack();
		$result_message =  $e->getMessage();

		echo $result_message;
	}
}

/*--------------------------------------------------
check v.3.21 update
--------------------------------------------------*/

// if 'language' table doesn't exist, update to v.3.21
$query = "SELECT count(*) AS c FROM information_schema.TABLES WHERE (TABLE_SCHEMA = '$db_name') AND (TABLE_NAME = 'language')";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($row['c'] < 1) {
	$sql = file_get_contents('sql/directoryplus_3.21_update.sql');

	$sql = explode(";\n", $sql);

	try {

		// begin transaction
		$conn->beginTransaction();

		foreach($sql as $k => $v) {
			try {
				$v = trim($v);

				if(!empty($v)) {
					$stmt = $conn->prepare($v);
					$stmt->execute();
				}
			}

			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}

		// commit
		$conn->commit();
	}

	catch(PDOException $e) {
		$conn->rollBack();
		$result_message =  $e->getMessage();

		echo $result_message;
	}
}

/*--------------------------------------------------
check v.3.22 update
--------------------------------------------------*/

$query = "UPDATE language SET translated='Please submit the form again' WHERE var_name='txt_submit_again' AND translated LIKE '%//localhost%'";
$stmt  = $conn->prepare($query);
$stmt->execute();

$query = "DELETE FROM language WHERE var_name='baseurl'";
$stmt  = $conn->prepare($query);
$stmt->execute();

/*--------------------------------------------------
check v.3.25 update
--------------------------------------------------*/

// if 'translation_cf' table doesn't exist, update to v.3.25
$query = "SELECT count(*) AS c FROM information_schema.TABLES WHERE (TABLE_SCHEMA = '$db_name') AND (TABLE_NAME = 'translation_cf')";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['c'] < 1) {
	$sql = file_get_contents('sql/directoryplus_3.25_update.sql');

	$sql = explode(";\n", $sql);

	try {

		// begin transaction
		$conn->beginTransaction();

		foreach($sql as $k => $v) {
			try {
				$v = trim($v);

				if(!empty($v)) {
					$stmt = $conn->prepare($v);
					$stmt->execute();
				}
			}

			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}

		// commit
		$conn->commit();
	}

	catch(PDOException $e) {
		$conn->rollBack();
		$result_message =  $e->getMessage();

		echo $result_message;
	}
}

/*--------------------------------------------------
check v.3.27 update
--------------------------------------------------*/

$query = "SELECT count(*) AS c FROM language WHERE var_name = 'txt_permalink_struct'";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['c'] < 1) {
	$sql = file_get_contents('sql/directoryplus_3.27_update.sql');

	$sql = explode(";\n", $sql);

	try {

		// begin transaction
		$conn->beginTransaction();

		foreach($sql as $k => $v) {
			try {
				$v = trim($v);

				if(!empty($v)) {
					$stmt = $conn->prepare($v);
					$stmt->execute();
				}
			}

			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}

		// add new txt strings for other languages


		// commit
		$conn->commit();
	}

	catch(PDOException $e) {
		$conn->rollBack();
		$result_message =  $e->getMessage();

		echo $result_message;
	}
}

/*--------------------------------------------------
check v.3.28 update
--------------------------------------------------*/
$query = "SELECT count(*) AS c FROM language WHERE var_name = 'txt_create_string' AND lang <> 'en'";
$stmt  = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['c'] < 1) {
	$lang_arr = array();

	$query = "SELECT DISTINCT lang FROM language WHERE lang <> 'en'";
	$stmt  = $conn->prepare($query);
	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$lang_arr[] = $row['lang'];
	}

	foreach($lang_arr as $v) {
		$query = "INSERT INTO `language` (`lang`, `section`, `template`, `var_name`, `translated`) VALUES
('$v', 'admin', 'language', 'txt_create_string', 'Create String'),
('$v', 'admin', 'language', 'txt_var_name', 'Variable Name (starts with txt_ e.g. txt_var_name)'),
('$v', 'admin', 'language', 'txt_string_value', 'String Value'),
('$v', 'admin', 'language', 'txt_string_created', 'String Created'),
('$v', 'admin', 'admin-global', 'txt_maps', 'Maps'),
('$v', 'admin', 'settings', 'txt_permalink_struct', 'Permalink Structure (*regenerate sitemap after change)'),
('$v', 'admin', 'settings', 'txt_permalink_struct_explain', 'Available tags(use / as separator): %category%/%region%/%city%/%title%');";
		$stmt  = $conn->prepare($query);
		$stmt->execute();
	}
}
