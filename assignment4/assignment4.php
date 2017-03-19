<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252">
	<title>Web Data Entry, btw3ta & czc3wa style</title>
	<script type="text/javascript" src="assignment4.js">

	</script>

	<style type="text/css">
      fieldset {
      	display: inline-block;
      }

      .answer_color {
      	color: blue;
      }

      body {
      	background-color: #99ccff;
      	font-size: 60px;
      }

      #question_box option{
      	width = 300px;

      }

	</style>  
	</head>
<body>
	
	<center>
		<fieldset class = "question_enclosure" id="question_type_selector">
			<legend>
				Choose Question Type
			</legend>
			<!-- <form name="questions"> -->
			Choose the type of question you'd like to create
			<br/>
			<b>
			Question Type:	
			</b>
			<select name="question_types" class="select_width" input type="text" onchange="displayQuestion(this.value)"> 
			<option value="True False">True/False</option> 
			   <option value="Multiple Choice">Multiple Choice</option> 
			  <option value="Short Answer">Short Answer</option> 
			  
			 
			</select> 
			<!-- </form> -->
		</fieldset>

		<br/>
		<!-- Short answer data entry -->

		<fieldset style="visibility: visible" class = "true_false" id="tf_question">
			<legend>
				Enter True/False Question
			</legend>
			<form action ="formHandler.php" method="post" onSubmit="return (validateInput('tf'))">
				Question: <input type="text" name="TFQUESTION" style="width:400px;" id = "tf_question_input" > 
				<br/>
				<span id="ques_msg_tf" style="color:red; font-style:italic; font-size:80%"></span>
				<div class="answer_color">
				Answer:
				<br/>
				<input type="radio" id="trueRadio" name="TFANSWER" value="True" onchange="radioFormChange(this.value)" checked>
				<font size="5px">True</font>
				<input type="radio" id="falseRadio" name="TFANSWER" value="False" onchange="radioFormChange(this.value)">
				<font size="5px">False</font>
				</div>
		          <div style="text-align:center;">
		              <input type="reset" value="Reset"> 
		              <input type="submit" value="Submit"> 
		          </div> 
			</form>
		</fieldset>
		<br/>
		<div style="text-align:center;font-weight:bold;font-size:20">Corey Chen and Braden Wright</div>
		<br/>
		<fieldset style="visibility: hidden" class = "multiple_choice" id="mc_question" >
			<legend>
				Enter Multiple Choice Question
			</legend>
			<form action ="formHandler2.php" method="post" onSubmit="return (validateInput('mc'))">
				Question: <input type="text" name="MCQUESTION" id = "mc_question_input" style="width:400px;">
				<br/>
				<span id="ques_msg" style="color:red; font-style:italic; font-size:80%"></span>
				<div class="answer_color">
				Answer:
				<br/>
				Incorrect 1<input type="text" name="MCANSWER1" id = "mc_ans_1" style="width:400px;">
				<br/>
				Incorrect 2<input type="text" name="MCANSWER2" id = "mc_ans_2" style="width:400px;">
				<br/>
				Incorrect 3<input type="text" name="MCANSWER3" id = "mc_ans_3" style="width:400px;">
				<br/>
				Correct    <input type="text" name="MCANSWER4" id = "mc_ans_4" style="width:400px;">
				<br/>
				<span id="ans_msg" style="color:red; font-style:italic; font-size:80%"></span>

				</div>
		          <div style="text-align:center;">
		              <input type="reset" value="Reset"> 
		              <input type="submit" value="Submit"> 
		          </div> 
			</form>

		</fieldset>
		<br/>
		<fieldset style="visibility: hidden" class = "short_answer" id="sa_question">
			<legend>
				Enter Short Answer Question
			</legend>
			<form action ="formHandler3.php" method="post" onSubmit="return (validateInput('sa'))">
				Question: <input type="text" name="SAQUESTION" id = "sa_question_input" style="width:400px;"> 
				<br/>
				<span id="ques_msg_sa" style="color:red; font-style:italic; font-size:80%"></span>
				<div class="answer_color">
				Answer:
				<br/>
				<textarea rows="8" cols="80" input type="text" name="SAANSWER" id="textarea"></textarea>
				<br/>
				<span id="ans_msg_sa" style="color:red; font-style:italic; font-size:80%"></span>
				</div>
		          <div style="text-align:center;">
		              <input type="reset" value="Reset"> 
		              <input type="submit" value="Submit" > 
		          </div> 
			</form>

		</fieldset>
	
		
		
	</center>

</body>
</html>