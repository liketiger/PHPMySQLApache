<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
    $filtered = array(
      'title'=>mysqli_real_escape_string($conn, $_POST['title']),
      'description'=>mysqli_real_escape_string($conn, $_POST['description']),
      'link'=>mysqli_real_escape_string($conn, $_POST['link']),
      'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
    );
    $sql = "
      insert into topic
      (title, description, created, link, author_id)
      values(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        '{$filtered['link']}',
        {$filtered['author_id']}
        )
    ";
    $result = mysqli_query($conn, $sql);
    if($result == false){
      echo '문제 발생';
    }
    else{
      echo '성공했습니다. <a href="proj.php">돌아가기</a>';
    }
    ?>
  </body>
</html>
