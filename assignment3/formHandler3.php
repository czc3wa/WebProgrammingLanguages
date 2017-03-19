<?php session_start()?>
<html>
<head>
<title>Confirmation Page</title>
<style type="text/css"> 
body {
	font-size:20px;
}
td {
	whitespace:nowrap;
	width:1px;
}
table {
	width: 1px;
}
</style>
<script type="text/javascript">
	function submitForm() {
		window.location = "writeFile.php"
	}
</script>
</head>

<body bgcolor="#EEEEEE">
	<center>
		<h2>Confirm your Input</h2>
	</center>
	<center>
		<p>The following table lists the Question and Answer.</p>

			<table name="shortanswer" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">
				<tr>
					<td style="font-weight:bold">Question</td>
					<td width="auto"><?php $_SESSION['SAQUESTION'] = $_POST['SAQUESTION'];
					echo $_SESSION['SAQUESTION'];?></td>
				</tr>
				<tr>
					<td style="font-weight:bold">Answer</td>
					<td width="auto"><?php $_SESSION['SAANSWER'] = $_POST['SAANSWER'];
					echo $_SESSION['SAANSWER'];?></td>
				</tr>
			</table>
			</center>

			<center>
				<button style="height:3%;width:5%;background-color:red;padding-right:15;text-align:center" type="button" onclick="javascript:history.back()">Back</button>
				<button style="height: 3%; width: 5%; background-color:lightgreen;padding-left:15;text-align:center" type="button" onclick="submitForm()">Confirm</button>
			</center>
			<hr>

</body>
</html>
