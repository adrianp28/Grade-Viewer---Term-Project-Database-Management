<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_admin($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	$studentID = $_GET["studentid"];
	echo "<br/> <br/><br/>";

  	// the sql string
  	$sql = "select studentid, firstname, lastname, streetaddress, city, state, zip, studenttype, status from StudentInfo where studentID = '$studentID'";
  	//echo($sql);

  	$result_array = execute_sql_in_oracle ($sql);
  	$result = $result_array["flag"];
  	$cursor = $result_array["cursor"];

  	if ($result == false){
    		display_oracle_error_message($cursor);
    		die("Query Failed.");
  	}

  	if(!($values = oci_fetch_array ($cursor)))
	{
		die("Test");
	}
  	oci_free_statement($cursor);

	$studentID = $values[0];
  	$firstname = $values[1];
  	$lastname = $values[2];
  	$streetaddress = $values[3];
	$city = $values[4];
	$state =  $values[5];
	$zip = $values[6];
	$studenttype = $values[7];
	$status = $values[8];

?>
<html>
	<body>
		<?
			echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";

			echo("<form method=\"post\" action=\"user_update_action.php?sessionid=$sessionid&studentid=$studentID\">");
		?>
		<table style="width: 100%;">
			<tr>
				<td colspan="6" align="center">
					<span style="font-family: Calibri; font-size: X-Large;">Edit Student</span>
					<hr/>
					</td>
			</tr>
			<tr>
				<td>
					<?
						echo("<span style=\"font-family: Calibri; font-size: Large;\">First Name: </span><br></br>");
					?>
					
				</td>
				<td>
					<?
						echo("<input type=\"text\" class=\"form-control\" style=\"width:75%;\" name=\"fname\" value=\"$firstname\"><br></br>");
					?>
				</td>
				<td>
					<?
						echo("<span style=\"font-family: Calibri; font-size: Large;\">Last Name: </span><br></br");
					?>
					
				</td>
				<td>
					<?
						echo("<input type=\"text\" class=\"form-control\" style=\"width:75%;\" name=\"lname\" value=\"$lastname\"><br></br>");
					?>
				</td>

			<tr>
				<td>
					<?
						echo("<span style=\"font-family: Calibri; font-size: Large;\">Street Address: </span><br></br>");
					?>
					
				</td>
				<td>
					<?
						echo("<input type=\"text\" class=\"form-control\" style=\"width:100%;\" name=\"address\" value=\"$streetaddress\"><br></br>");
					?>
				</td>
					
			
		
				<td>
                                        <?
                                                echo("<span style=\"font-family: Calibri; font-size: Large;\">City: </span><br></br>");
                                        ?>

                                </td>
                                <td>
                                        <?
                                                echo("<input type=\"text\" class=\"form-control\" style=\"width:75%;\" name=\"city\" value=\"$city\"><br></br>");
                                        ?>
                                </td>

				<td>
                                        <?
                                                echo("<span style=\"font-family: Calibri; font-size: Large;\">State: </span><br></br>");
                                        ?>

                                </td>
                                <td>
                                        <?
                                                echo("<input type=\"text\" class=\"form-control\" style=\"width:50%;\" name=\"state\" value=\"$state\"><br></br>");
                                        ?>
                                </td>
			</tr>
			<tr>
				<td>
                                        <?
					echo("<span style=\"font-family: Calibri; font-size: Large;\">Zipcode: </span><br></br>");
                                        ?>

                                </td>
                                <td>
                                        <?
                                                echo("<input type=\"text\" class=\"form-control\" style=\"width:50%;\" name=\"zipcode\" value=\"$zip\"><br></br>");
                                        ?>
                                </td>
			<tr>
				<td>
                                        <?
                                                echo("<span style=\"font-family: Calibri; font-size: Large;\">Student Type: </span><br></br>");
                                        ?>

                                </td>
			
				<td>
					<?
					echo "<select id=\"cmbType\" name=\"studenttype\" class=\"select-picker\">" .
					"<option value=\"Under Graduate\" ";
						if($studenttype == 'Under Graduate')
							echo "selected=\"true\"";
						echo ">Under Graduate</option> " .
                        		"<option value=\"Graduate\" ";
						if($studenttype == 'Graduate')
							 echo "selected=\"true\"";
						echo ">Graduate</option> " .
                        		"</select> ";
					?>					
				</td>		
			</tr>
				<td>
                                        <?
                                                echo("<span style=\"font-family: Calibri; font-size: Large;\">Status: </span><br></br>");
                                        ?>

                                </td>

                                <td>
					<?
                                        echo"<select id=\"cmbStatus\" name=\"status\" class=\"select-picker\">" .
                                        "<option value=\"Non Probation\" ";
						if($status == 'Non Probation')
							echo "selected =\"true\"";
						echo">Non Probation</option>" .
                                        "<option value=\"Probation\" ";
						if($status == 'Probation')
							echo "selected = \"true\""; 
					echo ">Probation</option>" .
                                        "</select>";
					?>

                                </td>

		
			</tr>					

			</tr>
			<tr>
				<td colspan="6" align="left">
					<hr/>
					<?
						echo("<input type=\"submit\" value=\"Update\" class=\"btn btn-default\">");
					?>
					<hr/>	
				</td>
			</tr>

		</table>
	<?
		echo "</div>";

	?>
	</body>
</html>
