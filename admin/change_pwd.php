
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css"> 
 <?php
//session_start();
 include('../constant/connect.php');


if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
    $q = "select * from  admin where id = '".$_SESSION['id']."'";
}
else {
   $q = "select * from  tbl_customer where id = '".$_SESSION['id']."'";
}
 
  $q1 = $con->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['password'];
  }

if(isset($_POST["btn_password"])){
  
  $old = hash('sha256',$_POST['old_password']);
  $pass_new = hash('sha256', $_POST['new_password']);
  $confirm_new = hash('sha256', $_POST['confirm_password']);
//$passw = hash('sha256',$p);
//echo $pass_new;
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$old_pass =  hash('sha256', $salt . $old); 
$new_pass =  hash('sha256', $salt . $pass_new); 
$confirm =  hash('sha256', $salt . $confirm_new);

  if($db_pass!=$old_pass){ ?> 
    <?php $_SESSION['error']='Old Password not matched';?>
   <!--  <script>
    alert('OLD Paasword not matched');
    </script> -->
  <?php } else if($new_pass!=$confirm){ ?> 
    <?php $_SESSION['error']='NEW Password and CONFIRM password not Matched';?>
   <!--  <script>
    alert('NEW Password and CONFIRM password not Matched');
    </script> -->
  <?php } else {
    //$pass = md5($_POST['password']);
if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
   $sql = "update  admin set `password`='$confirm' where id = '".$_SESSION['id']."'";
}
else {
  $sql = "update  tbl_customer set `password`='$confirm' where id = '".$_SESSION['id']."'";
}    
  
  $res = $con->query($sql);
  
 if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){ ?>

    <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Password Change Successfully...</p>
    <p>
     <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
     <?php echo "<script>setTimeout(\"location.href = '../constant/logout.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
<?php 
} 
else { ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h3>
    <p>Invalid Email or Password</p>
    <p>
      <a href="change_pwd.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>

      
     <?php } 
    
 
    
  }
}


?>

<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change Password</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                                    <form class="row" method="POST">
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Old Password</label>
                                                    <input type="password" placeholder="old-Password" name="old_password" class="form-control" required="">
                                        </div>

                                         <div class="form-group col-md-6">
                                                <label class=" control-label">New Password</label>
                                                    <input type="password" placeholder="New-Password" name="new_password" class="form-control" required="">
                                        </div>

                                         <div class="form-group col-md-6">
                                                <label class="control-label">Confirm Password</label>
                                                    <input type="password" placeholder="Confirm-Password" name="confirm_password" class="form-control" required="">
                                        </div>
                                        <div class="col-md-12">
                                        <button type="submit" name="btn_password" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
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

