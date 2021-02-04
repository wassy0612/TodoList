<?php

require_once '../../config/database.php';
// require_once '../../view/todo/index.php';

class Todo {
  public $pdo;

  public $title;
  public $detail;
  public $status;

  public function __construction() {
    $this->dbConnect();
  }

  public function dbConnect() {
    $this->pdo = new PDO(DSN,USERNAME,PASSWORD);
  }

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
    $dbh = new PDO(DSN,USERNAME,PASSWORD);
    $query = sprintf(
             'SELECT * FROM MyDatabase.todos where id = %s',
             $todo_id
             );
    $stmh = $dbh->query($query);
    $todo = $stmh->fetch(PDO::FETCH_ASSOC);
    return $todo;
  }

  public function save() {
    try {
          $query = sprintf("INSERT INTO `todos` (`title`,`detail`,`status`,`created_at`,`updated_at`) 
                 VALUES ('%s','%s',0,NOW(),NOW())",
                 $this->title,
                 $this->detail
               );

          $dbh = new PDO(DSN,USERNAME,PASSWORD);
          $result = $dbh->prepare($query);

    }catch(Exception $e) {
        error_log("新規作成に失敗しました。");
        error_log($e->getMessage());
        error_log($e->getTraceAsString());

        return false;
    }
    return $result;
  }

  public function update() {
      $query = sprintf("UPDATE `todos` SET `title` = '%s', `detail` = '%s';",
             $this->title,
             $this->detail
           );

      $dbh = new PDO(DSN,USERNAME,PASSWORD);

      try {
        $dbh->beginTransaction();

        $stmt = $dbh->prepare($query);
        $stmt->execute();

        //コミット
        $dbh->commit();
      } catch(PDOException $e) {

        // ロールバック
        $dbh->rollBack();

        // エラーメッセージ出力
        echo $e->getMessage();

      }

  }

}
 ?>