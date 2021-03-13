<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
$id = $_GET['id'];
try
{

	$stmt = $db_con->prepare("SELECT * FROM our_team WHERE user_id=:user_id AND member_id = :id");  
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);      
	$stmt->execute();
	$count = $stmt->rowCount();
	if($count == 0)
	{
		echo '<script>alert("Member Is Not existed!");window.location="our_team.php"</script>';
	}

	$row = $stmt->fetchAll();
	foreach ($row as $key => $data)
	{
		$member_id = $data['member_id'];
		$name = $data['member_name'];
		$email = $data['member_email'];
		$phone = $data['member_phone'];
		$designation = $data['member_designation'];
		$pic = $data['member_pic'];
		$description = $data['description'];
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
	<title>Edit Team Details</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Edit Team Details</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Edit Team Details
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
							<div class="card">
					        <div class="card-header">
					          <h4 class="card-title">Update Team Details From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					            <form class="form form-vertical" name="our_team" id="our_team" method="post">
					              <div class="form-body">
					                <div class="row">
					                    <div class="col-6" style="margin:auto;">
											<div class="rounded mr-75" id="preview_pic" style="text-align:center">
											    <img src='<?=($pic)?"../uploads/team/$pic":"http://www.webcoderskull.com/img/team4.png"?>' alt="avatar" style="width: 150px;height: auto;">
											</div>
										</div>
										<div class="col-7" style="margin:auto;">
											<div id="profileImageBox" class="media-body mt-25">
    							                <input type="file" name="profile_pic" class="form-control-file" id="profileImageFile" value="<?=$pic?>" accept="image/*" data-validation-callbacks=""/>
    											<p class="text-muted ml-1 mt-50 text-center"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
    							                <span id="erprofile_pic" style="color:red;"></span>
							                </div>
										</div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="name-vertical">Name</label>
					                        <input type="text" id="name" class="form-control" name="name" value="<?=$name?>">
					                        <span class="text-danger" id="ername"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="email-id-vertical">Email</label>
					                        <input type="text" id="email" class="form-control" name="email" value="<?=$email?>">
					                        <span class="text-danger" id="eremail"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="phone-id-vertical">Phone</label>
					                        <input type="text" id="phone" class="form-control" name="phone" value="<?=$phone?>">
					                        <span class="text-danger" id="erphone"></span>
					                    </div>
					                  </div>
					                  <div class="col-12">
					                    <div class="form-group">
					                        <label for="designation-id-vertical">Designation</label>
					                        <input type="text" id="designation" class="form-control" name="designation" value="<?=$designation?>">
					                        <span class="text-danger" id="erdesignation"></span>
					                    </div>
						                <input type="hidden" name="member_id" value="<?=$member_id?>">
					                  </div>
					                  <div class="col-12">
						                <div class="form-group">
						                    <label for="answer-id-vertical">Description</label>
						                    <textarea class="ckeditor" cols="80" id="description" name="description" rows="10"><?=$description?></textarea>
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
			$('#our_team').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="our_team"]')[0]);
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
								url: "ajax/update-team-async.php",
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
										window.location="our_team.php";
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