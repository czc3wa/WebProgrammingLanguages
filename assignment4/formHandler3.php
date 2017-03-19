<?php session_start()?>
<html>
<head>
<title>Confirmation Page</title>
<style type="text/css"> 
	html, body {
	  height: 100%;
	}

	html {
	    display: table;
	    margin: auto;
	}

	body {
	  background-color: #99ccff;
	  font-size:35px;
	  display: table-cell;
	  vertical-align: middle;
	}
	td {
		whitespace:nowrap;
		width:1px;
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
				<button style="height:auto;width:70px;font-weight:bold;fontsize:35px;background-color:red;text-align:center" type="button" onclick="javascript:history.back()">Back</button>
  				<button style="height:auto; width: 70px;font-weight:bold;fontsize:35px;background-color:lightgreen;text-align:center" type="button" onclick="submitForm()">Confirm</button>
			</center>
			<hr>

</body>
</html>
