<?php
class Database
{
  // DB Params
  private $host = 'localhost';
  private $db_name = 'achievement crm';
  private $username = 'root';
  private $password = '';
  private $database_path = '';

  /**
   * @var \PDO|\SQLite3
   */
  private $conn;

  // DB Connect
  public function __construct()
  {
    $this->database_path = dirname(__DIR__) . '/database.sqlite';
    if (file_exists($this->database_path)) {
      $this->conn = new SQLite3($this->database_path);
      $this->conn->enableExceptions(true);
    }
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  /**
   * @return \PDO|\SQLite3
   */
  public function getConnection()
  {
    return $this->conn;
  }

  public function conn()
  {
    return $this->getConnection();
  }
}