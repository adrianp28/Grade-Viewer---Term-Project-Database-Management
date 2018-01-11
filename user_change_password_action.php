<?
include "masterpage.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Get input from dept_update.php and update the record.
$curpass = $_POST["currentPassword"];
$newPass = $_POST["newPassword"];
$newPass = $_POST["lname"];
// the sql string
if($priority === "Student")
	$student = "1";
else if($priority === "Admin")
	 $admin = "1";
else if($priority === "StudentAdmin")
	 $studentadmin = "1";

$sql = "insert into users values('$username','Oklahoma1', '$student', '$admin', '$studentadmin', '$firstname', '$lastname')";



$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];
echo("<br/> <br/> <br/>");
if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

echo "<div class=\"alert alert-danger\">" .
		"<strong>Oops!</strong> Something went wrong.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}
echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> You have added ". $username . "!.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";


?>
