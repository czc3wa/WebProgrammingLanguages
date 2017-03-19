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
		<p>The following table lists the Question and Answers.</p>

		<table name="multiplechoice" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">
			<tr>
				<td style="font-weight:bold">Question</td>
				<td width="auto"><?php $_SESSION['MCQUESTION'] = $_POST['MCQUESTION'];
				echo $_SESSION['MCQUESTION'];?></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Incorrect</td>
				<td width="auto"><?php $_SESSION['MCANSWER1'] = $_POST['MCANSWER1'];
				echo $_SESSION['MCANSWER1'];?></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Incorrect</td>
				<td width="auto"><?php $_SESSION['MCANSWER2'] = $_POST['MCANSWER2'];
				echo $_SESSION['MCANSWER2'];?></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Incorrect</td>
				<td width="auto"><?php $_SESSION['MCANSWER3'] = $_POST['MCANSWER3'];
				echo $_SESSION['MCANSWER3'];?></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Correct</td>
				<td width="auto"><?php $_SESSION['MCANSWER4'] = $_POST['MCANSWER4'];
				echo $_SESSION['MCANSWER4'];?></td>
			</tr>
		</table>
	</center>

	<center>
		<button style="height:auto;width:70px;font-weight:bold;fontsize:35px;background-color:red;text-align:center" type="button" onclick="javascript:history.back()">Back</button>
  		<button style="height:auto; width: 70px;font-weight:bold;fontsize:35px;background-color:lightgreen;text-align:center" type="button" onclick="submitForm()">Confirm</button>
	</center>

</body>
</html>
