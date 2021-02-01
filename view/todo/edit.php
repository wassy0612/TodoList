<?php
require_once '../../controller/TodoController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $controller = new TodoController();
  $controller->new();
}

$title = '';
$detail = '';
if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(isset($_GET['title'])) {
      $title = $_GET['title'];
    }
    if(isset($_GET['detail'])) {
      $detail = $_GET['detail'];
    }
}

session_start();
$error_msgs = $_SESSION['error_msgs'];
unset($_SESSION['error_msgs']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>編集</title>
  <form action="./new.php" method="post">
    <div>
      <h1>編集</h1>
      <div>
        <input name="title" type="text" value="<?php echo $title;?>">
      </div>
    </div>
    <div>
      <div>詳細</div>
      <div>
        <textarea name="detail"><?php echo $detail;?></textarea>
      </div>
    </div>
    <button type="submit">登録</button>
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
</head>
<body>
</body>
</html>