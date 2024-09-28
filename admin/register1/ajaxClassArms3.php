<?php
include 'dbcon.php';

    $cid = $_GET['cid'];//
    $val_M = mysqli_real_escape_string($conn,$cid);

        $queryss=mysqli_query($conn,"select * from tblproduct where OWNERNAME='$val_M'");                        
        $countt = mysqli_num_rows($queryss);

        
        echo '
        <select  name="price" class="form-control mb-3">';
        
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['PROPRICE'].'" >'.$row['PROPRICE'].'</option>';
        
        }
        echo '</select>';;
?>

