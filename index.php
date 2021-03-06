<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
    body { background-color:
 #fff; border-top: solid 10px #000;
 color: #333; font-size: .85em;
 margin: 20; padding: 20;
 font-family: "Segoe UI",
 Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; 
margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em;
 text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; 
border: 0 none; }
</style>
</head>
<body>
<h1>Register here!</h1>
<p>Fill in your name and 
email address, then click <strong>Submit</strong> 
to register.</p>
<form method="post" action="index.php" 
enctype="multipart/form-data" >
      Name  <input type="text" 
name="name" id="name"/></br>
      Email <input type="text" 
name="email" id="email"/></br>
    <select name="city">
        <option value="">All</option>
        <option value="Moskow">Moskow</option>
    <option value="Peterburg">Peterburg</option>
    <option value="Novosibirsk">Novosibirsk</option>
<option value="Ecaterenburg">Ecaterenburg</option>
        <option value="Novgorod">Novgorod</option>
<option value="Kazan">Kazan</option>
<option value="Chelyabinsk">Chelyabinsk</option>
<option value="Omsk">Omsk</option>
<option value="Samara">Samara</option>
<option value="Rostov">Rostov</option>
     
    
    </select>
    </br>

 
    <input type="submit" 
name="submit" value="Submit" />
 <input type="submit" 
name="Filtr" value="Filtr" />
 
</form>



<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:caramba878.database.windows.net,1433; Database = Caramba878", "Caramba878", "535412danNN");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

if(!empty($_POST)) {
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
   $date = date("Y-m-d");
      $city = $_POST['city'];

    
    // Insert data
    $sql_insert = 
"INSERT INTO registration_too (name, email, date, city) 
                   VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $date);
    $stmt->bindValue(4, $city);
    
    $stmt->execute();
}
catch(Exception $e) {
    die(var_dump($e));
}
echo "<h3>Your're registered!</h3>";
}

$sql_select = "SELECT * FROM registration_too";
$stmt = $conn->query($sql_select);

$stmt->execute();
if(isset($_POST['Filtr'])) {
$city = $_POST['city'];
$sql_select = "SELECT * FROM registration_on WHERE city like :city";
$stmt = $conn->prepare ($sql_select);
$stmt->execute (array(':city'=>$city.'%'));
}
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>Люди, которые зарегистрированы:</h2>";
echo "<table>";
echo "<tr><th>Name</th>";
echo "<th>Email</th>";
echo "<th>City</th>";
echo "<th>Date</th></tr>";
foreach($registrants as $registrant) {
echo "<td>".$registrant['name']."</td>";
echo "<td>".$registrant['email']."</td>";
echo "<td>".$registrant['city']."</td>";
echo "<td>".$registrant['date']."</td></tr>";
}
echo "</table>";
}
else {
    echo "<h3>No one is currently registered.</h3>";
}

?>
</body>
</html>
