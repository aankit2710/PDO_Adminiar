<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

$pricing_id = $_GET['id'];
	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM pricing WHERE pricing.user_id=:user_id AND pricing_id = :pricing_id");  
    	$stmt->bindParam(':pricing_id', $pricing_id, PDO::PARAM_INT);    
    	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    	$stmt->execute();
		$count = $stmt->rowCount();
		$row = $stmt->fetchAll();
		if($count == 0)
    	{
    		echo '<script>alert("Pricing Is Not existed!");window.location="pricing.php"</script>';
    	}
    	foreach ($row as $key => $data)
    	{
    		$pricing_id = $data['pricing_id'];
    		$program = $data['service_id'];
    		$program_na = $data['prog'];
    		$category = $data['category'];
    		$price = $data['price'];
    		$prog = $data['prog'];
    		$content = $data['content'];
    		$time_period = $data['time_period'];
    	}
  	}
  	catch(PDOException $e){
    	echo $e->getMessage();
  	}
  	
  	try
    {
        $stmt1 = $db_con->prepare("SELECT * FROM services WHERE user_id=:user_id");  
        $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
        $stmt1->execute();
        $count1 = $stmt1->rowCount();
        $row1 = $stmt1->fetchAll();
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    try
    {
        $stmt1 = $db_con->prepare("SELECT DISTINCT program_name FROM services WHERE user_id=:user_id");  
        $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
        $stmt1->execute();
        $count2 = $stmt1->rowCount();
        $row2 = $stmt1->fetchAll();
    }
    catch(PDOException $e)
    {
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
	<title>Edit Pricing Details</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Edit Pricing Details</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Edit Pricing Details
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
					          <h4 class="card-title">Update Page Details From Here</h4>
					          <hr/>
					        </div>
					        <div class="card-content">
					          <div class="card-body">
					              <form class="form form-vertical" name="add_pricing" id="add_pricing" method="post">
                					              <div class="form-body">
                					                <div class="row">
                					                    <div class="col-12">
                    					                    <div class="form-group">
                    					                        <label for="name-vertical">Select Category</label>
                    					                        <select id="program" class="form-control" name="program">
                    					                            <option value="">Select Category</option>
                    					                            <?php
                    					                            $i = 1;
                                                        			if($count1 > 0)
                                                        			{		                                	
                														foreach ($row1 as $key => $data1)
                														{
                															$service_id = $data1['service_id'];
                															$service_name = $data1['service_name'];
                															$service_image = $data1['service_image'];
                    					                            ?>
                    					                            <option value="<?=$service_id?>" <?=($service_id == $program)?'selected':''?>><?=$service_name?></option>
                    					                            <?php } } ?>
                    					                        </select>
                    					                        <span class="text-danger" id="erprogram"></span>
                    					                    </div>
                    					                  </div>
                    					                  <div class="col-12">
                    					                    <div class="form-group">
                    					                        <label for="name-vertical">Select Program</label>
                    					                        <select id="prog" class="form-control" name="prog">
                    					                            <option value="">Select Program</option>
                    					                            <?php
                    					                            $i = 1;
                                                        			if($count2 > 0)
                                                        			{		                                	
                														foreach ($row2 as $key => $data2)
                														{
                															$program_name = $data2['program_name'];
                															$service_image = $data2['service_image'];
                    					                            ?>
                    					                            <option value="<?=$program_name?>"  <?=($program_name == $program_na)?'selected':''?>><?=$program_name?></option>
                    					                            <?php } } ?>
                    					                        </select>
                    					                        <span class="text-danger" id="ercategory"></span>
                    					                    </div>
                    					                  </div>
                    					                  <div class="col-12">
                    					                    <div class="form-group">
                    					                        <label for="name-vertical">Select Department</label>
                    					                        <select id="category" class="form-control" name="category">
                    					                            <option value="">Select Department</option>
                    					                            <option value="Healthcare" <?=($category == "Healthcare")?'selected':''?>>Healthcare</option>
                    					                            <option value="Administrative" <?=($category == "Administrative")?'selected':''?>>Administrative</option>
                    					                            <option value="Technology" <?=($category == "Technology")?'selected':''?>>Technology</option>
                    					                            <option value="Other Training Options" <?=($category == "Other Training Options")?'selected':''?>>Other Training Options</option>
                    					                        </select>
                    					                        <span class="text-danger" id="ercategory"></span>
                    					                    </div>
                    					                  </div>
                    					                  <div class="col-6">
                    					                    <div class="form-group">
                    					                        <label for="name-vertical">Enter Price</label>
                    					                        <input type="text" id="price" class="form-control" name="price" placeholder="Enter Price" value="<?=$price?>">
                    					                        <span class="text-danger" id="erprice"></span>
                    					                    </div>
                    					                  </div>
                    					                  <div class="col-6">
                    					                    <div class="form-group">
                    					                        <label for="name-vertical">Enter Time Period(No. of Days)</label>
                    					                        <input type="text" id="time_period" class="form-control" name="time_period" placeholder="Enter Time Period" value="<?=$time_period?>">
                    					                        <span class="text-danger" id="ertime_period"></span>
                    					                    </div>
                    					                  </div>
                						                  <div class="col-12">
                						                    <div class="form-group">
                						                      <label for="answer-id-vertical">Description</label>
                						                      <textarea class="ckeditor" cols="80" id="description" name="description" rows="10"><?=$content?></textarea>
                						                      <span class="text-danger" id="erdescription"></span>
                						                    </div>
                						                  </div>
                    					                  <div class="col-12 d-flex justify-content-end">
                    					                      <input type="hidden" name="pricing_id" value="<?=$pricing_id?>">
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
			$('#add_pricing').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="add_pricing"]')[0]);
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
								url: "ajax/update-pricing-async.php",
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
										window.location="pricing.php";
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