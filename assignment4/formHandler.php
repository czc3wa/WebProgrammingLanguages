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
	<button style="height:auto;width:70px;font-weight:bold;fontsize:35px;background-color:red;text-align:center" type="button" onclick="javascript:history.back()">Back</button>
  <button style="height:auto; width: 70px;font-weight:bold;fontsize:35px;background-color:lightgreen;text-align:center" type="button" onclick="submitForm()">Confirm</button>
</center>


</body>
</html> 