<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{   
  		$stmt = $db_con->prepare("SELECT * FROM profile_details inner join user_login on profile_details.user_id = user_login.user_id WHERE profile_details.user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$count = $stmt->rowCount();
		$row = $stmt->fetchAll();
		foreach ($row as $key => $data)
		{
			$username = $data['username'];
			$profile_name = $data['profile_name'];
			$about_me = $data['about_me'];
			$company_name = $data['company_name'];
			$website_name = $data['website_name'];
			$profile_pic = $data['profile_pic'];
		}
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
	<title>Update Profile</title>

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
							<h5 class="content-header-title float-left pr-1 mb-0">Update Profile</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Update Profile
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body"><!-- account setting page start -->
				<section id="page-account-settings">
					<div class="row">
						<div class="col-6" style="margin:auto;">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-content">
											<div class="card-body">
											<form method="post" id="update_profile" name="update_profile">
												<div class="row">
													<div class="col-12">														
														<div class="col-6" style="margin:auto;">
															<div class="rounded mr-75 col-12" id="preview_pic" style="width: 200px;height: 200px;text-align:center">
																<img src='<?=($profile_pic)?"../uploads/profile/$profile_pic":"app-assets/images/user-image.jpg"?>' app-assets/images/user-image.jpgclass="img-responsive" alt="avatar" style="width: 150px;height: auto;">
															</div>
															<div id="profileImageBox" class="media-body mt-25 col-12">
							                                    <input type="file" name="profile_pic" class="form-control-file" id="profileImageFile" accept="image/*" data-validation-callbacks=""/>
																<p class="text-muted ml-1 mt-50 text-center"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
							                                    <span id="erprofile_pic" style="color:red;"></span>
							                                </div>
														</div>
														<hr>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Username</label>
																<input type="text" class="form-control" name="username" placeholder="admin@gmail.com" value='<?=($username)?"$username":""?>'>
																<span class="text-danger" id="erusername"></span>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Name</label>
																<input type="text" class="form-control" name="name" placeholder="Hermione Granger" value='<?=($profile_name)?"$profile_name":""?>'>
																<span class="text-danger" id="ername"></span>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label>About Me</label>
																<textarea class="ckeditor" cols="80" id="aboutcontent1" name="aboutcontent1" rows="10"><?=($about_me)?"$about_me":""?></textarea>
                                		  						<span class="text-danger" id="eraboutcontent1"></span>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Company</label>
															<input type="text" class="form-control" name="company_name" placeholder="Company name" value='<?=($company_name)?"$company_name":""?>'>
															<span class="text-danger" id="ercompany_name"></span>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Website</label>
															<input type="text" class="form-control" name="website" placeholder="Website address" value='<?=($website_name)?"$website_name":""?>'>
															<span class="text-danger" id="erwebsite"></span>
														</div>
													</div>
													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save Changes</button>
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
			</section>
			<!-- account setting page ends -->
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
					if ((input.files[0].size) < (Math.pow(Math.pow(2,10),2) * 8)  && (w<=413 && h<=531)) {
						var reader = new FileReader();
						reader.onload = function (e) {
							$('#preview_pic').html($('<img/>',{
								src: e.target.result,
								width: '100%',
								height: '100%'
							}))
							var delete_icon ='<div id="profileImageFile__Name">'
							+'<a href="javascript:;" class="btn btn-sm btn btn_text_white plain_red" id="profileImageFile__Delete"><i class="fa fa-trash icon_p_rt5" aria-hidden="true"></i>Remove Image</a>'
							+'</div>'
							$('#profileImageFileInstruction').hide()
							$('#profileImageBox').hide().after(delete_icon)
						};
						reader.readAsDataURL(input.files[0]);
					} else {
						$('#profileImageFile').val('')
						$('#preview_pic').html('')
						swal(" The file you are attempting to upload is wrong format or larger than the permitted size.");
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
		$('#update_profile').submit(function(event) {
			event.preventDefault();
			for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
			var form = $(this)
			var formData = new FormData($('form[name="update_profile"]')[0]);
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
							url: "ajax/update-profile-async.php",
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
									window.location="update_profile.php";
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
</body>
</html>