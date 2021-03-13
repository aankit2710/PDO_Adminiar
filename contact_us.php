<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{   
  		$content = '';
		$phone_number = '';
		$extra_phone_number = '';
		$email_address = '';
		$extra_email_address = '';
		$address = '';
		$lattitude = '';
		$longitude = '';
		$fax = '';

  		$stmt = $db_con->prepare("SELECT * FROM contact_details WHERE user_id=:user_id");  
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$count = $stmt->rowCount();
		$row = $stmt->fetchAll();
		foreach ($row as $key => $data)
		{
			$content = $data['content'];
			$phone_number = $data['phone_number'];
			$extra_phone_number = $data['extra_phone_number'];
			$email_address = $data['email_address'];
			$extra_email_address = $data['extra_email_address'];
			$address = $data['address'];
			$lattitude = $data['lattitude'];
			$longitude = $data['longitude'];
			$fax = $data['fax'];
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
	<title>Contact Details</title>

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
							<h5 class="content-header-title float-left pr-1 mb-0">Contact Details</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Contact Details
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
											<form method="post" id="contact_us" name="contact_us">
												<div class="row">
													<div class="col-4">
														<div class="form-group">
															<div class="controls">
																<label>Phone Number</label>
																<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value='<?=($phone_number)?"$phone_number":""?>'>
					                        					<span class="text-danger" id="erphone"></span>
															</div>
														</div>
													</div>
													<div class="col-4">
														<div class="form-group">
															<div class="controls">
																<label>Extra Phone Number</label>
																<input type="text" class="form-control" name="extra_phone" placeholder="Enter Phone Number" value='<?=($extra_phone_number)?"$extra_phone_number":""?>'>
					                        					<span class="text-danger" id="erextra_phone"></span>
															</div>
														</div>
													</div>
													<div class="col-4">
														<div class="form-group">
															<div class="controls">
																<label>Fax</label>
																<input type="text" class="form-control" name="fax" placeholder="Enter Fax" value='<?=($fax)?"$fax":""?>'>
					                        					<span class="text-danger" id="erfax"></span>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Email</label>
																<input type="email" class="form-control" name="email" placeholder="Enter Email Address" value='<?=($email_address)?"$email_address":""?>'>
					                        					<span class="text-danger" id="eremail"></span>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Extra Email</label>
																<input type="email" class="form-control" name="extra_email" placeholder="Enter Email Address" value='<?=($extra_email_address)?"$extra_email_address":""?>'>
					                        					<span class="text-danger" id="erextra_email"></span>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label>Address</label>
															<input type="text" class="form-control" name="address" placeholder="Enter Address" value='<?=($address)?"$address":""?>'>
					                        				<span class="text-danger" id="eraddress"></span>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Lattitude</label>
															<input type="text" class="form-control" name="lattitude" placeholder="Enter Lattitude" value='<?=($lattitude)?"$lattitude":""?>'>
					                        				<span class="text-danger" id="erlattitude"></span>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Longitude</label>
															<input type="text" class="form-control" name="longitude" placeholder="Enter Longitude" value='<?=($longitude)?"$longitude":""?>'>
					                        				<span class="text-danger" id="erlongitude"></span>
														</div>
													</div>
									                <div class="col-12">
									                    <div class="form-group">
									                      <label for="about-content-1-vertical">Content</label>
									                      <textarea class="ckeditor" cols="80" id="content" name="content" rows="10"><?=($content)?"$content":""?></textarea>
									                      <span class="text-danger" id="ercontent"></span>
									                    </div>
									                </div>
													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save changes</button>
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
		$('#contact_us').submit(function(event) {
			event.preventDefault();
			for ( instance in CKEDITOR.instances ) {
				CKEDITOR.instances[instance].updateElement();
			}
			var form = $(this)
			var formData = new FormData($('form[name="contact_us"]')[0]);
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
							url: "ajax/update-contact-async.php",
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
									window.location="contact_us.php";
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