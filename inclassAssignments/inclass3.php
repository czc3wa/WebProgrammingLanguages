<!doctype html>
<html>
<head>
  <title>Inclass exercise 3: PHP</title>
    <style>
      a:hover
      {
        background-color:white;
      }       
    </style>
 
    <script type="text/javascript">
      function setFocus()
      {
    	  document.forms[0].elements[0].focus();
      }
    </script>
</head>

<body onload="setFocus()">
  <center>
  <h2>Function and form handling in PHP</h2>
  <h2><font color="green">Enter your name</font></h2>

  <form action="compute-grade.php" method="post">  
    <fieldset style="padding:5px; width:50%; align:middle;">  
      <legend><b>Projects:</b></legend>
      <table >
        <tr>
          <td>
            Project 1: <input type="text" name="prj1" size="10px" /> 
               &nbsp; out of <input type="text" name="prj1_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->
            Project 2: <input type="text" name="prj2" size="10px" />
               &nbsp; out of <input type="text" name="prj2_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->             
            Project 3: <input type="text" name="prj3" size="10px" />
               &nbsp; out of <input type="text" name="prj3_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->            
            Project 4: <input type="text" name="prj4" size="10px" />
               &nbsp; out of <input type="text" name="prj4_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->             
            Project 5: <input type="text" name="prj5" size="10px" />
               &nbsp; out of <input type="text" name="prj5_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->            
            Project 6: <input type="text" name="prj6" size="10px" />
               &nbsp; out of <input type="text" name="prj6_total" size="10px" value="100" required /> <span style="color:red">*</span> <br />  <!-- set default total possible score = 100 -->
          </td>        
          <td align="center" width="45%">Drop the lowest score? <br /> 
            <input type="radio" name="drop_project" value="yes" checked>Yes
            <input type="radio" name="drop_project" value="no">No
            <br />
            <br />
            Average scores (percentage): <span style="color:red"> <?php echo compute_score(); ?> </span> 
            <br />
            <br />            
            Weight: <input type="text" name="project_weight" size="8px" />
          </td>
        </tr>
      </table>
      </table>
    </fieldset>
    <br /><br />
    <input type="submit" value="Compute Grade" /> &nbsp;&nbsp;
    <input type="reset" value="Reset" />
  </form>  
  </center>
  
</body>
</html>

<$php>
  function compute_score() {
    $data = array();
    $project_scores = array();
  
  // to retrieve all all param values pairs from a post object
  foreach ($_POST as $key => $val) {
    $data[$key] = $val; // record all form data to an array
  }

  print_array($data);

  }

  function print_array($arr) {
    while ($curr = each($arr)):
      $k = $curr["key"];
      $v = $cur["value"];

      echo "[ $k => $v] <br/>";

      //var_dump($k);
      //print($k);
      //printf($k)
    endwhile;
  }
<p>


</select>