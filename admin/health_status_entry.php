
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
        $uid=0;
$uname=0;
$udob=0;
$ujoin=0;
$ugender=0;
$cal="";
$hei="";
$wei="";
$fa="";
$remar="";

if(isset($_POST['submit'])){
    $calorie=$_POST['calorie'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $fat=$_POST['fat'];
    $remarks=$_POST['remarks'];
    $userid=$_POST['usrid'];
     
    $query="update health_status set calorie='".$calorie."', height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$userid."'";
      //echo  $query;exit;
    if(mysqli_query($con,$query)){
        echo "<head><script>alert('Health Status Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_health_status.php'>";

    }
    else{
     echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
     echo "error".mysqli_error($con);
     echo "<meta http-equiv='refresh' content='0; url=new_health_status.php'>";
        
    }

    
}
else{
    $uid=$_POST['uid'];
    $uname=$_POST['uname'];
    $udob=$_POST['udob'];
    $ujoin=$_POST['ujoin'];
    $ugender=$_POST['ugender'];
    
    $sql="select * from health_status where uid='".$uid."'";
    $result=mysqli_query($con,$sql);
    if($result){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $cal=$row['calorie'];
        $hei=$row['height'];
        $wei=$row['weight'];
        $fa=$row['fat'];
        $remar=$row['remarks'];
    }
}

?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Member Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Member Details</li>
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
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="row" method="POST"  name="userform" enctype="multipart/form-data" action="" id="form1" name="form1">
                                    <div class="form-group col-md-6">
                                            <label class="control-label">MEMBERSHIP ID</label>
                                            <input type="text" id="boxx" readonly value='<?php echo $uid ?>' name="usrid" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">USER NAME</label>
                                                <input type="text" id="boxxe" readonly="" value='<?php echo $uname?>'  required  class="form-control"/>
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-6">
                                                <label class="control-label">GENDER</label>
                                               <input type="text" id="boxxe" readonly="" value='<?php echo $ugender?>'  class="form-control" required>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label">DATE OF BIRTH</label>
                                                <input type="text" id="boxxe" readonly="" value='<?php echo  $udob ?>'  class="form-control" required/>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">JOINING DATE</label>
                                               <input type="text" id="boxxe" readonly="" value='<?php echo $ujoin?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group col-md-6">
                                                <label class="control-label">CALORIE</label>
                                              <input type="text" id="boxx" name="calorie" value='<?php echo $cal?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group  col-md-6">
                                                <label class="control-label">HEIGHT</label>
                                                <input type="text" id="boxx" name="height" value='<?php echo $hei?>'placeholder="Enter Height in cm" class="form-control" required/>
                                        </div>
                                         <div class="form-group col-md-6">
                                                <label class="control-label">WEIGHT</label>
                                                <input type="text" id="boxx" name="weight" value='<?php echo $wei?>'placeholder="Enter Weight in kg" class="form-control" required/>
                                        </div>
                                         <div class="form-group col-md-6">
                                                <label class="control-label">FAT</label>
                                                <input type="text" id="boxx" name="fat" value='<?php echo $fa?>' class="form-control" required/>
                                        </div>

                                        
                                          <div class="form-group col-md-6">
                                                <label class="control-label">REMARKS</label>
                                           <textarea id="remarks" rows="5" name="remarks" placeholder="Remarks not more than 200 character" class="form-control" ><?php echo $remar?></textarea>
                                        </div>
                                         <div class=" col-md-12">
                                       <button type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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

 