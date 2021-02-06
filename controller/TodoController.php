<?php 

require_once '../../model/Todo.php';
require_once '../../model/validation/TodoValidation.php';

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

    $data = array(
        "title" => $_POST['title'],
        "detail" => $_POST['detail']
    );

    $validation = new TodoValidation;
    $validation->setData($data);
    if($validation->chech() === false) {
      $error_msgs = $validation->getErrorMessages();

      session_start();
      $_SESSION['error_msgs'] = $error_msgs;


      $params = sprintf("?title=%s&detail=%s", $_POST['title'], $_POST['detail']);
      header(sprintf("location: ./new.php%s", $params));
    }

    $valid_data = $validation->getData();


    $todo = new Todo;
    $todo->setTitle($valid_data['title']);
    $todo->setDetail($valid_data['detail']);
    $result = $todo->save();

    if($result === false) {
      $params = sprintf("?title=%s&detail=%s", $valid_data['title'], $valid_data['detail']);
      header(sprintf("location: ./new.php%s", $params));
      return;
    }
      header("location: ./index.php");
  }

  public function edit() {
    $todo_id = $_GET['todo_id'];

    if($_SERVER['REQUEST_METHOD']!=="POST") {
      $todo = Todo::findById($todo_id);
      return $todo;
    }

    $title = $_POST['title'];
    $detail = $_POST['detail'];


    $todo = new Todo;
    $todo->setTitle($title);
    $todo->setDetail($detail);
    $todo->update();

  }

  public function delete() {
    $todo_id = $_GET['todo_id'];
    $is_exist = Todo::isExistById($todo_id);
    if(!$is_exist) {
      session_start();
      $_SESSION['error_msgs'] = [sprintf("id=%sに該当するレコードが存在しません",$todo_id)];
      header("Location: ./index.php");
    }

    $todo = new Todo;
    $todo->setId($todo_id);
    $result = $todo->delete();

    if($result === false) {
      session_start();
      $_SESSION['error_msgs'] = [sprintf("削除に失敗しました。id=%s",$todo_id)];
    }
    

  }
}
 ?>