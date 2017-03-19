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
}
table {
}
</style>
<script type="text/javascript">
	function submitForm() {
		window.location = "writeFile.php"
	}
</script>
</head>

<body bgcolor="#EEEEEE">
  <center><h2>Confirm your Input</h2></center>
  <center>
  <p>
    The following table lists the Question and Answer.
  </p>
  
  <table name="truefalse" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">
    <tr>
      <td style="font-weight:bold">Question</td>
      <td style="width:auto"><?php $_SESSION['TFQUESTION'] = $_POST['TFQUESTION'];
      			echo $_SESSION['TFQUESTION'];?></td>      
    </tr>
    <tr>
      <td style="font-weight:bold">Answer</td>
      <td style="width:auto"><?php $_SESSION['TFANSWER'] = $_POST['TFANSWER'];
      echo $_SESSION['TFANSWER'];?></td>      
    </tr>
    </table>
</center>

<center>
	<button style="height:3%;width:5%;background-color:red;padding-right:15;text-align:center" type="button" onclick="javascript:history.back()">Back</button>
	<button style="height: 3%; width: 5%; background-color:lightgreen;padding-left:15;text-align:center" type="button" onclick="submitForm()">Confirm</button>
</center>


</body>
</html> 