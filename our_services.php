<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM services WHERE user_id=:user_id");  
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
	<title>Programs</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Programs</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Programs
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
						<div class="col-4">
							<div class="card">
					        <div class="card-header">
					          <h4 class="card-title">Add Programs From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					            <form class="form form-vertical" name="our_services" id="our_services" method="post">
					              <div class="form-body">
					                <div class="row">
					                    <div class="col-12">
											<div class="rounded mr-75 col-12" id="preview_pic" style="width: auto;height: auto;text-align:center">
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
					                        <label for="name-vertical">Department Name</label>
					                        <input type="text" id="name" class="form-control" name="service_name" placeholder="Service Name">
					                        <span class="text-danger" id="erservice_name"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="name-vertical">Program Name</label>
					                        <input type="text" id="program_name" class="form-control" name="program_name" placeholder="Program Name">
					                        <span class="text-danger" id="program_name"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="name-vertical">Course Name</label>
					                        <input type="text" id="category_name" class="form-control" name="category_name" placeholder="Courses Name">
					                        <span class="text-danger" id="category_name"></span>
					                    </div>
					                  </div>
					                  
						                  <div class="col-12">
						                    <div class="form-group">
						                      <label for="answer-id-vertical">Description</label>
						                      <textarea class="ckeditor" cols="80" id="description" name="description" rows="10"></textarea>
						                      <span class="text-danger" id="erdescription"></span>
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
						<div class="col-8">
							<div class="card">
								<div class="card-content">
									<div class="card-body">
										<div class="table-responsive">
				                            <table class="table zero-configuration table-bordered">
				                                <thead>
				                                    <tr>
				                                        <th>Sr No.</th>
				                                        <th> Program Name</th>
				                                        <th> Courses Name</th>
				                                        <th>Department Name</th>
				                                        <th>Program Image</th>
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
															$service_id = $data['service_id'];
															$program_name= $data['program_name'];
															$category_name= $data['category_name'];
															$service_name = $data['service_name'];
															$service_image = $data['service_image'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td><?=$program_name?></td>
				                                        <td><?=$category_name?></td>
				                                        <td><?=$service_name?></td>
				                                        <td><?=($service_image)?"<img src='../uploads/our_services/$service_image' alt='Service Image' style='width:150px;height:auto;'/>":"No Image Available!"?></td>
				                                        <td>
				                                        	<a href="edit_service.php?id=<?=$service_id?>" class="btn btn-outline-primary btn-sm mr-1 mb-1">Edit</a>
				                                        	<button type="submit" class="btn btn-outline-danger btn-sm mr-1 mb-1 remove" name="delete" id="<?=$service_id?>">Delete</button>
				                                        </td>
				                                    </tr>
				                                    <?php $i++; } } else { ?>
				                                	<tr>
				                                        <td colspan="7" class="text-center">No Program Available Yet!</td>
				                                    </tr>
				                                    <?php }?>
				                                    </tbody>
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
    					if ((input.files[0].size) < (Math.pow(Math.pow(2,10),2) * 8)) {
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
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#our_services').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData(this);
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
								url: "ajax/insert-service-async.php",
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
										window.location="our_services.php";
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
							url: "ajax/delete-service-async.php",
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
</body>
</html>