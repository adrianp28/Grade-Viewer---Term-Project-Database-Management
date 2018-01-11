<?
include "masterpage.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Get input from dept_update.php and update the record.
$studentid = $_POST["studentid"];
$sectionid = $_POST["sectionid"];
$grade = $_POST["grade"];
// the sql string
$sql = "update Enrollment set grade = '$grade' where studentid = '$studentid' and sectionid = '$sectionid'";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];
echo("<br/> <br/> <br/>");
if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

echo "<div class=\"alert alert-danger\">" .
		"<strong>Oops!</strong> Something went wrong.<br/><a href=\"AddGrades.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}
echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> Grade updated!.<br/><a href=\"AddGrades.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";


?>
