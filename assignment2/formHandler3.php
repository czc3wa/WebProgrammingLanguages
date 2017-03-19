<html>
<head>
  <title>Confirmation Page</title>
  <style type="text/css">
    body {
      font-size: 20px;
    }
  /*  tr {
      white-space: nowrap;
      width: 1%;
    }*/
    td {
      white-space: nowrap;
      width: 1px;
    }
    table  {
      width: 1px;
    }
  </style>
  <script type="text/javascript" src="assignment3.js">

	</script>
</head>

<body bgcolor="#EEEEEE">
 <center><h2>Confirm your Input</h2></center>  
 <center>
 <p>
    The following table lists the Question and Answer.
  </p>

    <table name="shortanswer" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">
    <tr>
      <b><td>Short Answer question</td></b>
      <td><?php echo $_POST['SAQUESTION']?></td>      
    </tr>
    <tr>
      <b><td>Short Answer answer</td></b>
      <td><?php echo $_POST['SAANSWER']?></td>      
 
  </table>
  </center>

</br>
  <center><button style="height:5%;width:5%;background-color:lightgreen" type="button" onclick="javascript:history.back()">Back</button></center>

</body>
</html> 