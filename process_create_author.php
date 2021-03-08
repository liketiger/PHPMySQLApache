<?php
    $conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
    $filtered = array(
      'name'=>mysqli_real_escape_string($conn, $_POST['name']),
      'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
    );
    $sql = "
      insert into author
        (name, profile)
        values(
          '{$filtered['name']}',
          '{$filtered['profile']}'
        )
    ";
    $result = mysqli_query($conn, $sql);
    if($result == false){
      echo '문제 발생';
    }
    else{
      header('Location: author.php');
    }
?>
