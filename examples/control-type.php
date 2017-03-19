<!DOCTYPE html>
<html>
<head>
  <title>Control structure examples</title>
</head>
<body>

  <?php

    $x = 15;
    $y = 6;
    $z = 5;
    echo ($x/$y), " ", (int)($x/$y), ($x/$z), "<br/><br/>\n";

    $x = 150;  $x2 = "150";
    $y = 160;  $y2 = "160";
    $z = 80;   $z2 = "80";
    $a = "aardvark";
 
    if ($x == $x2) 
       echo "[int] $x == [string] $x2 <br/>";    // yes
    if ($x === $x2) 
       echo "[int] $x === [string] $x2 <br/>";   // no
    if ($x !== $x2) 
       echo "[int] $x !== [string] $x2 <br/>";   // yes
    if ($x < $y) 
       echo "[int] $x < [int] $y <br/>";         // yes
    if ($x < $y2) 
       echo "[int] $x < [string] $y2 <br/>";     // yes (casting)
    if ($x < $z) 
       echo "[int] $x < [int] $z <br/>";         // no (numeric)
    if (strcmp($x, $z) < 0) 
       echo"$x < $z <br/>";                     // yes (alpha)

    if ((string)$x < (string)$z) 
       echo "$x < $z <br/>\n";                  // no (why???)
    else 
       echo "$x >= $z <br/>\n";

    if ($x < $a) 
       echo "$x < $a <br/>\n";  		        // no (why???)
    else 
       echo "$x >= $a <br/>\n";

    if ((string)$x < $a) 
       echo "$x < $a <br/>\n";                 // yes (why???)
  ?>
  
    
  <h2><strong>
  <?php
    for ($i = 1; $i <= 10; $i++)
    {
       echo $i;
       if ($i < 10) echo ", ";
    }
    echo "<br/>\n";    
    
    // Same loop as above but now using the alternative block syntax 
    for ($i = 1; $i <= 10; $i++):
       echo $i;
       if ($i < 10) echo ", ";
    endfor;
    echo "<br/>\n";  
  ?>
  </strong></h2>
  

<!-- The following code shows that we can easily mix PHP and HTML code.   -->
  <table border = "1">
  <?php 
     for ($i = 1; $i < 5; $i++):
  ?>
       <tr align = "center">
  <?php
         for ($j = 1; $j < 5; $j++):
  ?>
           <td> <?php echo "$i,$j"; ?> </td>
  <?php
         endfor;
  ?>
       </tr>
  <?php
     endfor;
  ?>
  </table>
  
</body>
</html>