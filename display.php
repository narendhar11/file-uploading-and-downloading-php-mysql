<?php
include'connect.php';
$rs=mysql_query("select * from users WHERE MONTH(NOW()) order by id desc");
$a=mysql_num_rows($rs);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Displaying Records</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<style>
body {
  background: #e9e9e9;
}
table{
  margin-top:20px;
  background:white;
	font-size:100%;
  border-color: #0060ac !important;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
  border: 1px solid #0060ac;
}
</style>
<body>
  <div class="container">
    <div style="margin:10px 0px 10px 500px; width:170px; background:#0060ac; color:white; font-size:18px;">
      <span style="padding:10px 10px 10px 10px;">Total Records: </span><?php echo $a; ?>
    </div>
      <form action="edit.php" method="post" style="margin-left: -50px;">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <div>
            <input type="submit" class="btn btn-primary btn-xs" value="Delete" disabled="true" name="delete" id="delete">&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Change" class="btn btn-primary btn-xs" disabled="true" name="edit" id="edit">
          </div>
        <thead style="background: #0060ac; color: #fff;">
          <tr>
            <th><input name="ch" type="checkbox" id="ch" ></th>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Platform</th>
            <th>Status</th>
            <th>Resume</th>
            <th>Date</th>
          </tr>
        </thead>
          <?php
            error_reporting(0);
              while($rows=mysql_fetch_array($rs)){
              $Id = $rows['id'];
              $filename=$rows['file'];
              $type=$rows['type'];
          ?>
        <tbody>
          <tr>
            <td><input name="checkbox[]" type="checkbox" class="chbx"  value="<?php echo $rows['id'];?>"> </td>
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['email'];?></td>
            <td><?php echo $rows['mobile'];?></td>
            <td><?php echo $rows['platform'];?></td>
            <td><?php echo $rows['status'];?></td>
            <td class="active"> <?php	echo "<a href='dlp.php?id=".$Id."' > ".$filename."</a> "; ?>	</td>
            <td><?php echo $rows['date'];?></td>
          </tr>
        </tbody>
        <?php
        }
        ?>
      </table>
    </form>
  </div>
</div>
				<script src="jquery-1.8.2.min.js"></script>
				<script src="chk.js"></script>
</body>
</html>
