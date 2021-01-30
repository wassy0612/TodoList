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
        "title" == $_POST['title'],
        "detail" == $_POST['detail']
    );

    $validation = new TodoValidation;
    $validation->setData($data);
    if($validation->chech() === false) {
      $params = sprintf("?title=%s&detail=%s", $_POST['title'], $_POST['detail']);
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