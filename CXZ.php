<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:caramba878.database.windows.net,1433; Database = Caramba878", "Caramba878", "535412danNN");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE city_table(
  $arr[1] = "Первый";
  $arr[2] = "Второй";
  $arr[3] = "Третий";
  $arr[4] = "Четвёртый";
  if(count($arr) > 0)
  {
    echo "<select name=id_catalog onchange='show(this.form.id_catalog)'>";
    echo "<option value=0>Не имеет значения</option>";
    foreach($arr as $index => $value)
    {
      echo "<option value=$index>$value</option>";
    }
    echo "</select>";
 }
?>
