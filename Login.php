<style tye="text/css">
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
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js""></script>
<html> 
<head>
	<title>Login</title>
</head>
<?
	include "masterpage.php";
?>

 <FORM name="login" method="POST" action="login_action.php"> 								
        <div class="myDiv">
			<table style="width: 100%;">
				<tr>
					<td colspan="3">
						<span style="font-family:Calibri; font-size: X-Large;">Grade Viewer 4.0 Login</span>
						<br/>
						<br/>
						<img src="Images\LoginImage.png" alt="Logo" style="width:304px;height:228px;">
						<br/>
						<br/>
						<label style="color: red;"><?php echo $errorMsg;?></label>
					</td>
				</tr>
				<tr>
					<td style="width:5%;">
					</td>
					<td>
						<input type="text" class="form-control" name="clientid" placeholder="Username">
						<br/>
					</td>
					<td style="width:5%;">
					</td>
				</tr>
				<tr>
					<td style="width:5%;">
					</td>
					<td>
						<input type="password" class="form-control" name="password" placeholder="Password">
							<br/>
					</td>
					<td style="width:5%;">
					</td>

				</tr>
				<tr>
					<td style="width:5%;">
					</td>
					<td>
						<button type="submit" class="btn btn-default" style="width:100%;" name="submit" value="Login">Login</button>
					</td>
					<td style="width:5%;">
					</td>
				</tr>
			</table>	
		</div>
        </div>
	</form>
</html>

