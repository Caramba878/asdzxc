<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:caramba878.database.windows.net,1433; Database = Caramba878", "Caramba878", "535412danNN");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE city_table(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    City VARCHAR()
    $conn->query($sql);
}
}
echo "123";
?>
