
<?php
include '../connection.php';
if(isset($_GET['id'])) 
{
    $id =$_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";
$result = mysqli_query($con,$query) or die('Error, query failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
ob_clean();
flush();
echo $content;
mysqli_close($con);
exit;
}
?>
