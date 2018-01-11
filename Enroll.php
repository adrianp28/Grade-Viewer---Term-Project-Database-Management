<?
include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_student($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}

$connection = oci_connect ("gq016", "fobblk", "gqiannew2:1521/pdborcl");
if ($connection == false){
   $e = oci_error(); 
   die($e['message']);
}
$username = getUsername($sessionid);

echo "<br/><br/><br/>";
//echo "$username";
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {	
        //echo $check; 
	// the statement to call the stored procedure
	$query = "begin " .
        	 " ENROLL(:studentid, :classSectionID, :message); " .
        	"end;";

	$cursor = oci_parse($connection, $query);
	if ($cursor == false){
   		$e = oci_error($connection);  
   	die($e['message']);
	}

	// after parsing, bind the variable with Oracle variable.
	oci_bind_by_name($cursor, ":studentid", $studentid, 9);
	oci_bind_by_name($cursor, ":classSectionID", $sectionid, 10);
	oci_bind_by_name($cursor, ":message", $message, 100);
	$sectionid = $check;
	$studentid = getStudentID($username);

	$result = oci_execute($cursor, OCI_NO_AUTO_COMMIT);
	if ($result == false){
   		$e = oci_error($cursor);  
   		die($e['message']);
	}

	oci_commit($connection);
	oci_close($connection);
	echo("<br/> <br/> <br/>");
	if ($result == false){
  	// Error handling interface.
  		echo "<B>Update Failed.</B> <BR />";

	}
	else{
		if($message != ''){
		echo "<div class=\"alert alert-danger\">" .
			"<strong>Oops!</strong> Something went wrong. Error: $message. Section: $sectionid<br/><a href=\"Enrollment.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	     		"</div>";
		}
		else{
		echo "<div class=\"alert alert-success\">" .
		"<strong>Success!</strong> You have added ". $sectionid . "!.<br/><a href=\"Enrollment.php?sessionid=$sessionid\">Click here to go back.</a>" .
      	 	    "</div>";
		}
	}
	//echo "$studentid";
    }
}


?>

