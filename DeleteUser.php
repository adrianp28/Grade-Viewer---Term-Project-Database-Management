<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_admin($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	$username = $_GET["user"];
	echo "<br/> <br/><br/>";

	if(!$username)
	{
		die("Invalid User");
	}
	$sql = "delete from usersession where username = '$username'";
	$result_array = execute_sql_in_oracle ($sql);
	$result = $result_array["flag"];
	$cursor = $result_array["cursor"];

	if ($result == false){
		display_oracle_error_message($cursor);
		die("Client Query Failed.");
	}
	$sql = "delete from users where username = '$username'";
	$result_array = execute_sql_in_oracle ($sql);
	$result = $result_array["flag"];
	$cursor = $result_array["cursor"];

	if ($result == false){
		display_oracle_error_message($cursor);
		die("Client Query Failed.");
	}
	echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> You have deleted ". $username . "!.<br/><a href=\"ManageUsers.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     "</div>";

?>
