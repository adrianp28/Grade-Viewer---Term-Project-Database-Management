<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	if(!check_admin($sessionid))
	{
		header("Location:AccessDenied.php?sessionid=$sessionid");
	}
	
?>
<html>
	<body>
		<?
			echo "<br/><br/><br/>";
			echo "<div width=\"80%\" style=\"margin-left: 5%; margin-right: 5%; border-style: solid; border-radius: 15px;box-shadow: 5px 10px 18px #888888;;\">";

			echo("<form method=\"post\" action=\"user_addgrade_action.php?sessionid=$sessionid\">");
		?>
		<table style="width: 100%;">
			<tr>
				<td colspan="6">
					<span style="font-family: Calibri; font-size: X-Large;">Add Grades</span>
					<hr/>

				</td>
			</tr>
			<tr>
				<td>
					<span style="font-family: Calibri; font-size: Large;">StudentID</span>
				</td>	
				<td>
					<? echo("<input type=\"text\" class=\"form-control\" style=\"width: 50%;\" name=\"studentid\" value=\"$studentID\"><br></br>");?>
				
				</td>
				<td>
					<span style="font-family: Calibri; font-size: Large;">SectionID</span>
				</td>
				<td>
					<? echo("<input type=\"text\" class=\"form-control\" style=\"width: 50%;\" name=\"sectionid\" value=\"$sectionID\"><br></br>");?>

				</td>
				<td>
					<span style="font-family: Calibri; font-size: Large;">Grade</span>
				</td>
				<td>
					<? echo("<input type=\"text\" class=\"form-control\" style=\"width: 20%;\" name=\"grade\" value=\"$grade\"><br></br>");?>

				</td>
			</tr>
			<tr>
				<td>
					<?
						echo("<input type=\"submit\" value=\"Add Grade\" class=\"btn btn-default\">");
					?>

				</td>
			</tr>
		</table>
	<?
		echo "</div>"
	?>
	</body>
</html>
