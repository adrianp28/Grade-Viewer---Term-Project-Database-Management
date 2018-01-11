<?
	include "masterpage.php";
	$sessionid =$_GET["sessionid"];
	verify_session($sessionid);
	$Message = "";
	if(($newPassword = $_POST["password1"]))
	{
		$repPassword = $_POST["password2"];
		if($newPassword === $repPassword)
		{
			if(strlen($newPassword) >= 8)
			{
				$sql = "select username from usersession where sessionid = '$sessionid'";
				$result_array = execute_sql_in_oracle ($sql);
				$result = $result_array["flag"];
				$cursor = $result_array["cursor"];
				if ($result == false){
  					// Error handling interface.
					$Message = "Something went wrong! Try again later.";
				}
				if(!($values = oci_fetch_array ($cursor)))
				{
					$Message = "Something went wrong! Try again later.";
				}
  				oci_free_statement($cursor);

				$username = $values[0];
				$sql = "update users set password = '$newPassword' where username = '$username'";
				$result_array = execute_sql_in_oracle ($sql);
				$result = $result_array["flag"];
				$cursor = $result_array["cursor"];
				if ($result == false){
  					// Error handling interface.
					$Message = "Something went wrong! Try again later.";
				}
				if(!($values = oci_fetch_array ($cursor)))
				{
					$Message = "Something went wrong! Try again later.";
				}
  				oci_free_statement($cursor);
				$Message = "Password has been changed!";
			}
			else
			{
				$Message = "Password is too short!";
			}
		}
		else
		{
			$Message = "Passwords do not match!";
		}	
	}
	echo "<br/> <br/><br/>";
?>
<html>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Change Password</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<p class="text-center">Use the form below to change your password.</p>
					<? echo"<form method=\"post\" id=\"passwordForm\" action=\"ChangePassword.php?sessionid=$sessionid\">"; ?>
						<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
						<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long
					</div>
				<div class="col-sm-6 col-sm-offset-3">

					<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
					<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
					<br/>
					<?
						if($Message === "Password has been changed!") 
							echo "<span style=\"font-family: Calibri; font-size:Large; color: Green;\">$Message</span>";
						else
							echo "<span style=\"font=family: Calibri; font-size: Large; color: Red;\">$Message</span>" 
					?>
					<br/>
					<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
					</div>
					</form>
				</div><!--/col-sm-6-->
			</div><!--/row-->
		</div>	
	</body>
</html>
<script language="javascript">
$("input[type=password]").keyup(function(){
  //  var ucase = new RegExp("[A-Z]+");
//	var lcase = new RegExp("[a-z]+");
//	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
	}
//	
//	if(lcase.test($("#password1").val())){
//		$("#lcase").removeClass("glyphicon-remove");
//		$("#lcase").addClass("glyphicon-ok");
//		$("#lcase").css("color","#00A41E");
//	}
//	if(num.test($("#password1").val())){
//		$("#num").removeClass("glyphicon-remove");
//		$("#num").addClass("glyphicon-ok");
//		$("#num").css("color","#00A41E");
//	}else{
//		$("#num").removeClass("glyphicon-ok");
//		$("#num").addClass("glyphicon-remove");
//		$("#num").css("color","#FF0004");
//	}
//	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("glyphicon-remove");
		$("#pwmatch").addClass("glyphicon-ok");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("glyphicon-ok");
		$("#pwmatch").addClass("glyphicon-remove");
		$("#pwmatch").css("color","#FF0004");
	}
});
</script>
