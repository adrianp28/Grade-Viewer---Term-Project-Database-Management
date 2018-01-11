<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_student($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	$username = getUsername($sessionid);
	$sql = "select StudentID, Firstname, LastName, StreetAddress, City, State, ZIP, GPA, StudentType, Status from StudentInfo where Username = '$username'";
	$result_array = execute_sql_in_oracle ($sql);
	$result = $result_array["flag"];
	$cursor = $result_array["cursor"];

	if ($result == false){
		display_oracle_error_message($cursor);
		die("Client Query Failed.");
	}
	
	echo "<br/> <br/> <br/>";
	echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";

	echo "<table width=\"100%\"><tr><td align=\"center\"><span style=\"font-size: X-Large; font-family: Calibri;\">Student Information</span></td></tr></table>";
	echo "<br/>";
	echo "<table class=\"table table-hover\" border=1>";
	echo "<thead><tr> <th>Student ID</th> <th>First Name</th> <th> Last Name</th> <th>Street Address</th> <th>City</th> <th>State</th> <th>Zip</th> <th>GPA</th> <th>Type</th> <th>Status</th>" . 
     		" </tr></thead>";
	echo "<tbody>";
	while ($values = oci_fetch_array ($cursor)){
		$studentid = $values[0];
		$firstname = $values[1];
		$lastname = $values[2];
		$Street = $values[3];
		$city =  $values[4];
		$state = $values[5];
		$zip =  $values[6];
		$gpa =  $values[7];
		$type = $values[8];
		$status = $values[9];

		echo "<tr><td>$studentid</td> <td>$firstname</td> <td>$lastname</td> <td>$Street</td><td>$city</td><td>$state</td><td>$zip</td><td>$gpa</td><td>$type</td><td>$status</td>";
		echo "</tr>";
}

echo "</tbody></table>";
echo "</div>";
?>
