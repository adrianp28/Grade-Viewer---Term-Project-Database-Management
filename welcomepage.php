<style type="text/css">
</style>
<?
include "masterpage.php";
//include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Here we can generate the content of the welcome page
echo("<br /><br /><br /><br />");
echo("<table style=\"width:100%;\"><tr><td>");
echo("<span style=\"font-family: Calibri; font-size:XX-Large;\">Welcome, ". getName($sessionid) ." </span><br /><hr/>");
echo("</td></tr>");
echo("<tr><td><span style=\"font-family: Calibri; font-size:X-Large;\">Quick Links:</span>");
echo("</td></tr>");
echo("</table>");
//echo("<tr>");
if(check_admin($sessionid))
{
echo("<div style=\"text-align:center;\"><a href=\"ManageUsers.php?sessionid=$sessionid\"><div class=\"nav\" style=\"background-color:#E53935; box-shadow: 5px 5px 5px #888888; border-color:black; border-style:solid; border-radius:15px; margin:auto; color:White; height:100px; width:100px\">Manage Users</div></a>");
}
if(check_student($sessionid))
{
echo("<br/><a href=\"StudentView.php?sessionid=$sessionid\"><div class=\"nav\" style=\"background-color:#2196F3; box-shadow: 5px 5px 5px #888888; border-color:black; border-style:solid; border-radius:15px; margin:auto; color:White; height:100px; width:100px\">Student View</div></a></div>");
}
//echo("</table>");

//echo("<br />");
//echo("<br />");
//echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
?>
