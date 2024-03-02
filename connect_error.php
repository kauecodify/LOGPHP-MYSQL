(connect_error) 

{ die("Fail Connect: " . $conn->connect_error); } 

if (isset($_POST['email'])&& isset($_POST['password'])) {
    
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?"; $stmt = $conn->preparate($sql); 
    
    $stmt->bind_param("ss", $email, $password); $stmt->execute(); 
    
    $result = $stmt->get_result(); //user existance = pop-up / else = commands... 
    
    if($result->num_rows > 0) { echo "login execute sucess!"; } 

else { echo "Email or password incorrect!"; } 

$stmt->close(); $conn->close(); } ?> 