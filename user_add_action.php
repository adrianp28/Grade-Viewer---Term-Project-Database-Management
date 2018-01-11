<?
include "masterpage.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);
$connection = oci_connect ("gq016", "fobblk", "gqiannew2:1521/pdborcl");
if ($connection == false){
   $e = oci_error(); 
   die($e['message']);
}

$query = "begin " .
       	 "AddStudent(:firstName, :lastName, :StreetAddress, :city, :state, :zip, :StudentType, :Status, :message); " .
         "end;";

	$cursor = oci_parse($connection, $query);
	if ($cursor == false){
   		$e = oci_error($connection);  
   	die($e['message']);
	}

	// after parsing, bind the variable with Oracle variable.
	oci_bind_by_name($cursor, ":firstName", $firstName, 30);
	oci_bind_by_name($cursor, ":lastName", $lastName, 30);
	oci_bind_by_name($cursor, ":StreetAddress", $StreetAddress, 100);
	oci_bind_by_name($cursor, ":city", $city, 20);
	oci_bind_by_name($cursor, ":state", $state, 20);
	oci_bind_by_name($cursor, ":zip", $zip, 10);
	oci_bind_by_name($cursor, ":StudentType", $StudentType, 30);
	oci_bind_by_name($cursor, ":Status", $status, 30);
	oci_bind_by_name($cursor, ":message", $message, 100);
	$firstName = $_POST["fname"];
	$lastName = $_POST["lname"];
	$StreetAddress = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zipcode"];
	$StudentType = $_POST["studenttype"];
	$status = $_POST["status"];

	$result = oci_execute($cursor, OCI_NO_AUTO_COMMIT);
	if ($result == false){
   		$e = oci_error($cursor);  
		echo "<br/><br/><br/>";
   		echo($e['message']);
	}

	oci_commit($connection);
	oci_close($connection);

// Get input from dept_update.php and update the record.


echo("<br/> <br/> <br/>");
if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

echo "<div class=\"alert alert-danger\">" .
		"<strong>Oops!</strong> Something went wrong.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}
else{
	echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> $message.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}

?>
