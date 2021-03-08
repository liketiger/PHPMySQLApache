<?php


$conn = mysqli_connect("localhost", "root", "apmsetup", "opentutorials");
$sql = "
  insert into topic (
    title,
    description,
    created
    ) values (
      'MySQL',
      'MySQL is ..',
      NOW()
      )";
mysqli_query($conn, $sql);

?>
