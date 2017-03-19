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
  <h1><font color="green">Corey Chen</font></h1>
  <h2>Function and form handling in PHP</h2>

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
            Average scores (percentage): <span style="color:red">  <?php echo compute_score(); ?> </span> 
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


<?php  
   function compute_score()  
   {
   	  $data = array();
   	  $project_scores = array();
   	  
      // To retrieve all param-value pairs from a post object
      foreach ($_POST as $key => $val)
      {
         $data[$key] = $val;      // record all form data to an array      
      }
   //   echo "<br />Initial data <br />";
   //   print_array($data);
      
      $score = 0;
      $total = 1;      // avoid divided by 0 exception
     
      // itearate a data array, access scores and totals for each project, 
      // convert raw scores to percentages (which are used to determine the lowest project score)
      reset($data);
      while ($curr = each($data))
      {
         $k = $curr["key"];
         $v = $curr["value"];
      
         // strpos(string, substring) -- return index or position of the substring in string
         //                              otherwise, return False if not found
         if (strpos($k, "prj") >= 0)
         {
            if (strpos($k, "_total"))
            {
               $total = $v;
               $score = ($score * 100) / $total ;  // percentage
               $project_scores[$k] = $score;     // put percentage in array (final score for each project) 
            }  
            else
            {
         	   $score = $v;         
            }
         }
         else 
            echo "strpos = false";
      }
   //    echo "<br />Convert scores to percentages <br />";
   //    print_array($project_scores);
   
      $project_avg = 0;
      if (!empty($_POST['drop_project']))
      {
      	 $is_drop_project = $_POST['drop_project'];
         if ($is_drop_project == "yes")
            $project_avg = compute_projects_score($project_scores, $is_drop_project) / 5;
         else 
            $project_avg = compute_projects_score($project_scores, $is_drop_project) / 6;
      }
      
      return $project_avg;
   }
   
   
   
   
   
   
   
   // function print_array($arr)
   // {
   //    while ($curr = each($arr)):
   //       $k = $curr["key"];
   //       $v = $curr["value"];
   //       //echo "key is $k and value is $v <br/>";
   //       echo "[ $k => $v ] <br />";
         
   //    endwhile;
   // }
  
   
   function get_lowest_score($arr)
   {
      $lowest_score = 0;
      if (!empty($arr))
         $lowest_score = min(array_values($arr));      

      return $lowest_score; 	
   }
   
   function compute_projects_score($scores, $is_drop_lowest)
   {
      $project_score = 0;
      if ($is_drop_lowest == "yes" && !empty($scores))
         $project_score = array_sum($scores) - get_lowest_score($scores);
      else 
      	 $project_score = array_sum($scores);
      return $project_score;         
   }

?>

</select>