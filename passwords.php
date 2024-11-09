<?php
$servername="localhost";
$username="root";
$password="";
$dbname="passwords"; 
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully"; 
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $password=$_POST['password']; 
    if(empty($username)||empty($email)||empty($password)){
        die("All fields are required");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        die("Invalid email format");
    }
    $stmt=$conn->prepare("INSERT INTO pass (Email,user, password) VALUES (?, ?, ?)");
    if(!$stmt){
        die("Prepare failed: ".$conn->error);
    }
    $stmt->bind_param("sss",$email,$username,$password);
    if($stmt->execute()){
        header("Location: project.html");
        exit();
    } else {
        echo "Error:".$stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>