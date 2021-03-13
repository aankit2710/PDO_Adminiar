<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');

	try
  	{
  		$stmt = $db_con->prepare("SELECT * FROM services WHERE user_id=:user_id");  
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
	<title>Cases</title>
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
							<h5 class="content-header-title float-left pr-1 mb-0">Cases</h5>
							<div class="breadcrumb-wrapper col-12">
								<ol class="breadcrumb p-0 mb-0">
									<li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active"> Cases
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
							<div class="accordion" id="accordionWrapa1">
							    <div class="card collapse-header">
							      <div id="heading1" class="card-header text-center" role="tablist" data-toggle="collapse" data-target="#accordion1"
							        aria-expanded="false" aria-controls="accordion1">
							        <span class="collapse-title">Add Cases From Here</span>
							      </div>
							      <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
							        <div class="card-content">
							          <div class="card-body">
							          	<form class="form form-vertical"  name="cases" id="cases" method="post">
							              	<div class="form-body">
								                <div class="row">
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Name</label>
									                      	<input type="text" id="name" class="form-control" name="name"
									                        placeholder="Enter Name">
									                        <span class="text-danger" id="ername"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Email</label>
									                      	<input type="email" id="email" class="form-control" name="email"
									                        placeholder="Enter Email">
									                        <span class="text-danger" id="eremail"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Phone</label>
									                      	<input type="text" id="phone" class="form-control" name="phone"
									                        placeholder="Enter Phone">
									                        <span class="text-danger" id="erphone"></span>
									                    </div>
									                </div>
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="question-vertical">Address</label>
									                      	<input type="text" id="address" class="form-control" name="address"
									                        placeholder="Enter Address">
									                        <span class="text-danger" id="eraddress"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">State</label>
									                      	<input type="text" id="state" class="form-control" name="state"
									                        placeholder="Enter State">
									                        <span class="text-danger" id="erstate"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">City</label>
									                      	<input type="text" id="city" class="form-control" name="city"
									                        placeholder="Enter City">
									                        <span class="text-danger" id="ercity"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Zipcode</label>
									                      	<input type="text" id="zipcode" class="form-control" name="zipcode"
									                        placeholder="Enter Zipcode">
									                        <span class="text-danger" id="erzipcode"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Select Service</label>
									                      	<select type="text" id="service" class="form-control" name="service">
									                      	    <option value="">Select Service</option>
									                      	    <?php
									                      	        foreach($row as $data)
									                      	        {
									                      	    ?>
									                      	            <option value="<?=$data['service_id']?>"><?=$data['service_name']?></option>
									                      	    <?php
									                      	        }
									                      	    ?>
									                      	</select>
									                        <span class="text-danger" id="erservice"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Case Number</label>
									                      	<input type="text" id="case_number" class="form-control" name="case_number"
									                        placeholder="Question">
									                        <span class="text-danger" id="ercase_number"></span>
									                    </div>
									                </div>
								                  	<div class="col-4">
									                    <div class="form-group">
									                      	<label for="question-vertical">Company Name</label>
									                      	<input type="text" id="company_name" class="form-control" name="company_name"
									                        placeholder="Question">
									                        <span class="text-danger" id="ercompany_name"></span>
									                    </div>
									                </div>
								                  	<div class="col-12">
									                    <div class="form-group">
									                      	<label for="answer-id-vertical">Notes</label>
									                      	<textarea class="ckeditor" cols="80" id="notes" name="notes" rows="10"></textarea>
									                      	<span class="text-danger" id="ernotes"></span>
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
							    </div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-content">
									<div class="card-body">
									    <div class="">
									        <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Search By Case Number</label>
                                                        <input type='text' id='searchByName' placeholder='Enter Case Number' class='form-control'>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Search BY Service</label>
                                                        <select id='searchByService' class="form-control">
                                                            <option value=''>-- Select Service--</option>
                                                            <?php
									                      	    foreach($row as $data)
									                      	    {
									                      	?>
									                      	        <option value="<?=$data['service_id']?>"><?=$data['service_name']?></option>
									                      	<?php
									                      	    }
									                      	?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Search By Status</label>
                                                        <select id='searchByStatus' class="form-control">
                                                            <option value=''>-- Select Status--</option>
                                                            <option value='Pending'>Pending</option>
                                                            <option value='Complete'>Complete</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
									    </div>
										<div class="table-responsive">
				                            <table class="table caseTable table-bordered" style="width:100%">
				                                <thead>
				                                    <tr>
				                                        <th>Name</th>
				                                        <th>Phone</th>
				                                        <th>Service</th>
				                                        <th>Case Number</th>
				                                        <th>Status</th>
				                                        <th>Action</th>
				                                    </tr>
				                                </thead>
				                               
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
	<script>
        $(document).ready(function(){
            var dataTable = $('.caseTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': true, // Remove default Search Control
                'ajax': {
                    'url':'get_cases.php',
                    'data': function(data){
                        // Read values
                        var service = $('#searchByService').val();
                        var name = $('#searchByName').val();
                        var status = $('#searchByStatus').val();

                        // Append to data
                        data.searchByService = service;
                        data.searchByName = name;
                        data.searchByStatus = status;
                    }
                },
                'columns': [
                    { data: 'name' },
                    { data: 'phone' },
                    { data: 'service_id' },
                    { data: 'case_number' },
                    { data: 'status' },
                    { data: 'action' },
                ]
            });
            $('#searchByName').keyup(function(){
                dataTable.draw();
            });
            $('#searchByService').change(function(){
                dataTable.draw();
            });
            $('#searchByStatus').change(function(){
                dataTable.draw();
            });
        });
    </script>
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#cases').submit(function(event) {
				event.preventDefault();
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
				var form = $(this)
				var formData = new FormData($('form[name="cases"]')[0]);
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
								url: "ajax/insert-case-async.php",
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
	<script type="text/javascript">
		$(document).on('change', '#update_status',function(){
			var id = $(this).attr("data-id");
			var status = $(this).val();
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
							url: "ajax/update-case-status-async.php",
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
	<script type="text/javascript">
		$(document).on('click', '.remove',function(){
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
							url: "ajax/delete-case-async.php",
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
            
    <script src="app-assets/js/scripts/pages/app-invoice.min.js"></script>
</body>
</html>