<?php 

require_once '../../model/Todo.php';

class TodoController {
  public function index() {
    $todo_list = Todo::findAll();
    return $todo_list;
  }
  public function detail() {
      $todo_id = $_GET['todo_id'];

      $todo = Todo::findById($todo_id);
      return $todo;
  }
  public function new() {
    $title = $_POST['title'];
    $detail = $_POST['detail'];

    $error_msgs = array();
    if(empty($title)) {
        $error_msgs[] = "タイトルが空です。";
    }
    if(empty($detail)) {
        $error_msgs[] = "詳細が空です。";
    }
    if(count($error_msgs) > 0) {
      $params = sprintf("?title=%s&detail=%s", $title, $detail);
      header(sprintf("location: ./new.php%s", $params));
    }

    exit;

    // $todo = new Todo;
    // $todo->setTitle($title);
    // $todo->setDetail($detail);
    // $result = $todo->save();

    $result = false;
    if($result === false) {
      $params = sprintf("?title=%s&detail=%s", $title, $detail);
      header(sprintf("location: ./new.php%s", $params));
      return;
    }
      header("location: ./index.php");

  }
}
 ?>