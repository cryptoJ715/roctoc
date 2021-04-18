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

			<!-- search -->
			<div class="mb-3">
				<form class="form-search-place form-inline d-flex flex-nowrap" action="<?= $baseurl ?>/admin/listings" method="get">
					<div class="form-group mr-1">
						<input type="text" name="s" class="form-control form-control-sm"
						value="<?= !empty($_GET['s']) ? e($_GET['s']) : '' ?>">
					</div>

					<div class="form-group mr-1">
						<select name="cat" class="form-control form-control-sm">
							<option value=""><?= $txt_category ?></option>
							<?php get_children(0, $cat_id, 0, $conn) ?>
						</select>
					</div>

					<div class="form-group">
						<button class="btn btn-sm btn-primary"><?= $txt_search ?></button>
					</div>
				</form>
			</div>

			<?php
			$s_param = '';
			if(!empty($_GET['s'])) {
				$s_param = "&s=" . $_GET['s'];
				?>
				<p><?= $txt_search_results ?> <em>'<?= e($_GET['s']) ?>'</em></p>
				<?php
			}
			?>

			<div class="mb-3">
				<strong><?= $txt_sort ?>:</strong><br>
				<a href="<?= $baseurl ?>/admin/listings?sort=name<?= $s_param ?>" class="btn btn-light btn-sm"><?= $txt_by_name ?></a>
				<a href="<?= $baseurl ?>/admin/listings?sort=date<?= $s_param ?>" class="btn btn-light btn-sm"><?= $txt_by_date ?></a>
				<a href="<?= $baseurl ?>/admin/listings?sort=pending<?= $s_param ?>" class="btn btn-light btn-sm"><?= $txt_pending ?></a>
			</div>

			<div class="d-flex">
				<div class="flex-grow-1"><?= $txt_total_rows ?>: <strong><?= $total_rows ?></strong></div>
				<div class=""><a href="<?= $baseurl ?>/admin/listings-trash"><?= $txt_trash ?></a></div>
			</div>

			<!-- results -->
			<?php
			if($total_rows > 0) {
				?>
				<div class="table-responsive">
					<table class="table admin-table table-striped">
						<tr>
							<th><?= $txt_id ?></th>
							<th style="width:320px;"><?= $txt_place_name ?></th>
							<th><?= $txt_city ?></th>
							<th><?= $txt_date ?></th>
							<th><?= $txt_action ?></th>
						</tr>

						<?php
						foreach($places_arr as $k => $v) {
							?>
							<tr id="tr-place-id-<?= $v['place_id'] ?>">
								<td><?= $v['place_id'] ?></td>

								<td><a href="<?= $v['link_url'] ?>" title="<?= $v['place_name'] ?>"><?= $v['place_name'] ?></a></td>

								<td class="text-nowrap">
									<?= !empty($v['city_name']) ? $v['city_name'] . ', ' . $v['state_abbr'] : '' ?>
								</td>
								<td class="text-nowrap"><?= $v['date_formatted'] ?></td>
								<td class="text-nowrap">
									<!-- status btn -->
									<?php
									if($v['status'] == 'pending') {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_approved ?>">
											<button class="btn btn-light btn-sm approve-place"
												id="status-place-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-place_slug="<?= $v['place_slug'] ?>"
												data-cat_id="<?= $v['cat_id'] ?>"
												data-cat_slug="<?= $v['cat_slug'] ?>"
												data-city_id="<?= $v['city_id'] ?>"
												data-city_slug="<?= $v['city_slug'] ?>"
												data-state_slug="<?= $v['state_slug'] ?>"
												data-status="pending">
												<i class="fas fa-toggle-off"></i>
											</button>
										</span>
										<?php
									}
									else {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_approved ?>">
											<button class="btn btn-success btn-sm approve-place"
												id="status-place-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-place_slug="<?= $v['place_slug'] ?>"
												data-cat_id="<?= $v['cat_id'] ?>"
												data-cat_slug="<?= $v['cat_slug'] ?>"
												data-city_id="<?= $v['city_id'] ?>"
												data-city_slug="<?= $v['city_slug'] ?>"
												data-state_slug="<?= $v['state_slug'] ?>"
												data-status="approved">
												<i class="fas fa-toggle-on"></i>
											</button>
										</span>
										<?php
									}
									?>

									<!-- paid btn -->
									<?php
									if($v['paid'] == 0) {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_paid ?>">
											<button class="btn btn-light btn-sm paid-place"
												id="paid-place-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-place_slug="<?= $v['place_slug'] ?>"
												data-cat_id="<?= $v['cat_id'] ?>"
												data-cat_slug="<?= $v['cat_slug'] ?>"
												data-city_id="<?= $v['city_id'] ?>"
												data-city_slug="<?= $v['city_slug'] ?>"
												data-state_slug="<?= $v['state_slug'] ?>"
												data-paid="unpaid">
												<i class="fas fa-dollar-sign"></i>
											</button>
										</span>
										<?php
									}
									else {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_paid ?>">
											<button class="btn btn-success btn-sm paid-place"
												id="paid-place-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-place_slug="<?= $v['place_slug'] ?>"
												data-cat_id="<?= $v['cat_id'] ?>"
												data-cat_slug="<?= $v['cat_slug'] ?>"
												data-city_id="<?= $v['city_id'] ?>"
												data-city_slug="<?= $v['city_slug'] ?>"
												data-state_slug="<?= $v['state_slug'] ?>"
												data-paid="paid">
												<i class="fas fa-dollar-sign"></i>
											</button>
										</span>
										<?php
									}
									?>

									<!-- featured_home toggle -->
									<?php
									if($v['feat_home'] == 0) {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_featured ?>">
											<button class="btn btn-light btn-sm featured-home"
												id="featured-home-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-featured-home="not_featured">
												<i class="fas fa-home"></i>
											</button>
										</span>
										<?php
									}
									else {
										?>
										<span data-toggle="tooltip"	title="<?= $txt_toggle_featured ?>">
											<button class="btn btn-success btn-sm featured-home"
												id="featured-home-<?= $v['place_id'] ?>"
												data-place-id="<?= $v['place_id'] ?>"
												data-featured-home="featured">
												<i class="fas fa-home"></i>
											</button>
										</span>
										<?php
									}
									?>

									<!-- edit btn -->
									<span data-toggle="tooltip"	title="<?= $txt_edit_place ?>">
										<a href="<?= $baseurl ?>/user/edit-listing/<?= $v['place_id'] ?>"
											class="btn btn-light btn-sm edit-place"
											data-id="<?= $v['place_id'] ?>">
											<i class="fas fa-pencil-alt"></i>
										</a>
									</span>

									<!-- expand btn -->
									<span data-toggle="tooltip" title="<?= $txt_tooltip_expand ?>">
										<button class="btn btn-light btn-sm expand-details"
											data-place-id="<?= $v['place_id'] ?>">
											<i class="fas fa-expand"></i>
										</button>
									</span>

									<!-- remove btn -->
									<span data-toggle="tooltip"	title="<?= $txt_remove_place ?>">
										<button class="btn btn-light btn-sm"
											data-toggle="modal"
											data-target="#remove-place-modal"
											data-place-id="<?= $v['place_id'] ?>"
											data-place_slug="<?= $v['place_slug'] ?>"
											data-cat_id="<?= $v['cat_id'] ?>"
											data-cat_slug="<?= $v['cat_slug'] ?>"
											data-city_id="<?= $v['city_id'] ?>"
											data-city_slug="<?= $v['city_slug'] ?>"
											data-state_slug="<?= $v['state_slug'] ?>">
											<i class="far fa-trash-alt"></i>
										</button>
									</span>
								</td>
							</tr>
							<tr id="expand-details-<?= $v['place_id'] ?>" class="details-row" style="display:none">
								<td colspan="5" class="wrap">
									<div class="details-block">
										<div class="">
											<strong><?= $txt_listing_owner ?>:</strong>
											<span class="owner-email"><?= $v['place_email'] ?></span>

											<strong><?= $txt_transfer_owner ?></strong>

											<span class="btn btn-sm btn-light" id="activator-owner-<?= $v['place_id'] ?>">
												<i class="fas fa-pencil-alt"></i>
											</span>
											<div class="editable"
												data-url="<?= $baseurl ?>/admin/process-edit-owner.php"
												data-activator="#activator-owner-<?= $v['place_id'] ?>"
												data-attribute="owner"
												data-object="<?= $v['place_id'] ?>">
												<?= $v['place_owner'] ?>
											</div>
										</div>

										<div class="">
											<strong><?= $txt_city ?>:</strong>
											<?= !empty($v['city_name']) ? $v['city_name'] . ', ' . $v['state_abbr'] : '' ?>
										</div>

										<div class="">
											<strong><?= $txt_plan_name ?>:</strong>
											<?= $v['plan_name'] ?>
										</div>
										<div class="">
											<strong><?= $txt_category ?>:</strong>
											<?= $v['cat_name'] ?>
										</div>
									</div>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>

				<nav>
					<ul class="pagination flex-wrap">
						<?php
						if($total_rows > 0) {
							include_once(__DIR__ . '/../../inc/pagination.php');
						}
						?>
					</ul>
				</nav>
			<?php
			}

			else {
				?>
				<div class="mt-5 mb-3">
					<?= $txt_no_results ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>

<!-- Modal Remove Place -->
<div class="modal fade" id="remove-place-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 id="modal-title1" class="modal-title"><?= $txt_remove_place ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= $txt_remove_warn ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal"><?= $txt_cancel ?></button>

				<button class="btn btn-primary btn-sm remove-place" data-remove-id data-place_slug data-cat_id data-cat_slug data-city_id data-city_slug data-state_slug><?= $txt_remove_place ?></button>
			</div>
		</div>
	</div>
</div>

<!-- admin footer -->
<?php require_once(__DIR__ . '/admin-footer.php') ?>

<!-- javascript -->
<script>
(function(){
	// hide all details
	//$('.details-row').hide();

	// when remove listing modal shows
	$('#remove-place-modal').on('show.bs.modal', function(event) {
		var button     = $(event.relatedTarget);
		var modal      = $(this);

		// listing data
		var place_id   = button.data('place-id');
		var place_slug = button.data('place_slug');
		var cat_id     = button.data('cat_id');
		var cat_slug   = button.data('cat_slug');
		var city_id    = button.data('city_id');
		var city_slug  = button.data('city_slug');
		var state_slug = button.data('state_slug');

		// attach data to the remove button
		modal.find('.remove-place').attr('data-remove-id', place_id);
		modal.find('.remove-place').attr('data-place_slug', place_slug);
		modal.find('.remove-place').attr('data-cat_id', cat_id);
		modal.find('.remove-place').attr('data-cat_slug', cat_slug);
		modal.find('.remove-place').attr('data-city_id', city_id);
		modal.find('.remove-place').attr('data-city_slug', city_slug);
		modal.find('.remove-place').attr('data-state_slug', state_slug);
	});

	// when remove button in modal clicked
    $('.remove-place').on('click', function(e){
		e.preventDefault();

		// listing data
		var button     = $('.remove-place');
		var place_id   = button.data('remove-id');
		var place_slug = button.data('place_slug');
		var cat_id     = button.data('cat_id');
		var cat_slug   = button.data('cat_slug');
		var city_id    = button.data('city_id');
		var city_slug  = button.data('city_slug');
		var state_slug = button.data('state_slug');

		// send ajax post
		var post_url   = '<?= $baseurl ?>' + '/admin/process-remove-listing.php';

		$.post(post_url, {
			place_id  : place_id,
			place_slug: place_slug,
			cat_id    : cat_id,
			cat_slug  : cat_slug,
			city_id   : city_id,
			city_slug : city_slug,
			state_slug: state_slug,
			})
			.done(function(data) {
				// log
				console.log(data);

				// reload
				var modal = $('#remove-place-modal');
				modal.find('.modal-body').empty();
				modal.find('.modal-body').html(data).fadeIn();
				location.reload(true);
			});
    });

	// after removing and clicking the close button on the modal, reload
	$('#remove-place-modal').on('hide.bs.modal', function (event) {
		//location.reload(true);
	});

	// toggle place status
	$('.approve-place').on('click', function(e) {
		e.preventDefault();

		// listing data
		var place_id   = $(this).data('place-id');
		var place_slug = $(this).data('place_slug');
		var cat_id     = $(this).data('cat_id');
		var cat_slug   = $(this).data('cat_slug');
		var city_id    = $(this).data('city_id');
		var city_slug  = $(this).data('city_slug');
		var state_slug = $(this).data('state_slug');
		var status     = $(this).data('status');

		// send ajax post
		var post_url = '<?= $baseurl ?>' + '/admin/process-approve-place.php';

		$.post(post_url, {
			place_id  : place_id,
			place_slug: place_slug,
			cat_id    : cat_id,
			cat_slug  : cat_slug,
			city_id   : city_id,
			city_slug : city_slug,
			state_slug: state_slug,
			status    : status,
			},
			function(data) {
				// log
				console.log(data);

				// parse json
				var data = JSON.parse(data);

				// toggle button
				if(data.status == 'approved') {
					$('#status-place-' + place_id).removeClass('btn-light');
					$('#status-place-' + place_id).addClass('btn-success');
					$('#status-place-' + place_id + ' i').removeClass('fa-toggle-off');
					$('#status-place-' + place_id + ' i').addClass('fa-toggle-on');
					$('#status-place-' + place_id).data('status', 'approved');
				}
				if(data.status == 'pending') {
					$('#status-place-' + place_id).removeClass('btn-success');
					$('#status-place-' + place_id).addClass('btn-light');
					$('#status-place-' + place_id + ' i').removeClass('fa-toggle-on');
					$('#status-place-' + place_id + ' i').addClass('fa-toggle-off');
					$('#status-place-' + place_id).data('status', 'pending');
				}
			}
		);
	});

	// paid place switch
	$('.paid-place').on('click', function(e) {
		e.preventDefault();

		// listing data
		var place_id   = $(this).data('place-id');
		var place_slug = $(this).data('place_slug');
		var cat_id     = $(this).data('cat_id');
		var cat_slug   = $(this).data('cat_slug');
		var city_id    = $(this).data('city_id');
		var city_slug  = $(this).data('city_slug');
		var state_slug = $(this).data('state_slug');
		var paid       = $(this).data('paid');

		// send ajax post
		var post_url = '<?= $baseurl ?>' + '/admin/process-toggle-paid.php';

		$.post(post_url, {
			place_id  : place_id,
			place_slug: place_slug,
			cat_id    : cat_id,
			cat_slug  : cat_slug,
			city_id   : city_id,
			city_slug : city_slug,
			state_slug: state_slug,
			paid      : paid,
			},
			function(data) {
				// log
				console.log(data);

				// parse json
				var data = JSON.parse(data);

				if(data.paid == 'unpaid') {
					$('#paid-place-' + place_id).removeClass('btn-success');
					$('#paid-place-' + place_id).addClass('btn-light');
					$('#paid-place-' + place_id).data('paid', 'unpaid');
				}
				if(data.paid == 'paid') {
					$('#paid-place-' + place_id).removeClass('btn-light');
					$('#paid-place-' + place_id).addClass('btn-success');
					$('#paid-place-' + place_id).data('paid', 'paid');
				}
			}
		);
	});

	// featured home switch
	$('.featured-home').on('click', function(e) {
		e.preventDefault();
		var place_id = $(this).data('place-id');
		var featured_home = $(this).data('featured-home');
		var post_url = '<?= $baseurl ?>' + '/admin/process-toggle-featured-home.php';

		$.post(post_url, {
			place_id: place_id,
			featured_home: featured_home
			},
			function(data) {
				if(data == 'not_featured') {
					$('#featured-home-' + place_id).removeClass('btn-success');
					$('#featured-home-' + place_id).addClass('btn-light');
					$('#featured-home-' + place_id).data('featured-home', 'not_featured');
				}
				if(data == 'featured') {
					$('#featured-home-' + place_id).removeClass('btn-light');
					$('#featured-home-' + place_id).addClass('btn-success');
					$('#featured-home-' + place_id).data('featured-home', 'featured');
				}
			}
		);
	});

	// expand details
	$('.expand-details').on('click', function(e) {
		e.preventDefault();
		var place_id = $(this).data('place-id');
		$('#expand-details-' + place_id).toggle();

	});

	// initialize edit in place
	$('.editable').jinplace()
		.on('jinplace:done', function(ev, data) {
			var post_url = '<?= $baseurl ?>' + '/admin/process-edit-owner.php';
			$.post(post_url, { owner: data, attribute: 'update-email' },
				function(data) {
					$('.owner-email').html(data);
				}
			);
    });
}());
</script>

</body>
</html>