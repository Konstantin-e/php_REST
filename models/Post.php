<?php
  class Post {

    private $conn;
    private $table = 'posts';

    //post props
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;


    //constr-r with db
    public function __construct($db) {
      $this->conn = $db;
    }

    // GET Posts
    public function read() {
      //create query
      $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
          FROM 
            ' . $this->table . ' p 
          LEFT JOIN
            categories c ON p.category_id = c.id
            ORDER BY
              p.created_at DESC';

       //PREPARE statement
      $stmt = $this->conn->prepare($query);
      
      //execute query
      $stmt->execute();

      return $stmt;
    }
  }