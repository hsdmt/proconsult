<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ProConsultDb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo  "Connected successfully <br> ";

// Create database
// $sql = "CREATE DATABASE ProConsultDb";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully <br> "; 
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// sql to create table
// $sql = "CREATE TABLE Products (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     productName VARCHAR(30) NOT NULL,
//     productNumber VARCHAR(30) NOT NULL,
//     productType VARCHAR(50),
//     productSKU VARCHAR(50)
//     )";
//    // $conn->close();
   

//     if ($conn->query($sql) === TRUE) {
//       echo "Table MyGuests created successfully <br> ";
//     } else {
//       echo "Error creating table:  <br> " . $conn->error;
//     }
    $productname = $_POST["productname"]; 
    $productnumber = $_POST["productnumber"];
    $producttype = $_POST["producttype"];
    $productsku = $_POST["productsku"];
// insert record
    $sql = "INSERT INTO Products (productName, productNumber, productType, productSKU) VALUES ('" . $productname . "', '" . $productnumber . "', '" . $producttype . "', '". $productsku ."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully <br> ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// update record
$sql = "UPDATE Products SET productSKU='50' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully <br> ";
} else {
  echo "Error updating record: <br> " . $conn->error;
}

// select records
$sql = "SELECT id, productName, productNumber, productType, productSKU   FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"].  " - Nome do Produto: " . $row["productName"]. " - Numero do Produto: " . $row["productNumber"]. " - Tipo do Produto: " . $row["productType"]. " - Quantidade do Produto " . $row["productSKU"]. "<br>";
  }
} else {
  echo "0 results <br> ";
}


// delete record
$sql = "DELETE FROM Products WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


?>



