<!Doctype html>
<html>
<head><title>Registration Page</title></head>
<body>
	<?php
	if(isset($_GET['message'])){
    	echo "<label style='color:red'>".$_GET['message']."</label>";
	}
	?>
	<?php error_reporting(E_ALL); ?>
	<center>Registration
	<?php include '../query/insert.php'; ?>
	<form method="post" action="../query/insert.php">
		Roll: <br>
		<input type="text" name="roll" required="required"
		<?php if(!empty($rowDetails)) ?>
		value = "<?php echo $rowDetails['roll']; ?>"
		>
		<br>

		Name:<br>
		<input type="text" name="name" required="required"
		<?php if(!empty($rowDetails)) ?>
		value = "<?php echo $rowDetails['name']; ?>"
		>
		<br>

		Username:<br>
		<input type="text" name="username" required="required"
		<?php if(!empty($rowDetails)) ?>
		value = "<?php echo $rowDetails['username']; ?>"
		>
		<br>

		Password:<br>
		<input type="password" name="pass" required="required"
		<?php if(!empty($rowDetails)) ?>
		value = "<?php echo $rowDetails['password']; ?>"
		>
		<br>
		<input type="submit" name="Submit">
		<input type="hidden" name="submit" value=
		<?php if(!empty($rowDetails)) ?>
		"1"
		/>
		<br>
	</form>
	
<table style="width:100%">
  <tr>
  	<td>Sl No.</td>
    <td>Roll</td>
    <td>Name</td> 
    <td>Username</td>
    <td>Password</td>
    <td>Action</td>
    <td>Delete</td>
  </tr>
<?php 
	$i = 1;
	while ($row = mysqli_fetch_array($sql_fetch, MYSQLI_ASSOC)) 
	{
		if(empty($row))
		{
			echo "<tr><td colspan='6'>No Record Found</td><tr>";
		}
		else
		{
		echo "<tr><td>".$i."</td><td>".$row['roll']."</td><td>".$row['name']."</td>
		<td>".$row['username']."</td><td>".$row['password']."</td>
		<td><a href=index.php?roll=".$row['roll'].">Edit</a></td>
		<td><a href=index.php?roll=".$row['roll'].">Delete</a></td></tr>";
		$i++;
		}
	}

	//while ($row = mysql_fetch_assoc($resource_id))
	//{
    // echo <a href="index.php?id={$row['id']}">Delete row</a>;
	//}
 ?>

</table>

</center>
</body>	
</html>