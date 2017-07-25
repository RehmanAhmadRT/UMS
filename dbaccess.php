<?php namespace access1;
include __DIR__.'/database/database.php';
use \doct;
class DbAccess{
   private $connectDb=null;
   private static $connection=null;
   private $arr=null;
  function __construct(){
    $connectDb = \doct\ConnectDb::getInstance();
    self::$connection=$connectDb->getConnection();
    }
    function selectAll(){
      $arr=null;
      $arr=array();
      $query = "select s.sid,s.sname,t.tname,c.cname
                from student s,teacher t, course c
                where s.fk_tid=t.tid and s.fk_cid=c.cid
                order by s.sid";
      $prepStmt=self::$connection->prepare($query);
      $prepStmt->execute();

      while ($row = $prepStmt->fetch()) {
        //echo "<br>Student: " .$row['sname'] .", Teacher: " .$row['tname'].", Course: ".$row['cname'];
        if($row['sid']!=null || $row['sid']>=0){
          $arr[]=$row;
        }
      }
      return $arr;
      //echo json_encode($arr);
    }

    function insertUser($student){
      $query = "insert into student(sname,fk_tid,fk_cid) values(:name,:tid,:cid)";
      $prepStmt=self::$connection->prepare($query);
      $prepStmt->bindParam(':name',$student['sname']);
      console.log($student['fk_tid']);
      $prepStmt->bindParam(':tid',$student['fk_tid']);
      $prepStmt->bindParam(':cid',$student['fk_cid']);
      $result=$prepStmt->execute();
      return $result;
    }
}
?>
