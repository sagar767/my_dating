<?php
//We are including the file of connection.......................
include '../connection.php';

$roll = $_POST["roll"];
$submit = $_POST["submit"];
$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["pass"];

if(isset($_GET['roll'])){
	$roll_id = $_GET['roll'];
	$sql_fetch_id = mysqli_query($db, "SELECT * FROM registration_form_data where roll = '$roll_id'");
	$rowDetails = mysqli_fetch_array($sql_fetch_id, MYSQLI_ASSOC);
}

	//Displaying
	$sql_fetch =  mysqli_query($db, "SELECT * FROM registration_form_data");

		if($submit == 1){
			// insert code
			$sql_insert =  mysqli_query($db, "INSERT INTO registration_form_data(roll,name,username,password) VALUES ('$roll','$name','$username','$password') ");

			if($sql_insert) 
			{
			    $message = urlencode("New record created successfully");
			    header("Location: ../view/index.php?message=".$message);
			} 
			else 
			{	
				$message = urlencode("Some error occured please try after some time ");
			    header("Location: ../view/index.php?message=".$message);
			}
		}
		else{
			// Code for update...
			echo $roll;
			$sql_update = mysqli_query($db, "UPDATE registration_form_data SET name ='$name', username = '$username',password = '$password' WHERE roll = '$roll'");
		
			
			if($sql_insert) 
			{
			    $message = urlencode("New record created successfully");
			    header("Location: ../view/index.php?message=".$message);
			} 
			else 
			{	
				$message = urlencode("Some error occured please try after some time ");
			    header("Location: ../view/index.php?message=".$message);
			}	
		
		}


//Code for delete...

 $sql_delete=mysql_query($db,"DELETE FROM registration_form_data WHERE roll =$roll");



mysqli_close($conn);

?>



