<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
try
{
	$stmt = $db_con->prepare("SELECT * FROM slider_images WHERE user_id=:user_id order by img_order ASC");
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->execute();
	$images = $stmt->fetchAll();
	$count = $stmt->rowCount();
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="author" content="">
	<title>Slider Images</title>
	<link rel="stylesheet" type="text/css" href="app-assets/dropzone/dropzone.css">
	<link rel="stylesheet" type="text/css" href="app-assets/css/images.css">
	<?php require_once('includes/admin_header.php');?>
	<?php require_once('includes/admin_topbar.php');?>
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-12 mb-2 mt-1">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h5 class="content-header-title float-left pr-1 mb-0">Slider Images</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Slider Images
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body">
				<section class="page-user-profile">
					<div class="row">
						<div class="col-6" style="margin:auto;">
							<div class="accordion" id="accordionWrapa1">
								<div class="card collapse-header">
									<div id="heading1" class="card-header text-center" role="tablist" data-toggle="collapse" data-target="#accordion1"
									aria-expanded="false" aria-controls="accordion1">
									<span class="collapse-title">Add/Update Slider Images From Here</span>
								</div>
								<div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
									<div class="card-content">
										<div class="card-body">
											<div class="dropzone dz-clickable" id="myDrop">
												<div class="dz-default dz-message" data-dz-message="">
													<span>Drop files here to upload</span>
												</div>
											</div>
											<input type="button" id="add_file" value="Add" class="btn btn-primary mt-3">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Uploaded Slider Images</h4>
								<hr/>
							</div>
							<div class="card-content">
								<div class="card-body">
									<?php if($count > 0){?>
										<div id="msg" class="mb-3"></div>
										<a href="javascript:void(0);" class="btn btn-outline-primary reorder" id="updateReorder">Reorder Imgaes</a>
										<a href="javascript:void(0);" class="btn btn-outline-primary" id="select_all">Select All Images</a>
										<a href="javascript:void(0);" class="btn btn-outline-primary" id="delete_records">Delete Selected Images <span class="rows_selected badge badge-pill badge-danger" id="select_count"></span></a>
										<div id="reorder-msg" class="alert alert-warning mt-3" style="display:none;">
											<i class="fa fa-3x fa-exclamation-triangle float-right"></i> 1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.
										</div>
									<?php } ?>
									<div class="row myorder" style="margin-top:20px;">
										<?php
										if($count > 0)
										{
											foreach($images as $row)
											{
												?>
												<div class="col-md-3" id="image_li_<?php echo $row['slider_id']; ?>" data-id="<?php echo $row['slider_id']; ?>" class="ui-sortable-handle mr-2 mt-2">
													<a href="javascript:void(0);" class="img-link">
														<img src="../uploads/slider_images/<?php echo $row['img_name']; ?>" alt="" class="img-fluid" style="width: 100%;height:250px;">
													</a>
													<div class="img_dt">
														<input type="text" class="ext_txt" name="caption" placeholder="Text" data-id="<?php echo $row['slider_id']; ?>" value="<?php echo html_entity_decode($row['caption']) ;?>" />
														<div class="deleteCheck_box">
															<input type="checkbox" class="delete_image" data-image-id="<?php echo $row['slider_id'];?>" />
														</div>
													</div>
													<div class="secondBox_in">
														<input type="text" class="ext_txt" data-id="<?php echo $row['slider_id']; ?>" name="ext_txt" value="<?php echo html_entity_decode($row['ext_txt']) ;?>" placeholder="Extra Text"/>
													</div>
													<div class="secondBox_in">
														<input type="text" class="ext_txt" data-id="<?php echo $row['slider_id']; ?>" name="ext_txt_line" value="<?php echo html_entity_decode($row['ext_txt_line']) ;?>" placeholder="Extra Text Line"/>
													</div>
												</div>
												<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!-- END: Content-->
<?php require_once('includes/admin_footer.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="app-assets/dropzone/dropzone.js"></script>
<script>
	var $ = jQuery.noConflict();
	Dropzone.autoDiscover = false;
	$(document).ready(function(){
		$('.reorder').on('click',function(){
			$("div.myorder").sortable({ tolerance: 'pointer' });
			$('.reorder').html('Save Reordering');
			$('.reorder').attr("id","updateReorder");
			$('#reorder-msg').slideDown('');
			$('.img-link').attr("href","javascript:;");
			$('.img-link').css("cursor","move");
			$("#updateReorder").click(function( e ){
				if(!$("#updateReorder i").length){
					$(this).html('').prepend('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
					$("div.myorder").sortable('destroy');
					$("#reorder-msg").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
					var h = [];
				// 	$("div.myorder div").each(function() {  h.push($(this).attr('id').substr(9));  });
					$("div.myorder div").each(function() {  h.push($(this).attr('data-id'));  });
					$.ajax({
						type: "POST",
						url: "ajax/update-slider-image-order.php",
						data: {ids: " " + h + ""},
						success: function(data){
							if(data==1 || parseInt(data)==1)
							{
								swal({
									type: 'success',
									text: "Changed Successfully!",
									showConfirmButton: false,
									timer:1500,
									showConfirmButton: false
								});
								window.location.reload();
							}
						}
					});
					return false;
				}
				e.preventDefault();
			});
		});
		
		$(function() {
			$("#myDrop").sortable({
				items: '.dz-preview',
				cursor: 'move',
				opacity: 0.5,
				containment: '#myDrop',
				distance: 20,
				tolerance: 'pointer',
			});
			$("#myDrop").disableSelection();
		});
		
			//Dropzone script
			Dropzone.autoDiscover = false;
			
			var myDropzone = new Dropzone("div#myDrop",
			{
				paramName: "files", // The name that will be used to transfer the file
				addRemoveLinks: true,
				uploadMultiple: true,
				autoProcessQueue: false,
				parallelUploads: 50,
				maxFilesize: 5, // MB
				acceptedFiles: ".png, .jpeg, .jpg, .gif",
				url: "ajax/insert-slider-image.php",
			});
			
			myDropzone.on("sending", function(file, xhr, formData) {
				var filenames = [];
				$('.dz-preview .dz-filename').each(function() {
					filenames.push($(this).find('span').text());
				});
				formData.append('filenames', filenames);
			});
			
			/* Add Files Script*/
			myDropzone.on("success", function(jSon){
				if (jSon.status == 'success')
				{
					swal({
						type: 'success',
						text: jSon.msg,
						showConfirmButton: false,
						timer:1500,
						showConfirmButton: false
					});
					window.location="slider.php";
				}
				else if (jSon.status == 'error')
				{
					ALSP.f.fade_msg(jSon.msg,'error');
					$.each(jSon.data, function(index, val) {
						$(index).html(val);
					})
				}
				else
				{
					swal(jSon.msg);
					setTimeout(function(){
					// window.location.reload();
				},1000);
				}
			});
			
			myDropzone.on("error", function (data) {
				swal('Something Went Wrong!');
			});
			
			myDropzone.on("complete", function(file) {
				myDropzone.removeFile(file);
			});
			
			$("#add_file").on("click",function (){
				myDropzone.processQueue();
			});
		});
	</script>
	<script type="text/javascript">
		$(".ext_txt").change(function(){
			var txt = $(this).attr('name');
			var caption = $(this).val();
			var id = $(this).attr('data-id');
			
			$.ajax({
				url: "ajax/update-caption-slider-image-async.php",
				method:'POST',
				data: {caption:caption,txt:txt,id:id},
				dataType: 'json',
				success: function (jSon)
				{
					if (jSon.status == 'success')
					{
						swal({
							type: 'success',
							text: jSon.msg,
							showConfirmButton: false,
							timer:1500,
							showConfirmButton: false
						});
						window.location="slider.php";
					}
					else if (jSon.status == 'error')
					{
						ALSP.f.fade_msg(jSon.msg,'error');
						$.each(jSon.data, function(index, val) {
							$(index).html(val);
						})
					}
					else
					{
						swal(jSon.msg);
						setTimeout(function(){
									// window.location.reload();
								},1000);
					}
				},
				error: function()
				{
					swal('Something is wrong');
				}
			});
		});
	</script>
	<script>
		$('document').ready(function() {
		// select all checkbox
		$(document).on('click', '#select_all', function() {
			$(".delete_image").prop("checked", this.click);
			$("#select_count").html($("input.delete_image:checked").length+" Selected");
		});
		$(document).on('click', '.delete_image', function() {
			if ($('.delete_image:checked').length == $('.delete_image').length) {
				$('#select_all').prop('checked', true);
			} else {
				$('#select_all').prop('checked', false);
			}
			$("#select_count").html($("input.delete_image:checked").length+" Selected");
		});
	// delete selected records
		// 	jQuery('#delete_records').on('click', function(e) {
				// 		var images = [];
				// 		$(".delete_image:checked").each(function() {
						// 			images.push($(this).data('image-id'));
					// 		});
				// 		if(images.length <=0)  {
						// 			swal("Please select records.");
				// 		}
					// 		else {
						// 			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(images.length>1?"these":"this")+" row?";
						// 			var checked = confirm(WRN_PROFILE_DELETE);
									// 			if(checked == true) {
								// 				var selected_values = images.join(",");
								// 				$.ajax({
										// 					type: "POST",
										// 					url: "ajax/delete-slider-async.php",
										// 					cache:false,
										// 					data: 'image_id='+selected_values,
											// 					success: function(response) {
												// 						// remove deleted images rows
												// 						var emp_ids = response.split(",");
																		// 						for (var i=0; i<emp_ids.length; i++ ) {
														// 							$("#"+emp_ids[i]).remove();
																						// 						}
										// 					}
												// 				});
						// 			}
				// 		}
		// 	});
		$("#delete_records").click(function(){
			var images = [];
			$(".delete_image:checked").each(function() {
				images.push($(this).data('image-id'));
			});
			swal({
				type: 'warning',
				title: "Are you sure?",
				text: "You will not be able to recover this!",
				showCancelButton: true,
				width: 400,
				confirmButtonText: 'Yes',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						if(images.length <=0){
							swal("Please select records.");
						}
						else
						{
							var selected_values = images.join(",");
							$.ajax({
								url: "ajax/delete-slider-image-async.php",
								cache:false,
								method:'POST',
								data: {image_id:selected_values},
								dataType: 'json',
								success: function (jSon)
								{
									if (jSon.status == 'success')
									{
										swal("Deleted!", jSon.msg, "success");
										setTimeout(function(){
											window.location.reload();
										},1000);
									}
									else if (jSon.status == 'error') {
										swal("Cancelled", jSon.msg, "error");
										setTimeout(function(){
											window.location.reload();
										},1000);
									}
									else
									{
										swal(jSon.msg);
										setTimeout(function(){
											window.location.reload();
										},1000);
									}
								},
								error: function()
								{
									swal('Something is wrong');
								}
							});
						}
					})
				},
				allowOutsideClick: function () {
					!swal.isLoading()
				}
			}).catch(swal.noop);
		});
	});
</script>
</body>
</html>