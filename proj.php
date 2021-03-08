<?php
$conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"proj.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array('title'=>'어서오세요', 'description'=>'2017270982 컴퓨터융합소프트웨어 황성재의 <br> 웹 포트폴리오 입니다.');
$update_link = '';
$delete_link = '';
$author = '';
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name'] = htmlspecialchars($row['name']);
  $article['link'] = htmlspecialchars($row['link']);

  $update_link = '<a href="update.php?id='.$_GET['id'].'">수정</a>';
  $delete_link = '
    <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <button type="submit" class="btn btn-danger">삭제</button>
    </form>
  ';
  $author = "<p>Made with {$article['name']}</p>";
  $ad = $article['link'];
  $link = "<br><br>링크: <a href='$ad'>{$ad}</a><br>";
}
?>
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>포트폴리오</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1><a href="proj.php">포트폴리오</a></h1>
    <a href="author.php">프레임워크</a>
    <ol>
      <?=$list?>
    </ol>
    <p><a href="create.php">추가</a></p>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <?=$link?>
    <?=$author?>
  </body>
</html>
