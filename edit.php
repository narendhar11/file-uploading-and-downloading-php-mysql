<?php
  include 'connect.php';
  
  if(isset($_POST['delete'])){
    
    for($i=0;$i<count($_POST['checkbox']);$i++){
      $d=$_POST['checkbox'][$i];
      $res=mysql_query("DELETE FROM users WHERE ID='$d'");
    }
    if($res){
      echo "<script>confirm('You records are sucessfully deleted');
          window.location.href='display.php';</script>";
    }
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Update Form</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style>
  body{
    background:  #7F525D;
  }
  input[type='text']{
    padding: 12px 10px 10px 15px;
    width: 120%;
    display: block;
    height:40px;
    margin: 0px 0px 20px 0px;
  }
  table{
    font-size:100%;
  }
  .well{
    margin-top: 5%;
    margin-left: 20%;
    width:50%;
    height:510px;
    border:1px solid #DDD;
    border-radius: 7px;
    padding-left: 2%;
  }
  </style>
</head>
<body>
  <?php 
    date_default_timezone_set("Asia/kolkata");
    $date= date("Y-m-d h:i:sa");
  ?>

  <?php
    if(isset($_POST['edit'])){
    for($a=0;$a<count($_POST['checkbox']);$a++){
    $c=$_POST['checkbox'][$a];
    $r=mysql_query("SELECT * FROM users WHERE ID='$c'");

    if($rows=mysql_fetch_array($r)){
  ?>

    <div class="well">
    <?php echo'<form action="update.php?Id='.$rows['id'].'" method="post">'; ?>

      <table cellspacing="1"cellpadding="3">
        <tr>
          <td><label>ID:</label><br><p><?php echo $rows['id'];?></p></td>
        </tr>
        <tr>
          <td><label>Name:</label><br><input class="form-control" name="t1" type="text" value="<?php echo $rows['name'];?>"></td>
        </tr>
        <tr>
          <td><label>Email:</label><br><input class="form-control" name="t2" type="text" value="<?php echo $rows['email'];?>"></td>
        </tr>
        <tr>
          <td><label>Phonenumber:</label><br><input class="form-control" name="t3" type="text" value="<?php echo $rows['mobile'];?>"></td>
        </tr>
        <tr>
          <td><label>Status:</label><br><input class="form-control" name="t4" type="text" value="<?php echo $rows['status'];?>"></td>
        </tr>
        <tr>
          <td><input type="submit" name="update" class="btn btn-primary" value="update"></td>
        </tr>

        <?php
        }
        }
        ?>
      </table>
      </form>
  </div>

    <?php
    }
    ?>
</body>
</html>