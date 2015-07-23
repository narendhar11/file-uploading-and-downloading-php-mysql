<?php
include'connect.php';
$i=$_GET['Id'];

$a=$_POST['t1'];
$b=$_POST['t2'];
$c=$_POST['t3'];
$d=$_POST['t4'];
$res=mysql_query("UPDATE users SET name='$a',email='$b',mobile='$c',status='$d' where id='$i'");
if($res)
{

echo "<script> 
confirm('You have updated records');
window.location.href='display.php';

</script>";
}
?>