<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RESULT</title>
  </head>
  <body>
    <?php
    echo "이름 : ".$_POST['na']."<br>";
    echo "주소 : ".$_POST['ad']."<br>";
    echo "전화번호 : ".$_POST['tel']."<br>";
    ?>
    <form action="form_s.php" method="post">
      <input type="submit" value="되돌아가기">
    </form>

  </body>
</html>
