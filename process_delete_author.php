<?php
    $conn = mysqli_connect('localhost', 'root', 'apmsetup', 'opentutorials');
    settype($_POST['id'], 'integer');
    $filtered = array(
      'id'=>mysqli_real_escape_string($conn, $_POST['id'])
    );
    $sql = "
      delete
        from topic
        where author_id = {$filtered['id']}
    ";
    mysqli_query($conn, $sql);

    $sql = "
      delete
        from author
        where id = {$filtered['id']}
    ";
    $result = mysqli_query($conn, $sql);
    if($result == false){
      echo '문제 발생';
    }
    else{
      header('Location: author.php');
    }
?>
