<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{   
  		$stmt = $db_con->prepare("SELECT * FROM reviews_detail WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$count = $stmt->rowCount();
		$row = $stmt->fetchAll();
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
	<title>Reviews</title>
	<link rel="stylesheet" type="text/css" href="app-assets/css/rating.css">
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
							<h5 class="content-header-title float-left pr-1 mb-0">Reviews</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Reviews
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
							        <span class="collapse-title">Add Reviews From Here</span>
							      </div>
							      <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
							        <div class="card-content">
							          <div class="card-body">
							            <form class="form form-vertical"  name="add_reviews" id="add_reviews" method="post">
						              <div class="form-body">
						                <div class="row">
					                    <div class="col-6" style="margin:auto;">
											<div class="rounded mr-75 col-12" id="preview_pic" style="width: 200px;height: auto;text-align:center">
											    <img src="http://www.webcoderskull.com/img/team4.png" alt="avatar" style="width: 150px;height: auto;">
											</div>
										</div>
										<div class="col-7" style="margin:auto;">
											<div id="profileImageBox" class="media-body mt-25">
    							                <input type="file" name="profile_pic" class="form-control-file" id="profileImageFile" accept="image/*" data-validation-callbacks=""/>
    											<p class="text-muted ml-1 mt-50 text-center"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
    							                <span id="erprofile_pic" style="color:red;"></span>
							                </div>
										</div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Customer Name</label>
						                      <input type="text" id="c_name" class="form-control" name="c_name"
						                        placeholder="Customer Name">
						                        <span class="text-danger" id="erc_name"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="question-vertical">Heading</label>
						                      <input type="text" id="heading" class="form-control" name="heading"
						                        placeholder="Heading">
						                        <span class="text-danger" id="erheading"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="answer-id-vertical">Review</label>
						                      <textarea class="ckeditor" cols="80" id="c_review" name="c_review" rows="10"></textarea>
						                      <span class="text-danger" id="erc_review"></span>
						                    </div>
						                  </div>
						                  <div class="col-12">
						                    <div class="form-group">
						                      	<label for="question-vertical">Rating</label>
						                      	<fieldset class="score">  
												  <input type="radio" id="score-5" name="score" value="5" />
												  <label title="5 stars" for="score-5">5 stars</label>
												  <input type="radio" id="score-4" name="score" value="4" />
												  <label title="4 stars" for="score-4">4 stars</label>
												  <input type="radio" id="score-3" name="score" value="3" />
												  <label title="3 stars" for="score-3">3 stars</label>
												  <input type="radio" id="score-2" name="score" value="2" />
												  <label title="2 stars" for="score-2">2 stars</label>
												  <input type="radio" id="score-1" name="score" value="1" />
												  <label title="1 stars" for="score-1">1 stars</label>
												</fieldset>
						                        <span class="text-danger" id="erscore"></span>
						                    </div>
						                  </div>
						                  <div class="col-12 d-flex justify-content-end">
						                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
						                  </div>
						                </div>
						              </div>
						            </form>
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
								<div class="card-content">
									<div class="card-body">
										<div class="table-responsive">
				                            <table class="table zero-configuration table-bordered">
				                                <thead>
				                                    <tr>
				                                        <th>Sr No.</th>
				                                        <th>Customer Name</th>
				                                        <th>Heading</th>
				                                        <th>Rating</th>
				                                        <th>Status</th>
				                                        <th>Action</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<?php
				                                		$i = 1;
				                                		if($count > 0)
				                                		{	                                	
														foreach ($row as $key => $data)
														{
															$review_id = $data['review_id'];
															$c_name = $data['c_name'];
															$heading = $data['heading'];
															$rating = $data['rating'];
															$status = $data['status'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td><?=$c_name?></td>
				                                        <td><?=$heading?></td>
				                                        <td>
				                                        	<div class="cu_star">
		                 										<ul>
																<?php 
																if($rating!="")
																{
																for($j=1; $j<=$rating; $j++)
																{
																?>
																<li><i class="bx bxs-star"></i></li>
																<?php
																}
																} 
																?>
																<?php if($rating==0){ ?>
																<?php
																for($j=1; $j<=5; $j++)
																{
																?>
																<li class="no_col"><i class="bx bxs-star"></i></li>
																<?php
																}
																?>
																<?php } ?>
																</ul>
															</div>
														</td>
				                                        <td><?=($status==0)?'<div class="badge badge-success mr-1 mb-1">Active</div>':'<div class="badge badge-danger mr-1 mb-1">In Active</div>'?></td>
				                                        <td>
				                                        	<button type="submit" class="btn btn-outline-success btn-sm  mr-1 mb-1 update_status" name="status" value="<?=$status?>" id="<?=$review_id?>">Update Status</button>
				                                        	<a href="edit_review.php?id=<?=$review_id?>" class="btn btn-outline-primary btn-sm  mr-1 mb-1">Edit</a>
				                                        	<button type="submit" class="btn btn-outline-danger btn-sm mr-1 mb-1 remove" name="delete" id="<?=$review_id?>">Delete</button>
				                                        </td>
				                                    </tr>
				                                <?php $i++; } } else { ?>
				                                	<tr>
				                                        <td colspan="6" class="text-center">No Reviews Available Yet!</td>
				                                    </tr>
				                                <?php }?>
				                            </table>
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
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#add_reviews').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="add_reviews"]')[0]);
				swal({
					type: 'warning',
					title: 'Are You Sure',
					showCancelButton: true,
					width: 400,
					confirmButtonText: 'Yes',
					showLoaderOnConfirm: true,
					preConfirm: function() {
						return new Promise(function(resolve) {
							$.ajax({
								url: "ajax/insert-reviews-async.php",
								method:'POST',
								data: formData,
								contentType: false,
								cache: false,
								processData:false,
								dataType: 'json',
								success: function (jSon) {
									if (jSon.status == 'success') {
										swal({
											type: 'success',
											text: jSon.msg,
											showConfirmButton: false,
											timer:1500,
											showConfirmButton: false
										});
										window.location="reviews.php";
									}
									else if (jSon.status == 'error') {
										ALSP.f.fade_msg(jSon.msg,'error');
										$.each(jSon.data, function(index, val) {
											$(index).html(val);
										})
									} else {
										swal(jSon.msg);
										setTimeout(function(){
										// window.location.reload();
										},1000);
									}
								},
								error: function()
								{
									swal('Something Went Wrong!');
								}
							});
						})
					},
					allowOutsideClick: function () {
						!swal.isLoading()
					}
				}).catch(swal.noop);
			});
		});
	</script>
	<script type="text/javascript">
		$(".update_status").click(function(){
			var id = $(this).attr("id");
			var status = $(this).attr("value");
			swal({
				type: 'warning',
				title: "Are you sure?",
				text: "You Want to Update this!",
				showCancelButton: true,
				width: 400,
				confirmButtonText: 'Yes',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: "ajax/update-review-status-async.php",
							method:'POST',
							data: {id:id,status:status},
							dataType: 'json',
							success: function (jSon)
							{
								if (jSon.status == 'success')
								{
									swal("Status Changed!", jSon.msg, "success");
									setTimeout(function(){
										window.location.reload();
									},1000);
								}
								else if (jSon.status == 'error') {
									swal("Cancelled", "jSon.msg", "error");
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
					})
				},
				allowOutsideClick: function () {
					!swal.isLoading()
				}
			}).catch(swal.noop);
		});
	</script>
	<script type="text/javascript">
		$(".remove").click(function(){
			var id = $(this).attr("id");
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
						$.ajax({
							url: "ajax/delete-review-async.php",
							method:'POST',
							data: {id:id},
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
									swal("Cancelled", "jSon.msg", "error");
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
					})
				},
				allowOutsideClick: function () {
					!swal.isLoading()
				}
			}).catch(swal.noop);
		});
	</script>
		<script>
    	$('#profileImageFile').change(function(e) {
    		var input = this;
    		var _URL = window.URL || window.webkitURL;
    		img = new Image();
    		var fileType = input.files[0];
    		var ext=fileType['type'];
    		if ($.inArray(ext.toLowerCase(), ['image/jpg', 'image/jpeg', 'image/png']) == -1) {
    			$('#profileImageFile').val('')
    			$('#preview_pic').html('')
    			swal(" Please select a valid file jpeg, jpg, png type allowed .");
    		}else{
    			img.src = _URL.createObjectURL(input.files[0]);
    			img.onload = function () {
    				var w = this.width;
    				var h = this.height;
    				if (input.files && input.files[0]) {
    					if ((input.files[0].size) < (Math.pow(Math.pow(2,10),2) * 8)  && (w<=413 && h<=531)) {
    						var reader = new FileReader();
    						reader.onload = function (e) {
    							$('#preview_pic').html($('<img/>',{
    								src: e.target.result,
    								width: '100%',
    								height: '100%'
    							}))
    							var delete_icon ='<div id="profileImageFile__Name" class="text-center">'
    							+'<a href="javascript:;" class="btn btn-sm btn btn_text_white plain_red" id="profileImageFile__Delete"><i class="fa fa-trash icon_p_rt5" aria-hidden="true"></i>Remove Image</a>'
    							+'</div>'
    							$('#profileImageFileInstruction').hide()
    							$('#profileImageBox').hide().after(delete_icon)
    						};
    						reader.readAsDataURL(input.files[0]);
    					} else {
    						$('#profileImageFile').val('')
    						$('#preview_pic').html('')
    						swal("The file is larger than the permitted size.");
    					}
    				} else {
    					swal("Image not uploaded");
    					$('#profileImageFile').val('')
    					$('#preview_pic').html('')
    				}
    			};
    		}
    	});
    	// Remove choosen image
    	$('body').on('click', '#profileImageFile__Delete', function(){
    		$('#profileImageFile').val('')
    		$('#preview_pic').html('')
    		$(this).parents('#profileImageFile__Name').remove()
    		$('#profileImageFileInstruction').show()
    		$('#profileImageBox').show()
    	});
    </script>
</body>
</html>