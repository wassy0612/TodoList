<?php
require_once '../../controller/TodoController.php';
require_once '../../model/Todo.php';
require_once '../../controller/TodoController.php';

session_start();

$action = new TodoController;
$todo = $action->edit();


  // セッション情報の取得
$error_msgs = $_SESSION['error_msgs'];

//セッション削除
unset($_SESSION['error_msgs']);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>編集</title>
</head>
<body>
  <div>編集</div>
  <form action="./index.php" method="POST">
    <div>
      <div>タイトル</div>
      <div>
        <input name="title" type="text" value="<?php echo $todo['title'];?>">
      </div>
    </div>
    <div>
      <div>詳細</div>
      <div>
        <textarea name="detail"><?php echo $todo['detail'];?></textarea>
      </div>
    </div>
    <button type="submit">更新</button>
  </form>
  <?php if($error_msgs): ?>
    <div>
      <ul>
        <?php foreach ($error_msgs as $error_msg): ?>
          <li><?php echo $error_msg;?></li>
        <?php endforeach;?>
      </ul>
    </div>
  <?endif;?>
</body>
</html>