<?php
echo $path = $_SERVER['DOCUMENT_ROOT'];
if(isset($_POST['signup']))
{
	$username = $_POST['username'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'india123';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	$sql = "CREATE Database $username";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not create database: ' . mysql_error());
	}
	
		mysql_select_db("$username") or die(mysql_error());
		$path = $_SERVER['DOCUMENT_ROOT'].'/account.sql';
		$fp = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$query = '';
		foreach ($fp as $line) {
		    if ($line != '' && strpos($line, '--') === false) {
		        $query .= $line;
		        if (substr($query,-1) == ';') {
		        	$retval = mysql_query($query,$conn);
		            $query = ''; 
		        }
		    }
		}
		
		if(! $retval )
		{
		  die('Could not create table: ' . mysql_error());
		}
		echo "Table employee created successfully\n";
		mysql_close($conn);
}

?>
<html>
	<body>
		<center>
		<form method="post" name="signup">
		Username: <input type="text" name="username" />
		<input type="submit" name="signup" value="Sign Up" />	
		</form>
		</center>
	</body>
</html>
