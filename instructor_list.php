<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM instructors"); 
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
							<h5 class="content-header-title float-left pr-1 mb-0">Instructors List</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Instructors List
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
									    <p><strong>NOTE : CLICK ON VERIFIED BUTTON TO VARIFIY THE INSTRUCTOR.</strong></p>
										<div class="table-responsive">
				                            <table class="table zero-configuration table-bordered">
				                                <thead>
				                                    <tr>
				                                        <th>Sr No.</th>
				                                        <th>Picture</th>
				                                        <th>Name</th>
				                                        <th>Email</th>
				                                        <th>Phone</th>
				                                        <th>Education Levels</th>
				                                        <th>Area of Expertise</th>
				                                        <th>Address</th>
				                                        <th>Resume</th>
				                                        <th>Is Verified</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<?php
				                                		$i = 1;
				                                		if($count > 0)
				                                		{	                                	
														foreach ($row as $key => $data)
														{
															$id = $data['instructor_id'];
															$prefix = $data['prefix'];
															$first_name = $data['first_name'];
															$last_name = $data['last_name'];
															$email_address = $data['email_address'];
															$telephone_number = $data['telephone_number'];
															$address = $data['address'];
															$education_levels = $data['education_levels'];
															$area_of_expertise = $data['area_of_expertise'];
															$resume = $data['resume'];
															$profile_pic = $data['profile_pic'];
															$is_verified = $data['is_verified'];
				                                	?>
				                                    <tr>
				                                        <td><?=$i?></td>
				                                        <td>
				                                            <?php if($profile_pic!=NULL){ ?>
				                                            <a href="../uploads/instructor-pics/<?=$profile_pic?>" target="_blank">
				                                                <img src="../uploads/instructor-pics/<?=$profile_pic?>" style="width:150px;">
				                                            </a>
				                                            <?php } else { ?>
				                                                <img src="app-assets/images/user-image.jpg" style="width:150px;">
				                                            <?php } ?>
				                                        </td>
				                                        <td><?=$prefix.' '.$first_name.' '.$last_name?></td>
				                                        <td><?=$email_address?></td>
				                                        <td><?=$telephone_number?></td>
				                                        <td><?=$education_levels?></td>
				                                        <td><?=$area_of_expertise?></td>
				                                        <td><?=$address?></td>
				                                        <td><a href="../uploads/instructor-resumes/<?=$resume?>" target="_blank">View Resume</a></td>
				                                        <td>
				                                        	<?=($is_verified==1)?'<a class="badge badge-success mb-1 update_status" id="'.$id.'" value="0" style="color:#fff;">Verified</a>':'<a class="badge badge-danger mb-1 update_status" id="'.$id.'" value="1" style="color:#fff;">Not Verified</a>'?>
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
							url: "ajax/verifiy-instructor-async.php",
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