<?php session_start()?>
<html>
<head>
<title>Submission Confirmation</title>
<script type="text/javascript">
function submitNewQuestion() {
	window.location = "assignment4.php"
}
</script>
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
	    display: table-cell;
	    vertical-align: middle;
	}
  </style>

</head>
<body>
<?php
# specify a path, using a file system, not a URL
# [server]    /cslab/home/<em>your-username</em>/public_html/<em>your-project</em>/data/filename.txt
# [local]     /XAMPP/htdocs/<em>your-project</em>/data/filename.txt
// $filename = "/cslab/home/btw3ta/public_html/main_project/questionData.txt";
$filename = "/cslab/home/czc3wa/public_html/cs4640/assignment4/questionData.txt";

if (!empty($_SESSION['TFANSWER'])) {
	echo "<center style=\"font-size:35px\">You have submitted a true-false question! Thank you.</center><br/>";
 	$raw_data = extract_data();
 	$data = "";
 	$counter = 0;
 	while ($curr = each($raw_data)) {
 		$k = $curr["key"];
 		if ($counter == 0) {
 			$v = "Question: ".$curr["value"];
 		}
 		else {
 			$v = "Answer: ".$curr["value"]; 	
 		}
 		$counter++;
 		if (!empty($data)) {
 			$data = $data."\n";
 		}
 			$data = (string)$data.(string)$v;
 	}
 	
 	// if there is nothing, don't write it
 	if (!empty($data)) {
 		write_to_file($filename, $data);
 	}
	session_destroy();
} else if (!empty($_SESSION['MCANSWER1'])) {
	echo "<center style=\"font-size:35px\">You have submitted a multiple-choice question! Thank you.</center><br/>";
	$raw_data = extract_data();
	$data = "";
	while ($curr = each($raw_data)) {
 		$k = $curr["key"];
 		if ($counter == 0) {
 			$v = "Question: ".$curr["value"];
 		}

 		else if ($counter > 0 && $counter < 4){
 			$v = "Answer: ".$curr["value"]; 
 		}
 		else {
 			$v = "Correct Answer: ".$curr["value"]; 	
 		}
 		$counter++;
 		if (!empty($data)) {
 			$data = $data."\n";
 		}
 			$data = (string)$data.(string)$v;
 	}
	
	// if there is nothing, don't write it
	if (!empty($data)) {
		write_to_file($filename, $data);
	}
	session_destroy();
} else if (!empty ($_SESSION['SAANSWER'])) {
	echo "<center style=\"font-size:35px\">You have submitted an essay question! Thank you.</center><br/>";
	$raw_data = extract_data();
	$data = "";
	while ($curr = each($raw_data)) {
 		$k = $curr["key"];
 		if ($counter == 0) {
 			$v = "Question: ".$curr["value"];
 		}
 		else {
 			$v = "Answer: ".$curr["value"]; 	
 		}
 		$counter++;
 		if (!empty($data)) {
 			$data = $data."\n";
 		}
 			$data = (string)$data.(string)$v;
 	}
	
	// if there is nothing, don't write it
	if (!empty($data)) {
		write_to_file($filename, $data);
	} else {
		echo "Yep, here it is.";
	}
	session_destroy ();
} else {
	echo "Something has gone wrong, no session variables are filled!";
}
?>
<div style="text-align:center; font-size:35px"><a href="http://plato.cs.virginia.edu/~czc3wa/cs4640/assignment4/questionData.txt" target="blank">View all questions and answers submitted so far.</a></div>
<br/>
<center>
		<button style="height: 60px; width: auto; line-height: 50px; box-sizing: border-box; background-color: lightgreen; font-size:25px" type="button" onclick="submitNewQuestion()">Submit Another Question</button>
</center>
<?php
function extract_data() {
	$data = array();

	// To retrieve all param-value pairs from a post object
	foreach ($_SESSION as $key => $val)
	{
		$data[$key] = $val;      // record all form data to an array
	}
	// print_array($project_scores);
	return $data;
}

function write_to_file($filename, $data) {
	// if (!file_exists($filename))
	// echo "File does not exist";
	// else
	// echo "File exists";
	$file = fopen($filename, "a") or die("File does not exist or can't be opened."); // if the file doesn't exist, create a new file

	fputs($file, $data."\n") or die("Could not write."); // fgets to read (generally)
	fclose($file) or die("IT WON'T DIE!");
}
?>
</body>
</html>