<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM students left join course_orders on students.student_id = course_orders.student_id left join services on course_orders.enrolled_course = services.service_id"); 
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
	<title>Instructors List</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Students List</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Students List
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
									    <p><strong>NOTE : CLICK ON BLOCK BUTTON TO BLOCK THE STUDENT.</strong></p>
										<div class="table-responsive">
				                            <table class="table zero-configuration table-bordered">
				                                <thead>
				                                    <tr>
				                                        <th>Sr No.</th>
				                                        <th>Picture</th>
				                                        <th>Name</th>
				                                        <th>Email</th>
				                                        <th>Phone</th>
				                                        <th>Payment Status</th>
				                                        <th>Course Applied For</th>
				                                        <th>Address</th>
				                                        <th>Status</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<?php
				                                		$i = 1;
				                                		if($count > 0)
				                                		{	                                	
														foreach ($row as $key => $data)
														{
															$id = $data['student_id'];
															$first_name = $data['first_name'];
															$last_name = $data['last_name'];
															$email_address = $data['email_address'];
															$telephone_number = $data['telephone_number'];
															$address = $data['address'];
															$payment_completed = $data['payment_completed'];
															$profile_pic = $data['profile_pic'];
															$status = $data['status'];
															$service_name = $data['service_name'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td>
				                                            <?php if($profile_pic!=NULL){ ?>
				                                            <a href="../uploads/student-pics/<?=$profile_pic?>" target="_blank">
				                                                <img src="../uploads/student-pics/<?=$profile_pic?>" style="width:150px;">
				                                            </a>
				                                            <?php } else { ?>
				                                                <img src="app-assets/images/user-image.jpg" style="width:150px;">
				                                            <?php } ?>
				                                        </td>
				                                        <td><?=$first_name.' '.$last_name?></td>
				                                        <td><?=$email_address?></td>
				                                        <td><?=$telephone_number?></td>
				                                        <td>
				                                        	<?=($payment_completed==1)?'<a class="badge badge-success mb-1" style="color:#fff;">Completed</a>':'<a class="badge badge-danger mb-1" style="color:#fff;">Pending</a>'?>
				                                        </td>
				                                        <td><?=$service_name?></td>
				                                        <td><?=$address?></td>
				                                        <td>
				                                        	<?=($status==1)?'<a class="badge badge-success mb-1 update_status" id="'.$id.'" value="0" style="color:#fff;">Unblock</a>':'<a class="badge badge-danger mb-1 update_status" id="'.$id.'" value="1" style="color:#fff;">Block</a>'?>
				                                        </td>
				                                    </tr>
				                                <?php $i++; } } else { ?>
				                                	<tr>
				                                        <td colspan="6" class="text-center">Not Available Yet!</td>
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
							url: "ajax/status-student-async.php",
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