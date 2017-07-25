<?php
namespace doct;
require __DIR__.'/vendor/autoload.php';
use Doctrine\DBAL\Configuration;

class ConnectDb {

  private static $instance = null;
  private static $conn;

  private $host = 'localhost';
  private $user = 'root';
  private $pass = '123';
  private $name = 'uni';
  private $driver = 'pdo_mysql';
  private function __construct()
  {
    $config = new Configuration();
    $connectionParams = array('user'=>'root','password'=>'123','dbname'=>'uni','driver'=>'pdo_mysql','host'=>'localhost');
    self::$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
  }
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return self::$conn;
  }
}


?>
