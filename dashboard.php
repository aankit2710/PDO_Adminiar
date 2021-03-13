<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db_config.php');
if($user_id!="")
{
  $ip = getClientIP();
  try
  {    
    $sql = "UPDATE user_login SET last_login = now(), ip = :ip WHERE user_id = :user_id";
    $stmt = $db_con->prepare($sql);                                  
    //$stmt->bindParam(':last_login', now(), PDO::PARAM_STR);       
    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);  
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);   
    $stmt->execute();
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>Dashboard</title>
    
    <?php require_once('includes/admin_header.php');?>
    <?php require_once('includes/admin_topbar.php');?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Analytics Start -->
        <!--<section id="dashboard-analytics">-->
        <!--    <div class="row">-->
        <!--        <div class="col-md-12 text-center">-->
        <!--            <h1>WELCOME <br/> To </br> Admin Area</h1>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
<section id="dashboard-analytics">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Cases History</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body pb-1">
            <div class="d-flex justify-content-around align-items-center flex-wrap">
              <div class="user-analytics">
                <i class="bx bx-user mr-25 align-middle"></i>
                <span class="align-middle text-muted">Completed</span>
                <div class="d-flex">
                  <div id="radial-success-chart"></div>
                  <h3 class="mt-1 ml-50">0K</h3>
                </div>
              </div>
              <div class="sessions-analytics">
                <i class="bx bx-trending-up align-middle mr-25"></i>
                <span class="align-middle text-muted">Active</span>
                <div class="d-flex">
                  <div id="radial-warning-chart"></div>
                  <h3 class="mt-1 ml-50">0K</h3>
                </div>
              </div>
              <div class="bounce-rate-analytics">
                <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
                <span class="align-middle text-muted">Pending</span>
                <div class="d-flex">
                  <div id="radial-danger-chart"></div>
                  <h3 class="mt-1 ml-50">0%</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-xl-3 col-md-6 col-sm-12 dashboard-referral-impression">
      <div class="row">
        <div class="col-xl-12 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body donut-chart-wrapper">
                <div id="donut-chart" class="d-flex justify-content-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-12 col-sm-12">
      <div class="row">
        <div class="col-xl-12 col-md-6 col-12">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                      <div class="avatar-content">
                        <i class="bx bx-user text-primary font-medium-2"></i>
                      </div>
                    </div>
                    <div class="total-amount">
                      <h5 class="mb-0">$0</h5>
                      <small class="text-muted">Conversion</small>
                    </div>
                  </div>
                  <div id="primary-line-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-warning m-0 p-25 mr-75 mr-xl-2">
                      <div class="avatar-content">
                        <i class="bx bx-dollar text-warning font-medium-2"></i>
                      </div>
                    </div>
                    <div class="total-amount">
                      <h5 class="mb-0">$0</h5>
                      <small class="text-muted">Income</small>
                    </div>
                  </div>
                  <div id="warning-line-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 col-12 activity-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Activity</h4>
        </div>
        <div class="card-content">
          <div class="card-body pt-1">
            <div class="d-flex activity-content">
              <div class="avatar bg-rgba-primary m-0 mr-75">
                <div class="avatar-content">
                  <i class="bx bx-bar-chart-alt-2 text-primary"></i>
                </div>
              </div>
              <div class="activity-progress flex-grow-1">
                <small class="text-muted d-inline-block mb-50">Total Sales</small>
                <small class="float-right">$0</small>
                <div class="progress progress-bar-primary progress-sm">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" style="width:50%"></div>
                </div>
              </div>
            </div>
            <div class="d-flex activity-content">
              <div class="avatar bg-rgba-success m-0 mr-75">
                <div class="avatar-content">
                  <i class="bx bx-dollar text-success"></i>
                </div>
              </div>
              <div class="activity-progress flex-grow-1">
                <small class="text-muted d-inline-block mb-50">Income Amount</small>
                <small class="float-right">$0</small>
                <div class="progress progress-bar-success progress-sm">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" style="width:80%"></div>
                </div>
              </div>
            </div>
            <div class="d-flex activity-content">
              <div class="avatar bg-rgba-warning m-0 mr-75">
                <div class="avatar-content">
                  <i class="bx bx-stats text-warning"></i>
                </div>
              </div>
              <div class="activity-progress flex-grow-1">
                <small class="text-muted d-inline-block mb-50">Total Budget</small>
                <small class="float-right">$0</small>
                <div class="progress progress-bar-warning progress-sm">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" style="width:60%"></div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-75">
              <div class="avatar bg-rgba-danger m-0 mr-75">
                <div class="avatar-content">
                  <i class="bx bx-check text-danger"></i>
                </div>
              </div>
              <div class="activity-progress flex-grow-1">
                <small class="text-muted d-inline-block mb-50">Completed Tasks</small>
                <small class="float-right">0</small>
                <div class="progress progress-bar-danger progress-sm">
                  <div class="progress-bar" role="progressbar" aria-valuenow="30" style="width:30%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 profit-report-card">
      <div class="row">
        <div class="col-md-12 col-sm-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Profit Report</h4>
              <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-content">
              <div class="card-body pb-0 d-flex justify-content-around">
                <div class="d-inline-flex mr-xl-2">
                  <div id="profit-primary-chart"></div>
                  <div class="profit-content ml-50 mt-50">
                    <h5 class="mb-0">$0k</h5>
                    <small class="text-muted">2019</small>
                  </div>
                </div>
                <div class="d-inline-flex">
                  <div id="profit-info-chart"></div>
                  <div class="profit-content ml-50 mt-50">
                    <h5 class="mb-0">$0k</h5>
                    <small class="text-muted">2019</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Registrations</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="d-flex align-items-end justify-content-around">
                  <div class="registration-content mr-xl-2">
                    <h4 class="mb-0">0k</h4>
                    <i class="bx bx-trending-up success align-middle"></i>
                    <span class="text-success">0%</span>
                  </div>
                  <div id="registration-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 sales-card">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="card-title-content">
            <h4 class="card-title">Sales</h4>
            <small class="text-muted">Calculated in last 7 days</small>
          </div>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div id="sales-chart" class="mb-2"></div>
            <div class="d-flex justify-content-between my-1">
              <div class="sales-info d-flex align-items-center">
                <i class='bx bx-up-arrow-circle text-primary font-medium-5 mr-50'></i>
                <div class="sales-info-content">
                  <h6 class="mb-0">Best Selling</h6>
                  <small class="text-muted">Sunday</small>
                </div>
              </div>
              <h6 class="mb-0">0k</h6>
            </div>
            <div class="d-flex justify-content-between mt-2">
              <div class="sales-info d-flex align-items-center">
                <i class='bx bx-down-arrow-circle icon-light font-medium-5 mr-50'></i>
                <div class="sales-info-content">
                  <h6 class="mb-0">Lowest Selling</h6>
                  <small class="text-muted">Thursday</small>
                </div>
              </div>
              <h6 class="mb-0">0k</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 growth-card">
      <div class="card">
        <div class="card-body text-center">
          <div id="growth-Chart"></div>
          <h6 class="mb-0"> 0% Company Growth in 2020</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Dashboard Analytics end -->

        </div>
      </div>
    </div>
    <!-- END: Content-->

    <?php require_once('includes/admin_footer.php');?>

  </body>
</html>