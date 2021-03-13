<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{   
  		$facebook = '';
		$twitter = '';
		$pinterest = '';
		$linkedin = '';
		$instagram = '';

  		$stmt = $db_con->prepare("SELECT * FROM social_links WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$count = $stmt->rowCount();
		$row = $stmt->fetchAll();
		foreach ($row as $key => $data)
		{
			$facebook = $data['facebook'];
			$twitter = $data['twitter'];
			$pinterest = $data['pinterest'];
			$linkedin = $data['linkedin'];
			$instagram = $data['instagram'];
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
	<title>Social Links</title>

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
							<h5 class="content-header-title float-left pr-1 mb-0">Update Social Links</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Update Social Links
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
						<div class="col-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-content">
											<div class="card-body">
											<form method="post" id="social_links" name="social_links">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="https://www.facebook.com" value='<?=($facebook)?"$facebook":""?>'>
					                        			<span class="text-danger" id="erfacebook"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Twitter</label>
                                                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="https://www.twitter.com" value='<?=($twitter)?"$twitter":""?>'>
					                        			<span class="text-danger" id="ertwitter"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Pinterest</label>
                                                        <input type="text" class="form-control" name="pinterest" id="pinterest" placeholder="https://www.pinterest.com" value='<?=($pinterest)?"$pinterest":""?>'>
					                        			<span class="text-danger" id="erpinterest"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>LinkedIn</label>
                                                        <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="https://www.linkedin.com" value='<?=($linkedin)?"$linkedin":""?>'>
					                        			<span class="text-danger" id="erlinkedin"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Instagram</label>
                                                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="https://www.instagram.com" value='<?=($instagram)?"$instagram":""?>'>
					                        			<span class="text-danger" id="erinstagram"></span>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                        changes</button>
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
<script type='text/javascript'>
	$(document).ready(function(){
		$('#social_links').submit(function(event) {
			event.preventDefault();
			for ( instance in CKEDITOR.instances ) {
				CKEDITOR.instances[instance].updateElement();
			}
			var form = $(this)
			var formData = new FormData($('form[name="social_links"]')[0]);
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
							url: "ajax/update-social-async.php",
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
									window.location="social_links.php";
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