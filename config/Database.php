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

    file_exists($this->database_path)
      ? $this->connectSQLite()
      : $this->connectMySQL();
  }

  protected function connectSQLite()
  {
    $this->conn = new SQLite3($this->database_path);
    $this->conn->enableExceptions(true);
  }

  protected function connectMySQL()
  {
    unset($this->database_path);

    $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

    if ($this->conn) {
      throw new PDOException('Could not connect to database');
    }

    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function execute(string $sql)
  {
    return $this->conn->exec($sql);
  }

  public function prepare(string $sql)
  {
    return $this->conn->prepare($sql);
  }

  public function query(string $sql)
  {
    return $this->conn->query($sql);
  }

  /**
   * @return \PDO|\SQLite3
   */
  public function getConnection()
  {
    return $this->conn;
  }

  public function reset()
  {
    if (!$this->database_path) {
      return;
    }
    file_put_contents($this->database_path, '');
    $this->connectSQLite();
  }
}