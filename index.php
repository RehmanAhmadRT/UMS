<?php
include  __DIR__.'/dbaccess.php';
//$var = json_decode(file_get_contents('php://input'), true);
//var_dump($var);
static $result=null;

if(isset($_GET)){
  $db=new \access1\DbAccess();
  $result=$db->selectAll();
  //echo $result;
  //var_dump($_GET);
  echo json_encode($result);
}
else if(isset($_POST)){
  $var = json_decode(file_get_contents('php://input'), true);
  $db=new \access1\DbAccess();
  $result=$db->insertUser($var);

  echo $result;
  //var_dump($var);
}

 ?>
