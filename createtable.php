<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:caramba878.database.windows.net,1433; Database = Caramba878", "Caramba878", "535412danNN");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE registration_too(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    city VARCHAR(30),
    date DATE)";
    $conn->query($sql);
    
    echo "<h3>Таблица создана!</h3>";
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

try {
    $conn = new PDO("sqlsrv:server = tcp:caramba878.database.windows.net,1433; Database = Caramba878", "Caramba878", "535412danNN");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE city(
    id_city INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    city_name VARCHAR(30)";
    $conn->query($sql);
$sql = "INSERT INTO city (id_city, city_name) VALUES 
(1,"Moskow"),
(2,"St.Petersburg"),
(3,"Novosibirsk"),
(4,"Ecaterenburg"),
(5,"Novgorod"),
(6,"Kazan"),
(7,"Chelyabinsk"),
(8,"Omsk"),
(9,"Samara"),
(10,"Rostov na Donu");
    
    echo "<h3>Таблица  города создана!</h3>";
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}


?>
