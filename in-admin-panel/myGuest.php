<?php
// define variables and set to empty values
$hotel_name = $city = $no_of_rooms = $price_per_night = $rating = $remarks=$thumbnail=$contents=$capacity="";

		include 'conn.php';
		include 'upload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $hotel_name = test_input($_POST["hotel_name"]);
   $city = test_input($_POST["city"]);
   $no_of_rooms = test_input($_POST["no_of_rooms"]);
   $price_per_night = test_input($_POST["price_per_night"]);
   $rating = test_input($_POST["rating"]);
   $remarks = test_input($_POST["remarks"]);
   $tags = test_input($_POST["interests[]"]);
   $room_type = test_input($_POST["type"]);
   $filename = test_input($_POST["thumbnail"]);
   $contents = test_input($_POST["contents"]);
   $capacity = test_input($_POST["capacity"]);

   $sql1 = "INSERT INTO hotel_list (hotel_name,city,tags) VALUES ('$hotel_name', '$city','$tags')";
		echo $sql1;


		if (mysqli_query($conn, $sql1)) 
		{
			header('Location: myGuest.php?error=success');
			}

		$sql2 = "INSERT INTO room_info (no_of_rooms,price_per_night,rating,remarks,capacity) VALUES ('$no_of_rooms','$price_per_night','$rating','$remarks','$capacity')";
		echo $sql2;


		if (mysqli_query($conn, $sql2)) 
		{
			header('Location: myGuest.php?error=success');
		} 

		$sql3 = "INSERT INTO room_type (type) VALUES ('$room_type')";
		echo $sql3;
		if (mysqli_query($conn, $sql3)) 
		{
			header('Location: myGuest.php?error=success');
			} 

			$sql4 = "INSERT INTO hotel_info (contents) VALUES ('$contents')";
			echo $sql4;
		if (mysqli_query($conn, $sql4)) 
		{
			header('Location: myGuest.php?error=success');
			} 



			$sql5 = "INSERT INTO room_info (thumbnail) VALUES ('$filename')";
			echo $sql5;
		if (mysqli_query($conn, $sql5)) 
		{
			header('Location: myGuest.php?error=success');
			} 



		mysqli_close($conn);
	
}

function test_input($data) {
   $data = trim($data);	// Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
   $data = stripslashes($data); //Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
   $data = htmlspecialchars($data); //The htmlspecialchars() function converts special characters to HTML entities.
   return $data;
}
	
	
?>
<!DOCTYPE html>
<html>
<body>

<h1></h1>
<p> 
<?php
		if(isset($_REQUEST['error']))
		{
			if($_REQUEST["error"]=="success")
			{
				echo "New record created successfully";
			}	
			else
				echo "Error: ";
		}

?>



</body>
</html>