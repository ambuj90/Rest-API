<html>
	 
	 <head>
			<title>Add New Record in MySQL Database</title>
	 </head>
	 
	 <body>
			<?php
				 if(isset($_POST['add'])) {
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "followup_email";
					 $conn = new mysqli($servername, $username, $password, $dbname);

						
					if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
           }else {
             echo "Ambuj";
         }
					
							 $LeadId = $_POST['LeadId'];
							 $LoanStatus = $_POST['LoanStatus'];
			 
							$EmailCampName = $_POST['EmailCampName'];

					 
						
					$sql = "INSERT INTO followup_email(LeadId, LoanStatus, EmailCampName,createdBy, updatedBy) VALUES('$LeadId', '$LoanStatus', '$EmailCampName	', '$LeadId','RadCred' )";
							   

						// mysql_select_db('followup_email');
						// $retval = mysql_query( $sql, $conn );
						
						// if(! $retval ) {
						// 	 die('Could not enter data: ' . mysql_error());
						// }
						
						echo "Entered data successfully\n";
						
						if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
               //echo $ret;
            } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }

           $conn->close();
				 }else {
						?>
						
							 <form method = "post" action = "<?php $_PHP_SELF ?>">
									<table width = "400" border = "0" cellspacing = "1" 
										 cellpadding = "2">
									
										 <tr>
												<td width = "100">Lead ID</td>
												<td><input name = "LeadId" type = "text" 
													 id = "LeadId"></td>
										 </tr>
									
										 <tr>
												<td width = "100">Loan Status</td>
												<td><input name = "LoanStatus" type = "text" 
													 id = "LoanStatus"></td>
										 </tr>
									
										 <tr>
												<td width = "100">Email Camp Name</td>
												<td><input name = "EmailCampName" type = "text" 
													 id = "EmailCampName"></td>
										 </tr>
									
										 <tr>
												<td width = "100"> </td>
												<td> </td>
										 </tr>
									
										 <tr>
												<td width = "100"> </td>
												<td>
													 <input name = "add" type = "submit" id = "add" 
															value = "Add Employee">
												</td>
										 </tr>
									
									</table>
							 </form>
						
						<?php
				 }
			?>


	
	 
	 </body>
</html>