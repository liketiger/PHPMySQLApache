<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MySQL_SQL</title>
  </head>
  <body>
    <table width=800 border=1 cellpadding=10>
      <?
      $connect=mysql_connect("localhost", "root", "apmsetup");
      mysql_set_charset("utf8", $connect);
      mysql_select_db("korea_db",$connect);
      $sql="select * from department;";
      $result=mysql_query($sql, $connect);
      $fields=mysql_num_fields($result);
      while($row=mysql_fetch_row($result)){
        echo "<tr>";
          for($i=0; $i < $fields; $i=$i+1){
            echo "<td>$row[$i]</td>";
          }
        echo "</tr>";
      }
      mysql_close($connect);
      ?>
    </table>
  </body>
</html>
