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
	$sql = "select s.SectionID, s.CourseNumber, c.CourseTitle, s.Semester || '(' || Cast(year as varchar(10)) || ')' as SemesterYear, s.StartTime || '-' || s.EndTime as TotalTime, c.CreditHours , e.Grade from Enrollment e join Section s on e.SectionID = s.SectionID join Course c on c.CourseNumber = s.CourseNumber where e.StudentID = '$StudentID'";
	$result_array = execute_sql_in_oracle ($sql);
	$result = $result_array["flag"];
	$cursor = $result_array["cursor"];

	if ($result == false){
		display_oracle_error_message($cursor);
		die("Client Query Failed.");
	}

	echo "<br/> <br/> <br/>";
	echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";
	echo "<table width=\"100%\"><tr><td align=\"center\"><span style=\"font-family: Calibri; font-size: XX-Large;\">My Sections</span></td></tr></table>";
	echo "<br/>";
	echo "<table class=\"table table-hover\" border = \"1\" style=\"backgroud-color: white;\">";
	echo "<thead><tr> <th>Section ID</th> <th>Course Number</th> <th>Course Title</th> <th>Semester (year)</th> <th>Time</th> <th>Credits</th> <th>Grade</th>" . 
     		" </tr></thead>";
	echo "<tbody>";
	while ($values = oci_fetch_array ($cursor)){
		$sectionid = $values[0];
		$coursenumber = $values[1];
		$coursetitle = $values[2];
		$semester = $values[3];
		$time =  $values[4];
		$credits = $values[5];
		$grade =  $values[6];
		//$convert
		if($grade != ''){
			if($grade == 'A')
				$convert = 4;
			else if($grade == 'B')
				$convert = '3';
			else if($grade == 'C')
				$convert = '2';
			else if($grade == 'D')
				$convert = '1';
			else if($grade == 'F')
				$convert = '0';
			$sumGradeCredit += ($convert * $credits);
			$sumCredits += $credits;
			$CoursesCompleted+=1;
		}
		echo "<tr><td>$sectionid</td> <td>$coursenumber</td> <td>$coursetitle</td> <td>$semester</td><td>$time</td><td>$credits</td><td>$grade</td>";
		echo "</tr>";
}

echo "</tbody></table>";
$GPA = $sumGradeCredit / $sumCredits;
echo "<table width=\"100%\"><tr><td align=\"center\"><span style=\"font-family: Calibri; font-size: Large; font-weight: bold;\">GPA</span><br/>$GPA</td>" . 
"<td align=\"center\"><span style=\"font-family: Calibri; font-size: Large; font-weight: bold;\">Courses Completed</span><br/>$CoursesCompleted</td>".
"<td align=\"center\"><span style=\"font-family: Calibri; font-size: Large; font-weight: bold;\">Total Credits</span><br/>$sumCredits</td>".
"</tr></table>";
echo "</div>"
?>
