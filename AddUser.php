<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_admin($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	echo "<br/><br/><br/>";

?>
<html>
	<body>
		<?
			echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";

			echo("<form method=\"post\" action=\"user_add_action.php?sessionid=$sessionid\">");
		?>
		<table style="width: 100%;">
			<tr>
				<td colspan="6" align="center">
					<span style="font-family: Calibri; font-size: X-Large;">Add Student</span>
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
						echo("<input type=\"text\" class=\"form-control\" style=\"width:100%;\" name=\"address\" value=\"$address\"><br></br>");
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
                                                echo("<input type=\"text\" class=\"form-control\" style=\"width:50%;\" name=\"zipcode\" value=\"$zipcode\"><br></br>");
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
                		        "<option value=\"Under Graduate\">Under Graduate</option> " .
                        		"<option value=\"Graduate\">Graduate</option> " .
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
                                        "<option value=\"Non Probation\">Non Probation</option>" .
                                        "<option value=\"Probation\">Probation</option>" .
                                        "</select>";
					?>

                                </td>

		
			</tr>					

			</tr>
			<tr>
				<td colspan="6" align="left">
					<hr/>
					<?
						echo("<input type=\"submit\" value=\"Add\" class=\"btn btn-default\">");
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
