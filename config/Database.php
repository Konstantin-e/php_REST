<?php 
  class Database {
    private $host = '127.0.0.1';
    private $db_name = 'myblog';
    private $username = 'root';
    private $password = '5336553365';
    private $conn;

    //db connection
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Errorrrr: ' . $e->getMessage();
      } 

      return $this->conn;
    }
  }