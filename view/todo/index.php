<?php
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

$action = new TodoController;
$todo_list = $action->index();
$pdo = new PDO(DSN,USERNAME,PASSWORD);
$stmh = $pdo->query('SELECT * FROM todos');

    if(isset($_GET['action']) && $_GET['action'] === 'delete') {
      $action = new TodoController;
      $todo_list =$action->delete();
      header("location: ./index.php");
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-A=Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <title>TODOリスト</title>
</head>
<body>
  <div>
    <?php if($todo_list):?>
    <ul>
      <?php foreach($todo_list as $todo):?>
      <li>
        <a href="./detail.php?todo_id=<?php echo $todo['id'];?>">
        <?php echo "[ID]"?>
        <?php echo $todo['id'];?>
        <?php echo "[TITLE]"?>
        <?php echo $todo['title'];?>
        </a>
        <button class="delete_btn" data-id="<?php echo $todo['id'];?>">
          削除
        </button>
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
<script>
  $(".delete_btn").on('click',function() {
    const todo_id = $(this).data('id');
    alert("ID " + todo_id + " を削除して大丈夫ですか？？");
    window.location.href = "./index.php?action=delete&todo_id=" + todo_id;
  });
</script>