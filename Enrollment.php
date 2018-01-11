<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_student($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	$username = getUsername($sessionid);
	$StudentID = getStudentID($username);
	if(($searchValue = $_POST["searchValue"]))
	{
		$searchBy = $_POST["searchterm"];
		$searchby = 's.' . $searchby;
		$sql = "select * from AvaSections where " . $searchBy . " like'%$searchValue%'";
	}
	else
	{
		$sql = "select * from AvaSections";
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
	echo "<form method=\"post\" action=\"Enrollment.php?sessionid=$sessionid\">" .
		"<table style=\"padding-left:5%;\"><tr><td>" .
		"<br/><select id=\"cmbTerm\" name=\"searchterm\" class=\"select-picker\">" .
			"<option value=\"SEMESTERYEAR\">Semester</option>" .
			"<option value=\"CourseNumber\">Course Number</option>" .
			"<option value=\"SEMESTERYEAR\">Year</option>" .
		"</select> <br/> <span style=\"font-family:Calibri; font-size: Large;\">Contains</span>" .
		"<input type=\"text\" class=\"form-control\" name=\"searchValue\" style=\"width: 100px;\">" .

		"<br/><input type=\"submit\" value=\"Search\" class=\"btn btn-primary\">" .
		"</td></tr></table>" .
		"</form>";
	echo "<br/>";
	echo("<form method=\"post\" action=\"Enroll.php?sessionid=$sessionid\">");
	echo("<input type=\"submit\" value=\"Enroll\" class=\"btn btn-default\">");
	echo "<table width=\"100%\"><tr><td align=\"center\"><span style=\"font-size:XX-Large; font-family:Calibri;\"> Available Secions:</span></td></tr></table>";	
	echo "<table class=\"table table-hover\" border = \"1\" style=\"backgroud-color: white;\">";
	echo "<thead><tr> <th>Section ID</th> <th>Course Number</th> <th>Course Title</th><th>Description</th> <th>Semester (year)</th> <th>Time</th> <th>Credits</th> <th>Capacity</th> <th>Remaining</th><th>Enroll</th>" . 
     		" </tr></thead>";
	echo "<tbody>";
	while ($values = oci_fetch_array ($cursor)){
		$sectionid = $values[0];
		$coursenumber = $values[1];
		$coursetitle = $values[2];
		$description = $values[3];
		$semester = $values[4];
		$time =  $values[5];
		$credits = $values[6];
		$capacity = $values[7];
		$remain = $values[8];
		echo "<tr><td>$sectionid</td> <td>$coursenumber</td> <td>$coursetitle</td><td>$description</td> <td>$semester</td><td>$time</td><td>$credits</td> <td>$capacity</td> <td>$remain</td>" .
			"<td>";
			if($remain > 0){
			echo "<div class=\"checkbox\">";
  			echo "<label><input type=\"checkbox\" name=\"check_list[]\" value=\"$sectionid\"></label>";
			echo"</div>";
			}
			"</td></tr>"; 
}

echo "</tbody></table>";
echo "</form>";
$GPA = $sumGradeCredit / $sumCredits;
echo "</div>"
?>
