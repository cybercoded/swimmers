 
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
                    <h3 class="text-primary">Swimmer Per Month</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Swimmer Per Month</li>
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
                                        <h3>Swimmer Per Month</h3>
                                    <form class="row">
                                    
                                        <?php
    // set start and end year range
    $yearArray = range(2000, date('Y'));
    ?>
    <!-- displaying the dropdown list -->
    <div class="col-md-6">
        <select name="year" id="syear" class="form-control">
            <option value="0">Select Year</option>
            <?php
            foreach ($yearArray as $year) {
                // if you want to select a particular year
                $selected = ($year == date('Y')) ? 'selected' : '';
                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
            }
            ?>
        </select>
    </div>
    <?php
    // set the month array
    $formattedMonthArray = array(
                        "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                        "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                        "09" => "September", "10" => "October", "11" => "November", "12" => "December",
                    );

    ?>

    <!-- displaying the dropdown list -->
    <div class="col-md-6">
    <select name="month" id="smonth" class="form-control">
        <option value="0">Select Month</option>
        <?php

        foreach ($formattedMonthArray as $month) {
            // if you want to select a particular month
            $mm=implode(array_keys($formattedMonthArray,$month));
            $selected = ($mm == date('m')) ? 'selected' : '';
            // if you want to add extra 0 before the month uncomment the line below
            //$month = str_pad($month, 2, "0", STR_PAD_LEFT);
            echo '<option '.$selected.' value="'.$mm.'">'.$month.'</option>';
        }
        ?>
    </select>
</div>
    <div class="col-md-12">
    <input type="button" class="btn btn-primary btn-flat m-b-30 m-t-30" name="search" onclick="showMember();" value="Search"></div>
                                    </form>
                                    <table id="memmonth" border=1 class="table">
    
</table>


<script>

  function showMember(){
    var year=document.getElementById("syear");
    var month=document.getElementById("smonth");
    var iyear=year.selectedIndex;
    var imonth=month.selectedIndex;
    var mnumber=month.options[imonth].value;
    var ynumber=year.options[iyear].value;
    if(mnumber=="0" || ynumber=="0"){
      document.getElementById("memmonth").innerHTML="";
      return;
    }
    else{
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status ==200){
                document.getElementById("memmonth").innerHTML=this.responseText;
            }
        };
        xmlhttp.open("GET","over_month.php?mm="+mnumber+"&yy="+ynumber+"&flag=0",true);
        xmlhttp.send();
    }

  }

</script>
                                </div>
                            </div>

                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
   

<?php include('../constant/layout/footer.php');?>

 