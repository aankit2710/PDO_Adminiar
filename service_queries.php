<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM service_inquiries WHERE user_id=:user_id");  
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
	<title>Services Inquiries</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Services Inquiries</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Services Inquiries
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
						<div class="col-12">
							<div class="card">
								<div class="card-content">
									<div class="card-body">
										<div class="table-responsive">
				                            <table class="table zero-configuration table-bordered">
				                                <thead>
				                                    <tr>
				                                        <th>Sr No.</th>
				                                        <th>Who Need Care</th>
				                                        <th>Name</th>
				                                        <th>Age</th>
				                                        <th>Type of Care</th>
				                                        <th>Date Needed</th>
				                                        <th>Address</th>
				                                        <th>City,ST,Zipcode</th>
				                                        <th>Phone</th>
				                                        <th>Days of Week</th>
				                                        <th>Hours per Week</th>
				                                        <th>Start Time</th>
				                                        <th>Finish Time</th>
				                                        <th>Name of Person Requesting</th>
				                                        <th>Contact Number</th>
				                                        <th>Email Address</th>
				                                        <th>Insurance Provider</th>
				                                        <th>Insurance Id</th>
				                                        <th>Comments</th>
				                                        <!--<th>Action</th>-->
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<?php
				                                		$i = 1;
				                                		if($count > 0)
				                                		{	                                	
														foreach ($row as $key => $data)
														{
															$id = $data['service_inquiry_id'];
															$who_needs_care = $data['who_needs_care'];
															$name = $data['name'];
															$age = $data['age'];
															$type_of_care_needed = $data['type_of_care_needed'];
															$date_needed = $data['date_needed'];
															$address = $data['address'];
															$city_st_zip = $data['city_st_zip'];
															$phone = $data['phone'];
															$days_of_week = $data['days_of_week'];
															$hours_per_week = $data['hours_per_week'];
															$arrival_time = $data['arrival_time'];
															$departure_time = $data['departure_time'];
															$requestors_name = $data['requestors_name'];
															$best_contact_num = $data['best_contact_num'];
															$email = $data['email'];
															$comments = $data['comments'];
															$insurance_provider = $data['insurance_provider'];
															$insurance_id = $data['insurance_id'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td><?=$who_needs_care?></td>
				                                        <td><?=$name?></td>
				                                        <td><?=$age?></td>
				                                        <td><?=$type_of_care_needed?></td>
				                                        <td><?=$date_needed?></td>
				                                        <td><?=$address?></td>
				                                        <td><?=$city_st_zip?></td>
				                                        <td><?=$phone?></td>
				                                        <td><?=$days_of_week?></td>
				                                        <td><?=$hours_per_week?></td>
				                                        <td><?=$arrival_time?></td>
				                                        <td><?=$departure_time?></td>
				                                        <td><?=$requestors_name?></td>
				                                        <td><?=$best_contact_num?></td>
				                                        <td><?=$email?></td>
				                                        <td><?=$insurance_provider?></td>
				                                        <td><?=$insurance_id?></td>
				                                        <td><?=$comments?></td>
				                                        <!--<td>-->
				                                        <!--	<button type="submit" class="btn btn-outline-danger btn-sm mr-1 mb-1 remove" name="delete" id="<?=$id?>">Delete</button>-->
				                                        <!--</td>-->
				                                    </tr>
				                                <?php $i++; } } else { ?>
				                                	<tr>
				                                        <td colspan="6" class="text-center">No Queries Available Yet!</td>
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
</body>
</html>