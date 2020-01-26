@extends('layouts.base-layout')

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <p class="card-category">Total Contacts</p>
                  <h3 class="card-title">
                    <?php //echo mysqli_num_rows($client_number);?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <!-- <i class="material-icons text-danger">warning</i> -->
                    <!-- <a href="#pablo">Get More Space...</a> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">inbox</i>
                  </div>
                  <p class="card-category">Recived SMS</p>
                  <h3 class="card-title"><?php //echo mysqli_num_rows($per_day_receive);?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <!-- <i class="material-icons">date_range</i> Last 24 Hours -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">send</i>
                  </div>
                  <p class="card-category">Sent SMS</p>
                  <h3 class="card-title"><?php //echo mysqli_num_rows($per_day_sent);?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <!-- <i class="material-icons">local_offer</i> Tracked from Github -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-plus"></i>
                  </div>
                  <p class="card-category">More</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <!-- <i class="material-icons">update</i> Just Updated -->
                  </div>
                </div>
              </div>
            </div>
          </div>
      
           <div class="row">
  
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">SMS Stats</h4>
                  <p class="card-category">Status of Current Day</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-danger">
                      <th><b>ID</b></th>
                      <th><b>Status</b></th>
                      <th><b>Number of SMS</b></th>
                      <th><b>Percentage</b></th>
                      <th><b></b></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Delivered SMS</td>
                        <td><?php //echo mysqli_num_rows($per_day_delivered);?></td>
                        <td><?php //echo round($total_message_delivered_percentage,2);?>%</td>
                         <td><a href="./sent_messages.php" class="btn btn-info btn-link btn-sm "> <i class="material-icons">folder</i></a></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Pending SMS</td>
                        <td><?php //echo mysqli_num_rows($per_day_failed);?></td>
                        <td><?php //echo round($total_message_failed_percentage,2);?>%</td>
                         <td><a href="./pending_numbers.php" class="btn btn-info btn-link btn-sm "> <i class="material-icons">folder</i></a></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Failed SMS</td>
                        <td><?php //echo mysqli_num_rows($per_day_pending);?></td>
                        <td><?php //echo round($total_message_pending_percentage,2);?>%</td>
                         <td><a href="./failed_numbers.php" class="btn btn-info btn-link btn-sm "> <i class="material-icons">folder</i></a></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
