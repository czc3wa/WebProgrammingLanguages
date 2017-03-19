function validateInput(value) {
	var i =0;
	var ifAnyEmpty = true;
	var rowValue = document.getElementById("row" + i);
	while (rowValue !== null) {
		if (rowValue.value == "") {
			rowValue.innerHTML = "Question must be entered";
       		ifAnyEmpty = false;
		}
		if (rowValue.value != "") {
       		rowValue.innerHTML = "";
  		}

    }

    var j =0;
	var colValue = document.getElementById("column" + j);
	while (colValue !== null) {
		if (colValue.value == "") {
			 colValue.innerHTML = "Question must be entered";
       		ifAnyEmpty = false;
		}
		if (colValue.value != "") {
       		colValue.innerHTML = "";
  		}

    }

    var k =0;
	var valValue = document.getElementById("value" + k);
	while (valValue !== null) {
		if (valValue.value == "") {
			 valValue.innerHTML = "Question must be entered";
       		ifAnyEmpty = false;
		}
		if (valValue.value != "") {
       		valValue.innerHTML = "";
  		}

    }

    if (ifAnyEmpty == false) {
    	return false;
    }
    else {
    	return true;
    }
	
}