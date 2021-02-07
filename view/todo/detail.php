<?php
require_once '../../config/database.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

$action = new TodoController;
$todo_id = $action->detail();

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-A=Compatible" content="ie=edge">
  <title>詳細画面</title>
</head>
<body>
  <table class="table">
    <thead>
      <tr>
        <h1>詳細画面</h1>
      </tr>
    </thead>
    <tbody>
      <div>
        <button>
          <a href="./edit.php?todo_id=<?php echo $todo_id['id'];?>">編集</a>
        </button>
      </div>
      <tr>
        <td scope="row"><?php echo $todo_id['title'];?></td>
        <td><?php echo $todo_id['detail'];?></td>
      </tr>
    </tbody>
  </table>
</body>
</html>