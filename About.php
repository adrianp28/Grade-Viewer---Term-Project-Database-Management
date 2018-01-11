<?
	include "masterpage.php"	
?>
<style type="text/css">
	.area
	{
		background: #cfd8dc;
		font-family: Calibri;
		font-size: 1.1em;
		border: #006064;
		color: #212121;
		float: none;
		margin-left: auto;
		margin-right: auto;
		height: 100vh;
		box-shadow: 5px 10px 18px #888888;
	}
	.area-header
	{
		background: #0288d1;
		color: white;
		border-color: #0288d1;
		text-align: center;
		font-size: X-Large;
		border-top-left-radius: 25px;
		border-top-right-radius: 25px;
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
	.tableArea
	{
		display: block;
		margin: 0 auto;
		width: 50%;
		background-color: #eceff1;
		border: 1px solid black;
		border-radius: 25px;
		box-shadow: 5px 10px 18px #888888;
	}
</style>

<html>
<body>
	<br/>
	<br/>
	<div class="area">
	<span id="Developers" class="anchor"></span>
                                            <br />
			<table class="tableArea">
			<tr>
			<td colspan="3" class="area-header">
				Developers

			</td>
			</tr>
			<tr>
			<td>
                            <img class="img-circle" src="Images\TylerStewart.jpg" width="204" height="236" alt="Tyler Stewart" id="imgComm"><h3 class="text-md text-bold m-b-0">Tyler Stewart</h3>
                            <p class="text-xxxs m-b-sm text-uppercase doNotIndent">Developer</p>
                            <p>Tyler has been a developer for 5 years. His passion comes from the unknown of desiging website applications. His inspiration for this website came from long walks with his dog Barron.</p>
			</td>	
			<td style="padding: 10px;">
			</td>
			<td>
                            <img class="img-circle" width="204" height="236" src="Images\AlexHaworth.jpg" alt="Alex Haworth"><h3 class="text-md text-bold m-b-0">Alex Haworth</h3>
                            <p class="text-xxxs m-b-sm text-uppercase doNotIndent">Developer </p>
                            <p>Alex likes to take long hikes up the Edmond mountain where he thinks up his next big idea. This is partially where this idea came from. When he is not coding he is hanging out with his pet bird Steve.</p>
			</td>
      
	</div>
</body>
</html>
