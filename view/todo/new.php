<?php
require_once '../../controller/TodoController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $controller = new TodoController();
  $controller->new();
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新規作成</title>
  <form action="./new.php" method="post">
    <div>
      <div>タイトル</div>
      <div>
        <input name="title" type="text">
      </div>
    </div>
    <div>
      <div>詳細</div>
      <div>
        <textarea name="detail"></textarea>
      </div>
    </div>
    <button type="submit">登録</button>
  </form>
</head>
<body>
  
</body>
</html>