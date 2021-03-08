<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
    settype($_POST['id'], 'integer');
    $filtered = array(
      'id'=>mysqli_real_escape_string($conn, $_POST['id']),
      'title'=>mysqli_real_escape_string($conn, $_POST['title']),
      'description'=>mysqli_real_escape_string($conn, $_POST['description']),
      'link'=>mysqli_real_escape_string($conn, $_POST['link'])
    );
    $sql = "
      UPDATE topic
        SET
          title = '{$filtered['title']}',
          description = '{$filtered['description']}',
          link = '{$filtered['link']}'          
      WHERE
        id = '{$filtered['id']}'
    ";
    $result = mysqli_query($conn, $sql);
    if($result == false){
      echo '문제 발생';
    }
    else{
      echo '수정했습니다. <a href="proj.php">돌아가기</a>';
    }
    ?>
  </body>
</html>
