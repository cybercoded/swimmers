
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');

?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">New Plan Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add New Plan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="row" method="POST"  name="userform" enctype="multipart/form-data" action="submit_plan_new.php" id="form1" name="form1">
                                    <div class="form-group col-md-6">
                                                <label class="control-label">PLAN ID</label>
                                                  <?php
              function getRandomWord($len = 6)
              {
                  $word = array_merge(range('A', 'Z'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="planid" id="planID" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
                                        </div>

                                  

                                        <div class="form-group col-md-6">
                                                <label class="control-label">PLAN NAME</label>
                                                 <input name="planname" id="planName" type="text" placeholder="Enter plan name"class="form-control">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                                <label class="control-label">PLAN DESCRIPTION</label>
                                                 <input type="text" name="desc" id="planDesc" placeholder="Enter plan description" class="form-control" required/>
                                        </div>

                                       <div class="form-group col-md-6">
                                                <label class="control-label">PLAN VALIDITY</label>
                                                 <input type="number" name="planval" id="planVal" placeholder="Enter validity in months" class="form-control" required/>
                                        </div>

                                      <div class="form-group col-md-6">
                                                <label class="control-label">PLAN AMOUNT</label>
                                                <input type="text" name="amount" id="planAmnt" placeholder="Enter plan amount" class="form-control" required/>
                                        </div>
                                        <div class="col-md-12">
                                        <button type="submit" name="submit" id="submit" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>
                                     </div>

                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('../constant/layout/footer.php');?>

