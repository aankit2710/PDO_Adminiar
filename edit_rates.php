<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
$id = $_GET['id'];
try
{

	$stmt = $db_con->prepare("SELECT * FROM rates WHERE user_id=:user_id AND rate_id = :id");  
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);      
	$stmt->execute();
	$count = $stmt->rowCount();
	if($count == 0)
	{
		echo '<script>alert("Rates Is Not existed!");window.location="rates.php"</script>';
	}

	$row = $stmt->fetchAll();
	foreach ($row as $key => $data)
	{
		$rate_id = $data['rate_id'];
		$title = $data['title'];
		$rate = $data['rate'];
		$duration = $data['duration'];
		$service_id = $data['service_id'];
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
	<title>Edit Rates</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Edit Rates</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Edit Rates
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
					          <h4 class="card-title">Add Faq From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					            <form class="form form-vertical"  name="update_rates" id="update_rates" method="post">
							              	<div class="form-body">
								                <div class="row">
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="question-vertical">Select Service</label>
									                      	<select type="text" id="service" class="form-control" name="service">
									                      	    <option value="">Select Service</option>
									                      	    <?php
									                      	    try
                                                                {
                                                              		$stmt_service = $db_con->prepare("SELECT * FROM services WHERE user_id=:user_id");  
                                                                	$stmt_service->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
                                                                	$stmt_service->execute();
                                                            		$count = $stmt_service->rowCount();
                                                            		$row_service = $stmt_service->fetchAll();
                                                            		
									                      	        foreach($row_service as $row_service)
									                      	        {
									                      	    ?>
									                      	            <option value="<?=$row_service['service_id']?>" <?=($row_service['service_id']==$service_id)?'selected':''?>><?=$row_service['service_name']?></option>
									                      	    <?php
									                      	        }
                                                              	}
                                                              	catch(PDOException $e){
                                                                	echo $e->getMessage();
                                                              	}
									                      	    ?>
									                      	</select>
									                        <span class="text-danger" id="erservice"></span>
									                    </div>
									                </div>
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="question-vertical">Title</label>
									                      	<input type="text" id="title" class="form-control" name="title" placeholder="Enter Title" value="<?=$title?>">
									                        <span class="text-danger" id="ertitle"></span>
									                    </div>
									                </div>
								                  	<div class="col-6">
									                    <div class="form-group">
									                      	<label for="question-vertical">Price</label>
									                      	<input type="text" id="price" class="form-control" name="price" placeholder="Enter Price" value="<?=$rate?>">
									                        <span class="text-danger" id="erprice"></span>
									                    </div>
									                </div>
								                  	<div class="col-6">
									                    <div class="form-group">
									                      	<label for="question-vertical">Type</label>
									                      	<select type="text" id="duration" class="form-control" name="duration">
									                      	    <option value="">Select Type</option>
									                      	    <option value="All Inclusive" <?=('All Inclusive'==$duration)?'selected':''?>>All Inclusive</option>
									                      	    <option value="Hourly" <?=('Hourly'==$duration)?'selected':''?>>Hourly</option>
									                      	    <option value="Flat Rate" <?=('Flat Rate'==$duration)?'selected':''?>>Flat Rate</option>
									                      	</select>
									                        <span class="text-danger" id="erduration"></span>
									                    </div>
									                </div>
									                <input type="hidden" name="rate_id" value="<?=$rate_id?>">
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
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#update_rates').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="update_rates"]')[0]);
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
								url: "ajax/update-rates-async.php",
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
										window.location="rates.php";
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