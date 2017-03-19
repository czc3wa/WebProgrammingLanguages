function validateInput(value) {

	if (value == "tf") {
		var tf_question_input = document.getElementById("tf_question_input");
		if (tf_question_input.value == "") {
			document.getElementById("ques_msg_tf").innerHTML = "Question must be entered";
           	tf_question_input.focus();
           	return false;
		}
		if(tf_question_input.value != "") {
           	document.getElementById("ques_msg_tf").innerHTML = "";
           	return true;
      	}
		
	}
	if (value == 'sa') {
		var sa_question_input = document.getElementById("sa_question_input");
		var textarea = document.getElementById("textarea");

		if (sa_question_input.value == "" || textarea.value == "") {
			if(sa_question_input.value == "" ) {
				document.getElementById("ques_msg_sa").innerHTML = "Question must be entered";
           		sa_question_input.focus();
       
			}
			if(textarea.value == "") {
				document.getElementById("ans_msg_sa").innerHTML = "text must be entered";
			}
      	   return false;
		}
		if (sa_question_input.value != "" || textarea.value != "") {
           		document.getElementById("ans_msg_sa").innerHTML = "";
           		document.getElementById("ques_msg_sa").innerHTML = "";
           		return true;
      	   }

	}
	else {
		var mc_question_input = document.getElementById("mc_question_input");
		var mc_ans_1 = document.getElementById("mc_ans_1");
		var mc_ans_2 = document.getElementById("mc_ans_2");
		var mc_ans_3 = document.getElementById("mc_ans_3");
		var mc_ans_4 = document.getElementById("mc_ans_4");

		if (mc_question_input.value == "" || mc_ans_1.value == "" || mc_ans_2.value == "" || mc_ans_3.value == "" || mc_ans_4.value == ""){
           if (mc_question_input.value == "") {
           // alert ("Password must be entered");
           document.getElementById("ques_msg").innerHTML = "Question must be entered";
           mc_question_input.focus();
      	   }	 
           if (mc_ans_1.value == "" || mc_ans_2.value == "" || mc_ans_3.value == "" || mc_ans_4.value == "") {
           document.getElementById("ans_msg").innerHTML = "All answer choices must be entered";
           }
      	   return (false);

        }

  	   else {
		document.getElementById("ques_msg").innerHTML = "";
		document.getElementById("ans_msg").innerHTML = "";
		return true;
      }

	}
}

function radioFormChange(value) {
	if (value == "True") {
		var trueOption = document.getElementById("trueRadio");
		trueRadio.value == "False";
		trueRadio.name == "TFANSWER";

		var falseOption = document.getElementById("falseRadio");
		falseRadio.value == "";
		falseRadio.name == "";
	}
	else {
		var falseOption = document.getElementById("falseRadio");
		falseRadio.value == "False";
		falseRadio.name == "TFANSWER";

		var trueOption = document.getElementById("trueRadio");
		trueRadio.value == "";
		trueRadio.name == "";
	}
}
function displayQuestion(value) {

	if (value == "Short Answer") {
		var insertedItem = document.getElementById("sa_question");
		var afterInsert = document.getElementById("question_type_selector");
		// someElement.parentNode.insertBefore(newElement, someElement.nextSibling);
		afterInsert.parentNode.insertBefore(insertedItem, afterInsert.nextSibling);
		insertedItem.style.visibility="visible";

		var otheritem1 = document.getElementById("tf_question");
		otheritem1.style.visibility="hidden";
		var otheritem2 = document.getElementById("mc_question");
		otheritem2.style.visibility="hidden";

		
	}

	if (value == "True False") {
		var insertedItem = document.getElementById("tf_question");
		var afterInsert = document.getElementById("question_type_selector");
		// someElement.parentNode.insertBefore(newElement, someElement.nextSibling);
		afterInsert.parentNode.insertBefore(insertedItem, afterInsert.nextSibling);
		insertedItem.style.visibility="visible";

		var otheritem1 = document.getElementById("sa_question");
		otheritem1.style.visibility="hidden";
		var otheritem2 = document.getElementById("mc_question");
		otheritem2.style.visibility="hidden";
	}

	if (value == "Multiple Choice") {
		var insertedItem = document.getElementById("mc_question");
		var afterInsert = document.getElementById("question_type_selector");
		// someElement.parentNode.insertBefore(newElement, someElement.nextSibling);
		afterInsert.parentNode.insertBefore(insertedItem, afterInsert.nextSibling);
		insertedItem.style.visibility="visible";

		var otheritem1 = document.getElementById("sa_question");
		otheritem1.style.visibility="hidden";
		var otheritem2 = document.getElementById("tf_question");
		otheritem2.style.visibility="hidden";
	}

}