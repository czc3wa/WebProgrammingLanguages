<html>
<head>
  <title>Confirmation Page</title>
  <style type="text/css">
    body {
      font-size: 20px;
    }
    /*tr {
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
    The following table lists the Question and Answers.
  </p>

<table name="multiplechoice" cellSpacing=5 cellPadding=5 border=5 bgColor="lavender">


    <tr>
      <td><b>Multiple choice Question</b></td>
      <td><?php echo $_POST['MCQUESTION']?></td>      
    </tr>
    <tr>
      <td><b>Incorrect Answer 1</b></td>
      <td><?php echo $_POST['MCANSWER1']?></td>      
    </tr>
    <tr>
      <td><b>Incorrect Answer 2</b></td>
      <td><?php echo $_POST['MCANSWER2']?></td>      
    </tr>
    <tr>
      <td><b>Incorrect Answer 3</b></td>
      <td><?php echo $_POST['MCANSWER3']?></td>      
    </tr>
    <tr>
      <td><b>Correct Answer</b></td>
      <td><?php echo $_POST['MCANSWER4']?></td>      
    </tr>
    </table>
    </center>

</br>
    <center><button style="height:5%;width:5%;background-color:lightgreen" type="button" onclick="javascript:history.back()">Back</button></center>

    <center><button style="height:5%;width:5%;background-color:lightgreen" type="button">Confirm</button></center>

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
         $data = $data."\n";
      
      $data = (string)$data.(string)$v;   
      
   }
   
   # specify a path, using a file system, not a URL
   # [server]    /cslab/home/<em>your-username</em>/public_html/<em>your-project</em>/data/filename.txt
   # [local]     /XAMPP/htdocs/<em>your-project</em>/data/filename.txt
   
   
   $filename = "/cslab/home/czc3wa/public_html/cs4640/test-data.txt";
   // "/Applications/XAMPP/xamppfiles/htdocs/cs4640/test-data.txt";
  //  

   
   // if there is nothing, don't write it 
   if (!empty($data)){

      write_to_file($filename, $data); }
    

   /* Retrieve data from the form submission,
    * Convert project scores to percentages
    * Return an array of project scores
    */

   function extract_data()
   {
      $data = array();
    

      // To retrieve all param-value pairs from a post object
      foreach ($_POST as $key => $val)
      {
         $data[$key] = $val;     // record all form data to an array
      }
      return $data;
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

?>

    </body>
</html> 

