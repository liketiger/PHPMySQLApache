<?php
$conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
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
    <p><a href="proj.php">프로젝트 리스트</a></p>
    <table border="1" class="table table-bordered">
      <tr>
        <td>id</td><td>프레임워크</td><td>설명</td><td></td>
        <?php
        $sql = "SELECT * FROM author";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $filtered = array(
            'id'=>htmlspecialchars($row['id']),
            'name'=>htmlspecialchars($row['name']),
            'profile'=>htmlspecialchars($row['profile'])
          );
          ?>
          <tr>
            <td><?=$filtered['id']?></td>
            <td><?=$filtered['name']?></td>
            <td><?=$filtered['profile']?></td>
            <td><a href="author.php?id=<?=$filtered['id']?>">수정</a></td>
            <td>
              <form action="process_delete_author.php" method="post" onsubmit="if(!confirm('삭제 하시겠습니까?')){return false;}">
                <input type="hidden" name="id" value="<?=$filtered['id']?>">
                <button type="submit" class="btn btn-danger">삭제</button>
              </form>
            </td>
          </tr>
          <?php
        }
         ?>
      </tr>
    </table>
    <br>
    <?php
    $escaped = array(
      'name'=>'',
      'profile'=>''
    );
    $label_submit = '추가';
    $form_action = 'process_create_author.php';
    $form_id = '';
    if(isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      settype($filtered_id, 'integer');
      $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['profile'] = htmlspecialchars($row['profile']);
      $label_submit = '수정';
      $form_action = 'process_update_author.php';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
    }
    ?>
    <form action="<?=$form_action?>" method="post">
      <?=$form_id?>
      <p><input type="text" name="name" placeholder="프레임워크" value="<?=$escaped['name']?>"></p>
      <p><textarea name="profile" placeholder="설명"><?=$escaped['profile']?></textarea></p>
      <p><input type="submit" value="<?=$label_submit?>"></p>
    </form>
  </body>
</html>
