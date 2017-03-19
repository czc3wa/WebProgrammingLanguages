<html>
<head>
  <title>Confirmation Page</title>
  <style type="text/css">
    body {
      font-size: 20px;
    }
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
  
  <table name="truefalse" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">
  
    <tr>
      <b><td>True/False question</td></b>
      <td><?php echo $_POST['TFQUESTION']?></td>      
    </tr>
    <tr>
      <b><td>True/False answer</td></b>
      <td><?php echo $_POST['TFANSWER']?></td>      
    </tr>
    </table>
</center>

</br>

<center><button style="height:5%;width:5%;background-color:gray" type="button" onclick="javascript:history.back()">Back</button></center>

<center><button style="height:5%;width:5%;background-color:gray" type="button" onclick="submitQuestion()">Confirm</button></center>


</body>
</html> 