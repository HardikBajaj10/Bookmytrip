<html>
<body>
<?php
if (isset($_POST['signup_submit'])) {
function setValues(){
global $name,$email,$pass;
$name=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["password"];
   return true;
}
function WelcomeMessage(){
global $name;
echo "Signed up successfully, ".$name."<br> Welcome to BookMyTrip. <br> <br>";
}
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
	setValues();
	}
	else{
	echo "Please fill in all the fields <br><br>";
	}
if (setValues()){
$conn = mysqli_connect("localhost", "root", "", "passwords");
$query="INSERT INTO pass VALUES('$email','$name','$pass')";
$rs = mysqli_query($conn, $query);
    if($rs)
    {
        echo "Entries added! <br><br>";
    }
mysqli_close($conn);
} 
}
?>
<a href="project.html"><button> Return to Home Page </button></a>
</center>
</body>
</html>
