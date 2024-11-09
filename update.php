<html>
<body>
<center>
<?php
function setValues(){
global $email,$pass;
$email=$_POST["email"];
$pass=$_POST["password"];
return true;
}
function WelcomeMessage(){
echo "Password Updated Successfully <br> Login again to continue. <br> <br>";
}
if (isset($_POST["email"]) && isset($_POST["password"])){
	setValues();
	}
if (setValues()){
$conn = mysqli_connect("localhost", "root", "", "passwords");
$query="UPDATE pass set password='$pass' where Email='$email'";
$rs = mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn)>0)
    {
       WelcomeMessage();
    }
    else{
    echo"No user found with this email. <br><br>
    <a href='passwords.html'><button>Try again</button></a>";
    die();
    }
mysqli_close($conn);
}
else{
      echo "Passwords do not match <br> <br>";}
?>
<a href="project.html"><button> Return to Home Page </button></a>
</center>
</body>
</html>
