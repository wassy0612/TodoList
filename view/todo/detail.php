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
        <th>タイトル</th>
        <th>詳細</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row"><?php echo $todo_id['title'];?></td>
        <td><?php echo $todo_id['detail'];?></td>
      </tr>
    </tbody>
  </table>
</body>
</html>