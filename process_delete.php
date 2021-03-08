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
      'id'=>mysqli_real_escape_string($conn, $_POST['id'])
    );
    $sql = "
      delete
        from topic
        where id = {$filtered['id']}
    ";
    $result = mysqli_query($conn, $sql);
    if($result == false){
      echo '문제 발생';    
    }
    else{
      echo '삭제했습니다. <a href="proj.php">돌아가기</a>';
    }
    ?>
  </body>
</html>
