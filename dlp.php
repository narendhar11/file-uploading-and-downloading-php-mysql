<?php
 
$conn=mysql_connect("localhost","root","root") or die(mysql_error());
	$db=mysql_select_db("jobseekers",$conn);   
$ID=$_GET['id'];
$query="SELECT file,type,size,content from users WHERE id=$ID";

$result=mysql_query($query); 

$row=mysql_num_rows($result);
for($i=1;$i<=$row;$i++)
{
$data=mysql_fetch_object($result);
$filename=$data->file;
$type=$data->type;
$size=$data->size;
$content=$data->content;
 
 
header("Pragma: public"); // required

header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 

header("Cache-Control: private",false); //required for certain browsers 

header("Content-Type:".$type); 
header("Content-Disposition: attachment; filename=".$filename ); 
header("Content-Disposition: attachment; Content=".$content ); 
header("Content-Transfer-Encoding: binary"); 

header("Content-Length: ".$size);  
ob_clean(); 
flush();   
echo $content;
 
}

?>