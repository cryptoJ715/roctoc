<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="<?= $html_lang ?>"> <![endif]-->
<html lang="<?= $html_lang ?>">
<head>
<title><?= $txt_html_title ?></title>
<?php require_once(__DIR__ . '/admin-head.php') ?>
</head>
<body class="tpl-admin-<?= $route[1] ?>">
<?php require_once(__DIR__ . '/../header.php') ?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-4 col-lg-3 mb-5">
			<?php include_once('admin-menu.php') ?>
		</div>

		<div class="col-md-8 col-lg-9">
			<h2 class="mb-5"><?= $txt_main_title ?></h2>


		<div class="mb-3">
			<?php
			if(!empty($templates_arr)) {
				?>
				<div class="table-responsive">
					<table class="table admin-table">
						<tr>
							<th><?= $txt_type ?></th>
							<th><?= $txt_subject ?></th>
							<th><?= $txt_description ?></th>
							<th><?= $txt_action ?></th>
						</tr>
						<?php
						foreach($templates_arr as $k => $v) {
							?>
							<tr id="template-<?= $v['template_id'] ?>">
								<td><?= $v['template_type'] ?></td>
								<td><?= $v['template_subject'] ?></td>
								<td><?= $v['template_description'] ?></td>
								<td class="text-nowrap">
									<span id="edit-template-<?= $v['template_id'] ?>" data-toggle="tooltip" title="<?= $txt_edit_template ?>">
										<button class="btn btn-light btn-sm edit-template-btn"
											data-template-id="<?= $v['template_id'] ?>"
											data-toggle="modal"
											data-target="#edit-template-modal">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</td>
							</tr>
						<?php
						}
					?>
					</table>
				</div>
				<?php
			}
			else {
				?>
				<p><?= $txt_no_templates ?></p>
				<?php
			}
			?>
		</div>
	</div>
</div>

<!-- Modal edit email template -->
<div class="modal fade" id="edit-template-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title1" class="modal-title"><?= $txt_edit_template ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" id="btn-dismiss" class="btn btn-light btn-sm" data-dismiss="modal"><?= $txt_cancel ?></button>
				<button id="edit-template-submit" class="btn btn-primary btn-sm"><?= $txt_save ?></button>
			</div>
		</div>
	</div>
</div>

<!-- admin-footer -->
<?php require_once(__DIR__ . '/admin-footer.php') ?>

<!-- javascript -->
<script>
(function(){
	// show edit email template modal
	$('#edit-template-modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var template_id = button.data('template-id');
		var modal = $(this);

		// reinitialize buttons if needed
		$('#edit-template-submit').show();
		$('#btn-dismiss').empty().append('cancel');

		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		var post_url = '<?= $baseurl ?>' + '/admin/get-email-template.php';

		$.post(post_url, { template_id: template_id },
			function(data) {
				modal.find('.modal-body').html(data);
			}
		);
	});

	// submit edit plan modal
    $('#edit-template-submit').on('click', function(e){
		e.preventDefault();
		var post_url = '<?= $baseurl ?>' + '/admin/process-edit-email-template.php';

		$.post(post_url, {
			params: $('form.form-edit-email-template').serialize(),
			},
			function(data) {
				$('.modal-body').empty().html(data);
				$('#edit-template-submit').hide();
				$('#btn-dismiss').empty().append('ok');
			}
		);
    });

	// edit cat modal on close
	$('#edit-template-modal').on('hide.bs.modal', function (event) {
		location.reload(true);
	});
}());
</script>

</body>
</html>