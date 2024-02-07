//kauecodify/LogPHP-MYSQL

<?php
//database connect
$servername = "localhost"; //database_for_the_0498501785
$username = "root" //user1
$passsword = ""; //123456789
$dbname =  "database_for_the_0498501785"

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fail Connect: " . $conn->connect_error);
}

//verify data shipping for database
if (isset($_POST['email'])&&
isset($_POST['password'])) {

//capturing data that database (SQL) for verify existance these users
$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->preparate($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

//user existance = pop-up / else = commands...
if($result->num_rows > 0) {
    echo "login execute sucess!";
} else {
    echo "Email or password incorrect!";
}

//close the connections with database
$stmt->close();
$conn->close();
}
?>
