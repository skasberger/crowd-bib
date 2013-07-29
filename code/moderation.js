function confirmation(){
	var answer = confirm("Are you sure you want to push changes? This cannot be undone.");
	if (answer){
		return true;
	}
	else{
		return false;
	}
}