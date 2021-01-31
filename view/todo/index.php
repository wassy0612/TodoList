<?php
// require_once '../../config/database.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

$pdo = new PDO(DSN,USERNAME,PASSWORD);
$stmh = $pdo->query('SELECT * FROM todos');

$action = new TodoController;
$todo_list = $action->index();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-A=Compatible" content="ie=edge">
  <title>TODOリスト</title>
</head>
<body>
  <div>
    <?php if($todo_list):?>
    <ul>
      <?php foreach($todo_list as $todo):?>
      <li>
        <a href="./detail.php?todo_id=<?php echo $todo['id'];?>">
        <?php echo $todo['title'];?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php else:?>
    <div>データなし</div>
    <?php endif;?>
  </div>
  <div>
    <a href="./new.php">新規作成</a>
  </div>

</body>
</html>