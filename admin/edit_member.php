
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
                     $memid=$_GET['id'];
                     //echo $memid;exit;
                    $query  = "SELECT * FROM users u 
                               INNER JOIN address a ON u.userid=a.id
                               INNER JOIN  health_status h ON u.userid=h.uid
                               INNER JOIN enrolls_to e on u.userid=e.uid
                               INNER JOIN plan p on e.pid=p.pid
                               WHERE userid='".$_GET['id']."' and e.renewal='yes'";
                    //echo $query;
                    $result = mysqli_query($con, $query);
                    $sno    = 1;
                    
                    $name="";
                    $gender="";

                    if (mysqli_affected_rows($con) == 1) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    
                            $name    = $row['username'];
                            $gender =$row['gender'];
                            $mobile = $row['mobile'];
                            $email   = $row['email'];
                            $dob     = $row['dob'];         
                            $jdate    = $row['joining_date'];
                            $streetname=$row['streetName'];
                            $state=$row['state'];
                            $city=$row['city'];  
                            $zipcode=$row['zipcode'];
                            $calorie=$row['calorie'];
                            $height=$row['height'];
                            $weight=$row['weight'];
                            $fat=$row['fat'];
                            $planname=$row['planName'];
                            $pamount=$row['amount'];
                            $pvalidity=$row['validity'];
                            $pdescription=$row['description'];
                            $paiddate=$row['paid_date'];
                            $expire=$row['expire'];
                            $remarks=$row['remarks'];

                        }
                    }
                    else{
                         echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
                         echo mysqli_error($con);
                    }


                ?>
            

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Swimmer Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Swimmer Details</li>
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
                                    <form class="row" method="POST"  name="userform" enctype="multipart/form-data" action="edit_mem_submit.php" id="form1" name="form1">
                                    <div class="form-group col-md-6">
                                                <label class="control-label">USER ID</label>
                                                <input type="text" name="uid" id="boxxe" readonly=""  value='<?php echo $memid?>' readonly required class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">NAME</label>
                                                <input type="text" id="boxxe" name="uname" value='<?php echo $name?>'  required  class="form-control"/>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                                <label class=" control-label">STREET NAME</label>
                                                <input type="text" id="boxxe" name="stname" value='<?php echo $streetname?>' class="form-control" required/>
                                        </div>

                                       <div class="form-group col-md-6">
                                                <label class="control-label">CITY:</label>
                                                 <input type="text" id="boxxe"  name="city" value='<?php echo $city?>' class="form-control" required/>
                                        </div>

                                      <div class="form-group  col-md-6">
                                                <label class="control-label">ZIPCODE:</label>
                                               <input type="text" id="boxxe"  name="zipcode" value='<?php echo $zipcode?>' class="form-control" required pattern="^[0-9]+$" />
                                        </div>
                                        <div class="form-group  col-md-6">
                                                <label class="control-label">STATE</label>
                                                <input type="text" id="boxxe" name="state" value='<?php echo $state?>' class="form-control" required/>
                                        </div>
                                        <div class="form-group  col-md-6">
                                                <label class="control-label">GENDER</label>
                                               <select id="boxxe" name="gender" id="gender" class="form-control" required>

                        <option <?php if($gender == 'Male'){echo("selected");}?> value="Male">Male</option>
                        <option <?php if($gender == 'Female'){echo("selected");}?> value="Female">Female</option>
                        </select>
                                        </div>
                                        <div class="form-group  col-md-6">
                                                <label class="control-label">DATE OF BIRTH</label>
                                                <input type="date" id="boxxe" name="dob" value='<?php echo $dob?>'  class="form-control" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">PHONE NO</label>
                                                <input type="text" id="boxxe" name="phone" maxlength="10" value='<?php echo $mobile ?>' class="form-control" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">EMAIL ID</label>
                                                <input type="email" id="boxxe" name="email" required="" value='<?php echo $email?>'class="form-control" required  />
                                        </div>
                                        <div class="form-group  col-md-6">
                                                <label class="control-label">JOINING DATE</label>
                                               <input type="date" id="boxxe" name="jdate" value='<?php echo $jdate?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group  col-md-6">
                                                <label class="control-label">CALORIE</label>
                                               <input type="text" id="boxxe"  name="calorie" value='<?php echo $calorie?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group  col-md-6">
                                                <label class="control-label">HEIGHT</label>
                                                <input type="text"  id="boxxe"  name="height" value='<?php echo $height?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group  col-md-6">
                                                <label class="control-label">WEIGHT</label>
                                                <input type="text"  id="boxxe"  name="weight" value='<?php echo $weight?>' class="form-control" required/>
                                        </div>
                                         <div class="form-group  col-md-6">
                                                <label class=" control-label">FAT</label>
                                                <input type="text"  id="boxxe"  name="fat" value='<?php echo $fat?>' class="form-control" required/>
                                        </div>

                                        
                                          <div class="form-group  col-md-6">
                                                <label class="control-label">REMARKS</label>
                                           <textarea  style="resize:none; margin: 0px; width: 550px; height: 53px;" class="form-control" name="remarks" ><?php echo $remarks?></textarea>
                                        </div>
                                         <div class=" col-md-12">
                                        <button type="submit" name="submit" id="submit" value="UPDATE" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE</button>
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
    <script>
            function myplandetail(str){
                 
                if(str==""){
                    document.getElementById("plandetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("plandetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","plandetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>

<?php include('../constant/layout/footer.php');?>

 