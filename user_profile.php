<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>Profile</title>
    
    <?php require_once('includes/admin_header.php');?>
    <?php require_once('includes/admin_topbar.php');?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- page user profile start -->
<section class="page-user-profile">
  <div class="row">
    <div class="col-12">
      <!-- user profile heading section start -->
      <div class="card">
        <div class="card-content">
          <div class="user-profile-images">
            <!-- user timeline image -->
            <img src="https://live.staticflickr.com/4034/4568156310_1114fc1e00_z.jpg" class="img-fluid rounded-top user-timeline-image" alt="user timeline image" style="width:100%;height:250px;">
            <!-- user profile image -->
            <img src="<?=($admin_pic)?"../uploads/profile/$admin_pic":"app-assets/images/user-image.jpg"?>" class="user-profile-image rounded"
              alt="user profile image" height="140" width="140">
          </div>
          <div class="user-profile-text">
            <h4 class="mb-0 text-bold-500 profile-text-color"><?=$admin_name?></h4>
            <small>Admin</small>
          </div>
          <!-- user profile nav tabs start -->
          <div class="card-body px-0">
            <ul
              class="nav user-profile-nav justify-content-center justify-content-md-start nav-tabs border-bottom-0 mb-0"
              role="tablist">
              <li class="nav-item pb-0">
                <a class="nav-link d-flex px-1 active" id="profile-tab" data-toggle="tab" href="#profile"
                  aria-controls="profile" role="tab" aria-selected="false"><i class="bx bx-copy-alt"></i><span
                    class="d-none d-md-block"> Profile</span></a>
              </li>
              <li class="nav-item pb-0">
                <a class=" nav-link d-flex px-1" id="contact-tab" data-toggle="tab" href="#contact"
                  aria-controls="contact" role="tab" aria-selected="true"><i class="bx bx-home"></i><span
                    class="d-none d-md-block"> Contact Details</span></a>
              </li>
              <li class="nav-item pb-0">
                <a class="nav-link d-flex px-1" id="social-tab" data-toggle="tab" href="#social"
                  aria-controls="social" role="tab" aria-selected="false"><i class="bx bx-user"></i><span
                    class="d-none d-md-block"> Social Media Details</span></a>
              </li>
            </ul>
          </div>
          <!-- user profile nav tabs ends -->
        </div>
      </div>
      <!-- user profile heading section ends -->

      <!-- user profile content section start -->
      <div class="row">
        <!-- user profile nav tabs content start -->
        <div class="col-lg-9">
          <div class="tab-content">
            <div class="tab-pane active" id="profile" aria-labelledby="profile-tab" role="tabpanel">
              <!-- user profile nav tabs profile start -->
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-sm-12">
                            <div class="row">
                              <div class="col-12 text-center text-sm-left">
                                <h4 class="media-heading mb-0">About Me</h4><hr/>
                              </div>
                              <div class="col-12 text-center text-sm-left">
                                <?=html_entity_decode($about_me)?>
                                <p>Company Name : <?=$company_name?></p>
                                <p>Website Name : <a href="<?=$website_name?>" target="_blank"><?=$website_name?></a></p>
                                <hr/>
                                <a href="update_profile.php" class="btn btn-outline-primary mr-1 mb-1">Update Profile Details</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- user profile nav tabs profile ends -->
            </div>
            <?php
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
            		}
              	}
              	catch(PDOException $e){
                	echo $e->getMessage();
              	}
            ?>
            <div class="tab-pane" id="contact" aria-labelledby="contact-tab" role="tabpanel">

              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h5 class="card-title">Basic Contact Details</h5>
                    <div class="row">
                      <div class="col-md-6"><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i> Phone Number : <?=$phone_number?></div>
                      <div class="col-md-6"><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i> Extra Phone Number : <?=$extra_phone_number?></div>
                      <div class="col-md-6"><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>Email Address : <?=$email_address?></div>
                      <div class="col-md-6"><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>Extra Email Address : <?=$extra_email_address?></div>
                      <div class="col-md-12"><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>Address : <?=$address?></div>
                      <div class="col-md-12" id="map" style="width:100%;height:300px;"></div>
                    </div>                    
              <hr/>
              <a href="contact_us.php" class="btn btn-outline-primary mr-1 mb-1">Update Contact Details</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
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
            <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
              <div class="card">
        <div class="card-header">
          <h4 class="card-title">Social Media Details</h4>
          <hr/>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-text">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <tbody>
                    <tr>
                      <td class="text-bold-500">Facebook</td>
                      <td><a href="<?=$facebook?>" target="_blank"><?=$facebook?></a></td>
                    </tr>
                    <tr>
                      <td class="text-bold-500">Twitter</td>
                      <td><a href="<?=$twitter?>" target="_blank"><?=$twitter?></a></td>
                    </tr>
                    <tr>
                      <td class="text-bold-500">Instagram</td>
                      <td><a href="<?=$instagram?>" target="_blank"><?=$instagram?></a></td>
                    </tr>
                    <tr>
                      <td class="text-bold-500">Pinterest</td>
                      <td><a href="<?=$pinterest?>" target="_blank"><?=$pinterest?></a></td>
                    </tr>
                    <tr>
                      <td class="text-bold-500">Linkedin</td>
                      <td><a href="<?=$linkedin?>" target="_blank"><?=$linkedin?></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr/>
              <a href="social_links.php" class="btn btn-outline-primary mr-1 mb-1">Update Social Media Links</a>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
        <!-- user profile nav tabs content ends -->
        <!-- user profile right side content start -->
        <div class="col-lg-3">
          <!-- user profile right side content related groups start -->
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h5 class="card-title mb-1">Change Password
                  <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
                </h5>
                <form class="form form-vertical" method="post" id="change_password" name="change_password">
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password-icon">Old Password</label>
                      <div class="position-relative has-icon-left">
                        <input type="password" id="password-icon" class="form-control" name="old_pass" placeholder="Old Password">
                        <div class="form-control-position">
                          <i class="bx bx-lock"></i>
                        </div>
                      </div>
                      <span class="text-danger" id="erold_pass"></span>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password-icon">New Password</label>
                      <div class="position-relative has-icon-left">
                        <input type="password" id="password-icon" class="form-control" name="new_pass" placeholder="New Password">
                        <div class="form-control-position">
                          <i class="bx bx-lock"></i>
                        </div>
                      </div>
                      <span class="text-danger" id="ernew_pass"></span>
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
          <!-- user profile right side content gallery ends -->
        </div>
        <!-- user profile right side content ends -->
      </div>
      <!-- user profile content section start -->
    </div>
  </div>
</section>
<!-- page user profile ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <?php require_once('includes/admin_footer.php');?>
<script src="assets/js/script.js"></script>    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHK-eca6Fg4sBk3pDXnvETJ41jWXowQxk"></script>
    <script>
      if ($("#map").length) {
        function initialize() {
          var mapOptions = {
            zoom: 16,
            scrollwheel: false,
    center: new google.maps.LatLng(<?=$lattitude?>, <?=$longitude?>) //please add your location here
  };
  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);
  var marker = new google.maps.Marker({
    position: map.getCenter(),
    //icon: 'images/locating.png', if u want custom
    map: map
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
}
</script>
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
<script type='text/javascript'>
	$(document).ready(function(){
		$('#change_password').submit(function(event) {
			event.preventDefault();
			var form = $(this)
			var formData = new FormData($('form[name="change_password"]')[0]);
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
							url: "ajax/change-password-async.php",
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
									window.location="user_profile.php";
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