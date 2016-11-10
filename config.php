<?php
		//initialising the server name, username, password, database name for connection as well as the table name for queries
		$serverName = "localhost";
		$userName = "root";
		$password = '';
		$dbName = "testing";
		
		// Create connection
		$conn = new mysqli($serverName, $userName, $password);
		
		// Check connection
		if ($conn->connect_error) 
			{
				"<font color=red><p>Unable to connect to the database server.<br />
							Error Code ". $conn->errno." : ". $conn->error." </font></p>";
			} 
		else
			{
				// echo "<font color=red><p>Unable to select the database.<br />
						// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
						
					//creating database
					$SQLquery = "CREATE DATABASE IF NOT EXISTS $dbName";
					
					//checks whether there's an error creating the database
					if ($conn->query($SQLquery) == FALSE) 
						{
							echo "<font color=red><p>Unable to create the database.<br />
									Error Code ". $conn->errno." : ". $conn->error." </font><br><ve>";
						} 
					else 
						{
							// echo "<font color=green><p>Database: '$dbName' has been succesfully created.</p></font><br>";
						}
			}
			
		//Create connection again after database has been created
		$conn = new mysqli($serverName, $userName, $password, $dbName);
				
?>