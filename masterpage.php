<style type="text/css">
li:hover, li:focus {
        border-bottom: solid;
        border-bottom-color: white;
        color: grey !important; /*Change rollover cell color here*/
    }
.labelTexts
{
	font-family: Calibri;
	font-size: Large;
}
.mydiv {
    position:fixed;
    top: 40%;
    left: 50%;
    width:30em;
    height:35em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
	background-color: white;
	border-radius: 5px;
	border: 1px solid #dedede;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
}
input
{
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
	background-color: grey;
}
td {
    vertical-align: middle;
    text-align: center;
}
	.anchor {
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            z-index: -1;
            top: -120px;
            left: 0;
            visibility: hidden;
        }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js""></script>
<html>
<?
	include "utility_functions.php";
	//$sessionid =$_GET["sessionid"];
	//echo (verify_session($sessionid));
//	echo("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"background-color: #03A9F4; font-family: 'Segoe UI'; color: white;\">");
	
?>
<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #03A9F4; font-family: 'Segoe UI'; color: white;">
            				<div class="container">
                				<div class="navbar-header">
                    					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        				<span class="icon-bar"></span>
                        				<span class="icon-bar"></span>
                        				<span class="icon-bar"></span>
                    					</button>
                    					<a class="navbar-brand" runat="server" style="color: white;">Grade Viewer</a>
                				</div>
                			<div class="navbar-collapse collapse" style="color: white;">
                    				<ul class="nav navbar-nav">
                     				<?
							 
							if(($sessionid = $_GET["sessionid"]))
							{
								echo("<li><a runat=\"server\" href=\"welcomepage.php?sessionid=$sessionid\" style=\"color: white;\">Home</a></li>");
								if(check_student($sessionid))
								{
									echo("<li><a runat=\"server\" href=\"StudentView.php?sessionid=$sessionid\" style=\"color: white;\">Student Info</a></li>");
									echo("<li><a runat=\"server\" href=\"StudentsSections.php?sessionid=$sessionid\" style=\"color: white;\">My Sections</a></li>");
									echo("<li><a runat=\"server\" href=\"Enrollment.php?sessionid=$sessionid\" style=\"color: white;\">Enroll</a></li>");
								}
								if(check_admin($sessionid))
								{
									echo("<li><a runat=\"server\" href=\"ManageUsers.php?sessionid=$sessionid\" style=\"color: white;\">Manage Students</a></li>");
									echo("<li><a runat=\"server\" href=\"AddGrades.php?sessionid=$sessionid\" style=\"color: white;\">Add Grades</a></li>");

								}
								echo("<li><a runat=\"server\" href=\"About.php?sessionid=$sessionid\" style=\"color: white;\">About</a></li>");

							}
							else
							{
								echo("<li><a runat=\"server\" href=\"login.php\" style=\"color: white;\">Login</a></li>");
								echo("<li><a runat=\"server\" href=\"About.php\" style=\"color: white;\">About</a></li>");

							}
						?>
                        			                    				</ul>
					<?php if(($sessionid =$_GET["sessionid"])): ?>
           					<div class="nav navbar-nav navbar-right">
							<?
							echo("<a href=\"ChangePassword.php?sessionid=$sessionid\" class=\"navbar-brand\"><span style=\"font-family:Calibri; color:white;\">Change Password</span></a>");
               						echo("<a href=\"logout_action.php?sessionid=$sessionid\" class=\"navbar-brand\"><span style=\"font-family:Calibri; color:white;\">Logout</span></a>");
							?>
            					</div>
        					<?php endif; ?> 
                			</div>
				
			</div>
        </div>
</html>
