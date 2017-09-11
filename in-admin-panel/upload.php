<?php
//basename - Returns trailing name component of path
include'conn.php';
echo basename($_FILES["fileToUpload"]["name"]) . "<br>"; //file name selected
echo basename($_FILES["fileToUpload"]["tmp_name"]). "<br>"; //temporary file name into the server
echo $_FILES["fileToUpload"]["size"]. "<br>"; //File Size
echo pathinfo(($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION). "<br>"; //type of file
//echo basename($_FILES["fileToUpload"]["type"]). "<br>"; 

$len=strlen($_FILES["fileToUpload"]["name"]);
$target_dir="uploads/";
$filename=$target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename=$target_dir . time()."ab". basename($_FILES["fileToUpload"]["name"]);
$filetype=pathinfo(($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
$filesize=$_FILES["fileToUpload"]["size"];

echo $filename;

if($_SERVER["REQUEST_METHOD"] == "POST") 		//if(isset($_POST["submit"]))
{
	if($len>0)		//check file selected or not
	{
			if($filetype=="jpg") // check file type jpg or not
			{
				if($filesize<500000) //check file size less then 500 kb
				{
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename))
							echo "File Uploaded into the server";
						else
							echo "Error Occurred";
				}
				else
				{
						echo "File size exceed";
				}
				
			}
			else
			{
				echo "Wrong File Type";
			}
		
	}
	else
	{
		echo "select File";
	}
}
else
{
	
	echo "file can't upload";
}

?>