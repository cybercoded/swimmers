
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
                    <h3 class="text-primary">Add Competition</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Competition </li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class=" row" method="POST"  name="userform" enctype="multipart/form-data" action="../app/crud_competition.php" id="form1" name="form1">
                                    <div class="form-group col-md-6">
                                             <label class="control-label">Name</label>
                                                 <input name="cname"  class="form-control" required>
                                       </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Select Type</label>
                                             <select name="ctype" class="form-control"  required>
                      <option value="0">--Select--</option>
                    <?php
                    $query  = "select * from competitiontype";
          //echo $query;
          $result = mysqli_query($con, $query);
         

              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['pname']; ?></option>
                     <?php } ?>
               </select>
           </div>


                                        <div class="form-group col-md-6">
                                            <label class="control-label">Status</label>

                                            <select class="form-control" name="status">
                                              <option value="">--Select--</option>

                                              <option value="active">Active</option>
                                              <option value="inactive">Inactive</option>
                                            </select><br>
                                       </div>

                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" value="Add Routine" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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

 