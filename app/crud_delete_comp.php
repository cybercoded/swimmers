<?php
include('../constant/connect.php');


$msgid = $_GET['id'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM competition WHERE id='$msgid'");
    echo "<html><head><script>alert('Routine Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../admin/view_competition.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>