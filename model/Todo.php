<?php 
class Todo {
  public $title;
  public $detail;
  public $status;

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function getDetail(){
    return $this->detail;
  }

  public function setDetail($detail){
    $this->detail = $detail;
  }

  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
    $this->status = $status;
  }


  public static function findByQuery($query) {
    $dbh = new PDO(DSN,USERNAME,PASSWORD);
    $stmh = $dbh->query($query);
    
    $result = $stmh->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findAll() {
    $dbh = new PDO(DSN,USERNAME,PASSWORD);
    $query = "SELECT * FROM MyDatabase.todos";
    $stmh = $dbh->query($query);

    $result = $stmh->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public static function findById($todo_id) {
    $query = sprintf(
             'SELECT * FROM MyDatabase.todos where id = %s',
             $todo_id
             );
    $dbh = new PDO(DSN,USERNAME,PASSWORD);
    $stmh = $dbh->query($query);
    return $stmh->fetch(PDO::FETCH_ASSOC);
  }

  public function save() {
    $query = sprintf("INSERT INTO `todos` (`title`,`detail`,`status`,`created_at`,`updated_at`) 
                 VALUES ('%s','%s',0,NOW(),NOW())",
                 $this->title,
                 $this->detail
               );
    $dbh = new PDO(DSN,USERNAME,PASSWORD);
    $result = $pdo->query($query);
    
  }
}
 ?>