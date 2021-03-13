<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
$id = $_GET['id'];
try
{

	$stmt = $db_con->prepare("SELECT * FROM leads inner join services on leads.service_id = services.service_id WHERE leads.user_id=:user_id AND lead_id = :lead_id");  
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->bindParam(':lead_id', $id, PDO::PARAM_INT);      
	$stmt->execute();
	$count = $stmt->rowCount();
	if($count == 0)
	{
		echo '<script>alert("Case Is Not existed!");window.location="cases.php"</script>';
	}

	$row = $stmt->fetchAll();
	foreach ($row as $key => $data)
	{
		$lead_id = $data['lead_id'];
		$name = $data['name'];
		$email = $data['email'];
		$phone = $data['phone'];
		$address = $data['address'];
		$state = $data['state'];
		$city = $data['city'];
		$zipcode = $data['zipcode'];
		$service_name = $data['service_name'];
		$case_number = $data['case_number'];
		$company_name = $data['company_name'];
		$notes = $data['notes'];
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
	<title>Update Case</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Update Case</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Update Case
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
					          <h4 class="card-title">Update Case From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					            <form class="form form-vertical"  name="update_case" id="update_case" method="post">
							              	<div class="form-body">
								                <div class="row">
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Name</label>
									                      	<input type="text" id="name" class="form-control" name="name" value='<?=($name)?"$name":""?>'>
									                        <span class="text-danger" id="ername"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Email</label>
									                      	<input type="email" id="email" class="form-control" name="email" value='<?=($email)?"$email":""?>'>
									                        <span class="text-danger" id="eremail"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Phone</label>
									                      	<input type="text" id="phone" class="form-control" name="phone" value='<?=($phone)?"$phone":""?>'>
									                        <span class="text-danger" id="erphone"></span>
									                    </div>
									                </div>
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="question-vertical">Address</label>
									                      	<input type="text" id="address" class="form-control" name="address" value='<?=($address)?"$address":""?>'>
									                        <span class="text-danger" id="eraddress"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">State</label>
									                      	<input type="text" id="state" class="form-control" name="state" value='<?=($state)?"$state":""?>'>
									                        <span class="text-danger" id="erstate"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">City</label>
									                      	<input type="text" id="city" class="form-control" name="city" value='<?=($city)?"$city":""?>'>
									                        <span class="text-danger" id="ercity"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Zipcode</label>
									                      	<input type="text" id="zipcode" class="form-control" name="zipcode" value='<?=($zipcode)?"$zipcode":""?>'>
									                        <span class="text-danger" id="erzipcode"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
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
									                      	            <option value="<?=$row_service['service_id']?>" <?=($row_service['service_name']==$service_name)?'selected':''?>><?=$row_service['service_name']?></option>
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
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Case Number</label>
									                      	<input type="text" id="case_number" class="form-control" name="case_number" value='<?=($case_number)?"$case_number":""?>'>
									                        <span class="text-danger" id="ercase_number"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Company Name</label>
									                      	<input type="text" id="company_name" class="form-control" name="company_name" value='<?=($company_name)?"$company_name":""?>'>
									                        <span class="text-danger" id="ercompany_name"></span>
									                    </div>
									                </div>
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="answer-id-vertical">Notes</label>
									                      	<textarea class="ckeditor" cols="80" id="notes" name="notes" rows="10"><?=($notes)?"$notes":""?></textarea>
									                      	<span class="text-danger" id="ernotes"></span>
									                    </div>
								                  	</div>
									                <input type="hidden" id="lead_id" class="form-control" name="lead_id" value='<?=($lead_id)?"$lead_id":""?>'>
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
			$('#update_case').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="update_case"]')[0]);
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
								url: "ajax/update-case-async.php",
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
										window.location="cases.php";
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