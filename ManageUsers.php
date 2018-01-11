<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_admin($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	if(($searchValue = $_POST["searchValue"]))
	{
		$searchBy = $_POST["searchterm"];
		//die("Testing" . $searchBy);
		$sql = "select StudentID, FirstName, LastName, StreetAddress, City, State, Zip, StudentType, GPA, Status from StudentInfo where " . $searchBy . " like '%$searchValue%'";
	}
	else
	{

		$sql = "select StudentID, FirstName, LastName, StreetAddress, City, State, Zip, StudentType,GPA, Status from StudentInfo";
		//$sql = "select FirstName, LastName, username from users";
	}
	$result_array = execute_sql_in_oracle ($sql);
	$result = $result_array["flag"];
	$cursor = $result_array["cursor"];

	if ($result == false){
		display_oracle_error_message($cursor);
		die("Client Query Failed.");
	}

	echo "<br/> <br/> <br/>";
	echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";

	echo "<table><tr><td><span style=\"font-family: Calibri; font-size: XX-Large;\">Manage Students</span></td></tr></table> <hr/>";
	echo "<table><tr><td><a href=\"AddUser.php?sessionid=$sessionid\" type=\"button\" class=\"btn btn-default btn-lg\">" . 
	"<span class=\"glyphicon glyphicon-plus\"> Add Student</span>" . 
	"</a></td></tr></table><hr/>";
	echo "<br/>";
	echo "<form method=\"post\" action=\"ManageUsers.php?sessionid=$sessionid\">" .
		"<table style=\"padding-left:5%;\"><tr><td>" .
		"<br/><select id=\"cmbTerm\" name=\"searchterm\" class=\"select-picker\">" .
			"<option value=\"firstname\">First Name</option>" .
			"<option value=\"lastname\">Last Name</option>" .
			"<option value=\"studentID\">Student ID</option>" .
			"<option value=\"studenttype\">Student Type</option>" .
			"<option value=\"status\">Status</option>" .
		"</select> <br/> <span style=\"font-family:Calibri; font-size: Large;\">Contains</span>" .
		"<input type=\"text\" class=\"form-control\" name=\"searchValue\" style=\"width: 100px;\">" .

		"<br/><input type=\"submit\" value=\"Search\" class=\"btn btn-primary\">" .
		"</td></tr></table>" .
		"</form>";
	echo "<br/>";
	echo "<table class=\"table table-hover\" border=1>";
	echo "<thead><tr> <th>Student ID</th> <th>First Name</th> <th>Last Name</th> <th>Address</th> <th>City</th> <th>State</th> <th>Zipcode</th>" .
		"<th>Student Type</th> <th>GPA</th> <th>Status</th> <th>Edit</th> <th>Reset</th>" . 
     		" </tr></thead>";
	echo "<tbody>";
	while ($values = oci_fetch_array ($cursor)){
		$StudentID = $values[0];
		$firstname = $values[1];
		$lastname = $values[2];
		$address = $values[3];
		$city = $values[4];
		$state = $values[5];
		$zipcode = $values[6];
		$studentType = $values[7];
		$gpa = $values[8];
		$status = $values[9];

		echo "<tr><td>$StudentID</td><td>$firstname</td> <td>$lastname</td> <td>$address</td> <td>$city</td> <td>$state</td> <td>$zipcode</td>" .
			" <td>$studentType</td> <td>$gpa</td> <td>$status</td>" .
			"<td><a href=\"EditUser.php?sessionid=$sessionid&studentid=$StudentID\" type=\"button\" class=\"btn btn-default btn-sm\">" .
			"<span class=\"glyphicon glyphicon-edit\"></span> Edit" .
			"</button></td>" .
			"<td><a href=\"ResetPassword.php?sessionid=$sessionid&studentid=$StudentID\" type=\"button\" class=\"btn btn-default btn-sm\">" .
			"<span class=\"glyphicon glyphicon-wrench\"></span> Reset Password" .
			"</button></td>" .
        		"</tr>";
}

echo "</tbody></table>";
echo "</div>";
?>
