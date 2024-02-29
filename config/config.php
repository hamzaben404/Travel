<?php 

// create constants to store non repeating value
define('siteUrl', 'http://localhost:8888/travelwebsite2/');
define('localhost', 'localhost');
define('db_username', 'root');
define('db_password', 'root');
define('db_name','travel');

// try{
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname,$username,$password");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "success";
// }catch(PDOException $e){
//     echo "ERR";
//     $e->getMessage();
// }

$conn = mysqli_connect(localhost, db_username, db_password);
$db_select = mysqli_select_db($conn, db_name);

?>