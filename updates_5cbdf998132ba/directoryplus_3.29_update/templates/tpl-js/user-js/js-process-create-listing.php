<script>
<?php
if(!empty($mail_after_post)) {
	?>
	/*--------------------------------------------------
	Select2
	--------------------------------------------------*/
	(function() {
		var post_url = '<?= $baseurl ?>' + '/user/notify-admin.php';

		$.post(post_url, { from: "create", place_id: "<?= $place_id ?>", place_slug: "<?= $place_slug ?>", cat_id: "<?= $cat_id ?>", city_id: "<?= $city_id ?>" },
			function(data) {
				console.log(data);
			}
		);
	}());
	<?php
}
?>
</script>