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
  <h2>Data and file processing</h2>
<!--   <h2><font color="green">Enter your name</font></h2> -->

<?php
  # Demonstration of PHP forms and files.
  # First, we are creating an html form so that the user can submit
  # information back to the server.
  #
  # The POST method sends the information in as an object attached to the HTTP POST request.
  # An example of the request is shown below
  #      POST web_component HTTP/1.1
  #      Host: URL1
  #      pname1=value1&pname2=value2&pname3=value3& ...
  #  
  # If we used GET, the information is appended to the URL (shown in the browser address bar) as 
  #      URL1/web_component?pname1=value1&pname2=value2&pname3=value3&...
  #
  # Write php code inside the <body> tag to have it run as the screen is loaded.
  # Note: php code outside the <body> tag will not be executed until the function is called 
  #
?>

  <form action="compute-grade-to-file.php" method="post">  
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
            Project 6: <input type="text" name="prj6" size="10px"  />
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
<!--             <input type="button" value="Go to another php" onclick="location='test.php'" /> -->            
<!--             Weight: <input type="text" name="project_weight" size="8px" /> -->
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
 
 
<?php
   
   // retrieve data from the form submission
   $project_scores = extract_data();      
   // print_array($project_scores);

   // prepare data to be written to file
   $data = "";
   while ($curr = each($project_scores)) 
   {
      

      $k = $curr["key"];
      $v = $curr["value"];
      
      if (!empty($data))
         $data = $data.",";
      
      $data = (string)$data.(string)$v;   
      
   }
   
   # specify a path, using a file system, not a URL
   # [server]    /cslab/home/<em>your-username</em>/public_html/<em>your-project</em>/data/filename.txt
   # [local]     /XAMPP/htdocs/<em>your-project</em>/data/filename.txt
   
   
   $filename = "/cslab/home/czc3wa/public_html/cs4640/test-data.txt";
   // "/Applications/XAMPP/xamppfiles/htdocs/cs4640/test-data.txt";
  //  

   
   // if there is nothing, don't write it 
   if (!empty($data))

      write_to_file($filename, $data);
?>
   <hr />   
    
<?php
   // read from file and display data in a table
   $file_data = read_file($filename);
   if (!empty($file_data))
   {
?>
      <table border="1" align="center" cellpadding="3" width="20%">
        <tr>
          <th>project1</th>
          <th>project2</th>
          <th>project3</th>
          <th>project4</th>
          <th>project5</th>
          <th>project6</th>          
        </tr>
<?php  
      while ($curr_line = each($file_data))    // each value of a $data array is a line from the file
      {
         $v_line = $curr_line["value"];        // each value is a string of scores separated by a comma
?>
         <tr> 
<?php        
         // to use individual scores, split the value 
         $splitted_scores = split("\,", $v_line);
         while ($curr_prj = each($splitted_scores))
         {
            $v_prj = $curr_prj["value"];      // each project score value
            if (!empty($v_prj))
               echo "<td align='center'>$v_prj</td>";
         }   	
?>
         </tr>
<?php             
      }
?>   
      </table>
<?php
   }
?>      
</body>
</html>


<?php   

   /* Retrieve data from the form submission,
    * Convert project scores to percentages
    * Return an array of project scores
    */
   function extract_data()
   {
      $data = array();
	  $project_scores = array();

      // To retrieve all param-value pairs from a post object
      foreach ($_POST as $key => $val)
      {
         $data[$key] = $val;     // record all form data to an array
      }

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
	  // print_array($project_scores);
	  return $project_scores;
   }   
   
   function write_to_file($filename, $data)
   {
//       if (!file_exists($filename))
//          echo "File does not exist";
//       else
    // $chmodDirectory = "/cslab/home/czc3wa/public_html/cs4640/";
      chmod($filename, 0777); 
      $file = fopen($filename, "w") or die('Can\'t create file');      // if the file doesn't exist, create a new file 
      
                   // set permission.                        
      fwrite($file, $data) or die('error writing to file');
      fclose($file);
   }

   function read_file($filename)
   {
      $file = fopen($filename, "r");      // r: read only
      $data_array = "";

      while (!feof($file)) 
      {
         $data_array[] = fgets($file);
   	  }
   	  fclose($file);
   	  return $data_array;
   }
   
   
   #####################################################
   ####### the following code is from in-class 3 #######
   
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
   
      $project_avg = "";
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
   
   function print_array($arr)
   {
      while ($curr = each($arr)):
         $k = $curr["key"];
         $v = $curr["value"];
         //echo "key is $k and value is $v <br/>";
         echo "[ $k => $v ] <br />";
         
      endwhile;
   }
    
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
