<?
include "masterpage.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);
$studentID = $_GET["studentid"];

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$streetaddress = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zipcode"];
$studenttype = $_POST["studenttype"];
$status = $_POST["status"];
// the sql string
$sql = "update studentinfo set firstname = '$firstname', lastname = '$lastname', streetaddress = '$streetaddress', city = '$city', state = '$state', zip = '$zip', studenttype = '$studenttype', status = '$status' where studentid = '$studentID'";
//echo($sql);

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];
echo("<br/> <br/> <br/>");
if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

  display_oracle_error_message($cursor);

  die("No :(");
}
echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> You have updated ". $studentID . "'s information!.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";


?>
