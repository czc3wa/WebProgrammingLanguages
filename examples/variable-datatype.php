<!DOCTYPE html>
<html>
 <head>
  <title>Variables and data types in PHP</title>
 </head>
 <body>
<?php
  // All PHP variables beging with the $
  // and variable names can begin with an underscore after $
  /* PHP is dynamically typed, i.e., no type declarations
     Because it's an interpreted language, 
     an interpreter recognizes a variable's type at run time. 
     A variable's type may change throughout program execution */
  
  $x = 5;         // integer
  echo $x . "<br />";
  
  $y = 3.2;       // float
  echo $y . "<br />";
  
  $x = $x + $y;   // float
  echo $x . "<br />";     // to get variable's type, use a gettype(var) function
  echo gettype($x) . "<br />";
  
  $x = $x . " dollars";   // string, concatenation with a dot (.)  
  echo "\$x is $x and is of type " , gettype($x), "<br />";      // use a comma separate
  echo "\$x is $x and is of type " . gettype($x) . "<br />";     // use a string concatenation
  
  
  $mystring = "hello";
  echo "<br />To instruct the interpreter to <b>not</b> execute \$mystring as a variable 
  		but simply treat it as a string and display it on the screen, 
  		use an escape character \\, for example, \\\$mystring <br />";
  echo "\$mystring = " . $mystring . "<br />";
  echo "Use an escape character \\, \"$mystring\"" . "<br />";   
  echo "\$mystring[1] = ", $mystring[1], "<br />";
  
  echo "<br />";
  
  $x = 1234;
  echo var_dump($x), "<br />";    // var_dump() return both type and content of a variable
 
  if (is_int($x))
  	echo $x . " is an int" . "<br />";
  else 
  	echo $x . " is not an int <br />";
  
  if (is_float($x))
  	echo $x . " is a float" . "<br />";
  else
    echo $x . " is not a float <br />";
  		 
  if (is_numeric($x))
  	echo $x . " is a numeric" . "<br />";
  else
  	echo $x . " is not a numeric <br />";

  if (is_string($x))
  	echo $x . " is a string" . "<br />";
  else
  	echo $x . " is not a string <br />";
  echo "<br />";
  	
  $t = "98765";
  echo "\$t = \"$t\"" . "<br />";
  if (is_int($t)) 
  	echo $t . " is an int";
  else 
  	echo $t . " is not an int";
  echo "<br />";
  
  echo "cast : \$t = (int)\$t <br />";
  $t = (int)$t;
  if (is_int($t))
  	echo $t . " is an int";
  else
  	echo $t . " is not an int";
  echo "<br />";
  
  echo "cast : \$t = (float)\$t <br />";
  $t = (float)$t;
  if (is_float($t))
  	echo $t . " is a float";
  else
  	echo $t . " is not a float";
  echo "<br />";
  
  // Other ways to display things on the screen
  // 
  // The print function is used to create simple unformatted output. 
  // (similar to the echo function)
  // 
  // PHP borrows the printf function from C. 
  //
  // The print doesn't require parentheses
  // whereas printf requires
    
  $str = "PHP is fun";  
  $sub = substr($str, 7, 3);   // string operations
  print $str{2};       // display a character in string at the position 2 (index starts at 0)
  print "<br />";
  printf($sub);
  printf("<br />");
  printf(strtolower($str) . "<br />");  
  printf(strtoupper($str) . "<br />");
  
  $day = "Tuesday";
  $high = 57;  
  printf("The high on %7s was %3d <br />", $day, $high);   // syntax similar to C
  printf("%5.2f", $high);
  // %7s -- a character string field of 7 chaaracters
  // %3d -- an integer field of 3 digits
  // %5.2f -- a float or double field in xx.xx format
  
?>
</body>
</html>