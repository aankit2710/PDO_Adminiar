<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM employment_inquiries WHERE user_id=:user_id");  
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
	<title>Employment Inquiries</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Employment Inquiries</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Employment Inquiries
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
				                                        <th>Name</th>
				                                        <th>Phone</th>
				                                        <th>Email</th>
				                                        <th>Address</th>
				                                        <th>Address2</th>
				                                        <th>City</th>
				                                        <th>County</th>
				                                        <th>State</th>
				                                        <th>Zip</th>
				                                        <th>Sex</th>
				                                        <th>Emergency Name</th>
				                                        <th>Emergency Phone</th>
				                                        <th>Position</th>
				                                        <th>Available to Start</th>
				                                        <th>Salary Desired ($ per hour)</th>
				                                        <th>Are you currently employed</th>
				                                        <th>Work Type</th>
				                                        <th>Applied Before</th>
				                                        <th>When</th>
				                                        <th>Grade Completed in High School</th>
				                                        <th>Name of High School</th>
				                                        <th>Location</th>
				                                        <th>Year Completed College</th>
				                                        <th>Name of College</th>
				                                        <th>Location</th>
				                                        <th>Resume</th>
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
															$id = $data['inquiry_id'];
															$first_name = $data['first_name'];
                                                            $last_name = $data['last_name'];
                                                            $address = $data['address'];
                                                            $address2 = $data['address2'];
                                                            $city = $data['city'];
                                                            $county = $data['county'];
                                                            $state = $data['state'];
                                                            $zip = $data['zip'];
                                                            $phone = $data['phone'];
                                                            $email = $data['email'];
                                                            $sex = $data['sex'];
                                                            $em_fullname = $data['em_fullname'];
                                                            $em_phone = $data['em_phone'];
                                                            $position = $data['position'];
                                                            $date_avail = $data['date_avail'];
                                                            $salary = $data['salary'];
                                                            $curr_working = $data['curr_working'];
                                                            $avail_work = $data['avail_work'];
                                                            $ever_app = $data['ever_app'];
                                                            $app_when = $data['app_when'];
                                                            $last_grade_hs = $data['last_grade_hs'];
                                                            $name_hs = $data['name_hs'];
                                                            $loc_hs = $data['loc_hs'];
                                                            $lastyr_comp = $data['lastyr_comp'];
                                                            $name_coll = $data['name_coll'];
                                                            $loc_coll = $data['loc_coll'];
                                                            $resume = $data['resume'];
                                                            $comments = $data['comments'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td><?=$first_name.' '.$last_name?></td>
				                                        <td><?=$phone?></td>
				                                        <td><?=$email?></td>
				                                        <td><?=$address?></td>
				                                        <td><?=$address2?></td>
				                                        <td><?=$city?></td>
				                                        <td><?=$county?></td>
				                                        <td><?=$state?></td>
				                                        <td><?=$zip?></td>
				                                        <td><?=$sex?></td>
				                                        <td><?=$em_fullname?></td>
				                                        <td><?=$em_phone?></td>
				                                        <td><?=$position?></td>
				                                        <td><?=$date_avail?></td>
				                                        <td><?=$salary?></td>
				                                        <td><?=$curr_working?></td>
				                                        <td><?=$avail_work?></td>
				                                        <td><?=$ever_app?></td>
				                                        <td><?=$app_when?></td>
				                                        <td><?=$last_grade_hs?></td>
				                                        <td><?=$name_hs?></td>
				                                        <td><?=$loc_hs?></td>
				                                        <td><?=$lastyr_comp?></td>
				                                        <td><?=$name_coll?></td>
				                                        <td><?=$loc_coll?></td>
				                                        <td><?=($resume)?'<a href="../uploads/resumes/'.$resume.'" target="_blank">View Resume</a>':'No Resume Available!'?></td>
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