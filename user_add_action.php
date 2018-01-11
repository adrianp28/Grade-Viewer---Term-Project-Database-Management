<?
//Always Include master page in all php files
include "masterpage.php";

$sessionid =$_GET["sessionid"];
//function in the Utility_functions page
verify_session($sessionid);
//creates a connection to oracle
$connection = oci_connect ("gq016", "fobblk", "gqiannew2:1521/pdborcl");
//if anything is wrong with the connection we will die
if ($connection == false){
   $e = oci_error(); 
   die($e['message']);
}
//create a query that creates a call to the Stored Procedure AddStudent
$query = "begin " .
       	 "AddStudent(:firstName, :lastName, :StreetAddress, :city, :state, :zip, :StudentType, :Status, :message); " .
         "end;";
	// creates a cursor
	$cursor = oci_parse($connection, $query);
	if ($cursor == false){
   		$e = oci_error($connection);  
   	die($e['message']);
	}
	/**********************************************************
	// Start
	// after parsing, bind the variable with Oracle variable.
	***********************************************************/
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
	//END
	//Executes the stored procedure
	$result = oci_execute($cursor, OCI_NO_AUTO_COMMIT);
	if ($result == false){
   		$e = oci_error($cursor);  
		echo "<br/><br/><br/>";
   		echo($e['message']);
	}
	//commits the procedure
	oci_commit($connection);
	//closes the connection
	oci_close($connection);

// Get input from dept_update.php and update the record.


echo("<br/> <br/> <br/>");
//Display Error message
if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

echo "<div class=\"alert alert-danger\">" .
		"<strong>Oops!</strong> Something went wrong.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}
//Displays a successfull message
else{
	echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> $message.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";
}

?>
