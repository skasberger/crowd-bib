authors = new Array();

function onLoadScript(){
	hideAll();
	generateKey();
	redisplayForm();
	refreshAuthorBox();
	refreshPreview();
	if(document.getElementById("nospam").value != "open knowledge"){
		document.getElementById("submit").disabled = true;
	}
}
	
function redisplayForm(){
	hideAll();
	resetNonCommonElements();
	if(document.getElementById("pubtype").value == "article"){
		setElementVisibility(document.getElementById("journal"), true);
		setElementVisibility(document.getElementById("volume"), true);
		setElementVisibility(document.getElementById("pages"), true);
	}
	else if(document.getElementById("pubtype").value == "book"){
		setElementVisibility(document.getElementById("pages"), false);
		setElementVisibility(document.getElementById("address"), true);
		setElementVisibility(document.getElementById("publisher"), true);			
	}
	else if(document.getElementById("pubtype").value == "conference"){
		setElementVisibility(document.getElementById("pages"), true);
		setElementVisibility(document.getElementById("conftitle"), true);			
		setElementVisibility(document.getElementById("address"), true);			
		setElementVisibility(document.getElementById("month"), true);
	}
	else if(document.getElementById("pubtype").value == "inbook"){
		setElementVisibility(document.getElementById("booktitle"), true);			
		setElementVisibility(document.getElementById("editors"), true);			
		setElementVisibility(document.getElementById("publisher"), true);
		setElementVisibility(document.getElementById("pages"), true);
		setElementVisibility(document.getElementById("address"), true);
	}
	else if(document.getElementById("pubtype").value == "inproceedings"){
		setElementVisibility(document.getElementById("proctitle"), true);
		setElementVisibility(document.getElementById("pages"), true);
		setElementVisibility(document.getElementById("organization"), true);
		setElementVisibility(document.getElementById("publisher"), true);
	}
	else if(document.getElementById("pubtype").value == "mastersthesis"){
		setElementVisibility(document.getElementById("school"), true);
		setElementVisibility(document.getElementById("address"), true);
	}
	else if(document.getElementById("pubtype").value == "misc"){
		setElementVisibility(document.getElementById("address"), true);
	}
	else if(document.getElementById("pubtype").value == "phdthesis"){
		setElementVisibility(document.getElementById("school"), true);
		setElementVisibility(document.getElementById("address"), true);
	}
	else if(document.getElementById("pubtype").value == "techreport"){
		setElementVisibility(document.getElementById("institution"), true);
		setElementVisibility(document.getElementById("address"), true);
	}
	else if(document.getElementById("pubtype").value == "unpublished"){
		setElementVisibility(document.getElementById("address"), true);
	}
}

function addAuthor(){
	author = document.getElementById("newAuthor").value;
	authors.push(author);
	refreshAuthorBox();
	document.getElementById("newAuthor").value = "";
	alert(author + " was added.");
}

function refreshAuthorBox(){
	if(authors.length > 0){
		document.getElementById("firstAuthor").value = authors[0];
		authorValue = "";
		for (i=0;i<authors.length;i=i+1){
			if(i<authors.length-1){
				authorValue = authorValue + authors[i] + " and ";
			}
			else{
				authorValue = authorValue + authors[i];
			}
		}
		document.getElementById("author").value = authorValue;
		authorString = toStringAuthors();
		document.getElementById("authorBox").innerHTML = authorString;
	}
	else{
		document.getElementById("firstAuthor").value = "";
		document.getElementById("author").value = "";
		document.getElementById("authorBox").innerHTML = "none";
	}
	refreshPreview();
}

function setErrors(){
	errors = true;
}

function setSuccess(){
	success = true;
}

function hideAll(){
	if(errors == false){
		setElementVisibility(document.getElementById("errors"), false);
	}
	else{
		setElementVisibility(document.getElementById("errors"), true);
	}
	if(success == false){
		setElementVisibility(document.getElementById("success"), false);
	}
	else{
		setElementVisibility(document.getElementById("success"), true);
	}
	setElementVisibility(document.getElementById("journal"), false);
	setElementVisibility(document.getElementById("volume"), false);
	setElementVisibility(document.getElementById("pages"), false);
	setElementVisibility(document.getElementById("editors"), false);
	setElementVisibility(document.getElementById("booktitle"), false);
	setElementVisibility(document.getElementById("address"), false);
	setElementVisibility(document.getElementById("school"), false);
	setElementVisibility(document.getElementById("institution"), false);
	setElementVisibility(document.getElementById("organization"), false);
	setElementVisibility(document.getElementById("month"), false);
	setElementVisibility(document.getElementById("publisher"), false);
	setElementVisibility(document.getElementById("conftitle"), false);
	setElementVisibility(document.getElementById("proctitle"), false);
	setElementVisibility(document.getElementById("address"), false);
}

function resetAuthors(){
	authors= new Array();
	refreshAuthorBox();
}

function refreshPreview(){
	var title = document.getElementById("title").value;
	var year = document.getElementById("year").value;
	var url = document.getElementById("url").value;
	var journal = document.getElementById("journalValue").value;
	var volume = document.getElementById("volumeValue").value;
	var pages = document.getElementById("pagesValue").value;
	var editors = document.getElementById("editorsValue").value;
	var booktitle = document.getElementById("booktitleValue").value;
	var address = document.getElementById("addressValue").value;
	var school = document.getElementById("schoolValue").value;
	var institution = document.getElementById("institutionValue").value;
	var organization = document.getElementById("organizationValue").value;
	var month = document.getElementById("monthValue").value;
	var publisher = document.getElementById("publisherValue").value;
	var conftitle = document.getElementById("conftitleValue").value;
	var proctitle = document.getElementById("proctitleValue").value;
	var institution = document.getElementById("institutionValue").value;
	var note = document.getElementById("noteValue").value;
	
	var preview = "";
	var defaultSwitch = false;
	if(authors.length > 0){
		preview = preview + authorString + ".";
		defaultSwitch = true;
	}
	if(year != ""){
		preview = preview + " (" + year + ").";
		defaultSwitch = true;
	}
	if(url != "" && url != "none"){
		if (title != ""){
			preview = preview + " <b><a href=\"" + url + "\">"+title+"</a>.</b>";
			defaultSwitch = true;
		}
	}
	else{
		if (title != ""){
			preview = preview + " <b>" + title + ".</b>";
			defaultSwitch = true;
		}
	}
	if(journal != ""){
		preview = preview + " <i>" + journal + "</i>";
		defaultSwitch = true;
	}
	if(volume != ""){
		preview = preview + ", " + volume;
		defualtSwitch = true;
	}
	if(pages != ""){
		if(booktitle == "" && proctitle == ""){
			preview = preview + ", "+pages;
			defualtSwitch = true;
		}
	}
	if(volume != ""){
		preview = preview + ".";
	}
	if(editors != ""){
		preview = preview + " In " + editors + "(Eds.),";
		defualtSwitch = true;
	}
	if(booktitle != "" || conftitle != "" || proctitle != ""){
		if(booktitle != ""){
			preview = preview + " <i>" + booktitle + "</i>.";
		}
		else if(conftitle != ""){
			preview = preview + " <i>" + conftitle + "</i>.";
		}
		else if(proctitle != ""){				
			preview = preview + " <i>" + proctitle + "</i>.";
		}
		if(pages != ""){
			preview = preview + " (pp. " + pages + ").";
		}
		defaultSwitch = true;
	}
	if(address != ""){
		preview = preview + " " + address + ".";
		defaultSwitch = true;
	}
	if(school != ""){
		preview = preview + " " + school + ".";
		defaultSwitch = true;
	}
	if(organization != ""){
		preview = preview + " " + organization + ".";
		defaultSwitch = true;
	}
	if(institution != ""){
		preview = preview + " " + institution + ".";
		defaultSwitch = true;
	}
	if(month != ""){
		preview = preview + " " + month + ".";
		defaultSwitch = true;
	}
	if(booktitle != "" || conftitle != "" || proctitle != ""){
		if(publisher != ""){
			preview = preview + " " + publisher + ".";
		}
	}
	if(note != ""){
		preview = preview + " " + note + ".";
		defaultSwitch = true;
	}		
	if(defaultSwitch){
		document.getElementById("previewBox").innerHTML = preview;
	}
	else{
		document.getElementById("previewBox").innerHTML = "Enter information and press refresh to preview your submission.";
	}
}

function toStringAuthors(){
	authorString = "";
	for(i=0;i<authors.length;i=i+1){
		if(i<authors.length-1){
			authorString = authorString + "<u>" + authors[i] + "</u>, ";
		}
		else if (authors.length != 1){
			authorString = authorString + "and <u>" + authors[i] + "</u>";
		}
		else{
			authorString = authorString + "<u>" + authors[i] + "</u>";
		}
	}
	return authorString;
}

function setElementVisibility(elementToSet, showItSwitch, keepPlacementSwitch){
 if (showItSwitch) {
   elementToSet.style.display = "inline";
   elementToSet.style.visibility = "visible";
 }
 else{
   if (keepPlacementSwitch) {
     elementToSet.style.display = "inline";
     elementToSet.style.visibility = "hidden";
   }
   else{
     elementToSet.style.display = "none";
   }
 }
}

function resetAllElements(){
	document.getElementById("title").value = "";
	document.getElementById("year").value = "";
	document.getElementById("url").value = "";
	document.getElementById("journalValue").value = "";
	document.getElementById("volumeValue").value = "";
	document.getElementById("pagesValue").value = "";
	document.getElementById("editorsValue").value = "";
	document.getElementById("booktitleValue").value = "";
	document.getElementById("addressValue").value = "";
	document.getElementById("schoolValue").value = "";
	document.getElementById("institutionValue").value = "";
	document.getElementById("organizationValue").value = "";
	document.getElementById("monthValue").value = "";
	document.getElementById("publisherValue").value = "";
	document.getElementById("conftitleValue").value = "";
	document.getElementById("proctitleValue").value = "";
	document.getElementById("institutionValue").value = "";
	document.getElementById("noteValue").value = "";
	resetAuthors();
	refreshPreview();
}

function resetNonCommonElements(){
	document.getElementById("journalValue").value = "";
	document.getElementById("volumeValue").value = "";
	document.getElementById("pagesValue").value = "";
	document.getElementById("editorsValue").value = "";
	document.getElementById("booktitleValue").value = "";
	document.getElementById("addressValue").value = "";
	document.getElementById("schoolValue").value = "";
	document.getElementById("institutionValue").value = "";
	document.getElementById("organizationValue").value = "";
	document.getElementById("monthValue").value = "";
	document.getElementById("publisherValue").value = "";
	document.getElementById("conftitleValue").value = "";
	document.getElementById("institutionValue").value = "";
	document.getElementById("proctitleValue").value = "";
	refreshPreview();
}

function createObject() {
	var request_type;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer"){
	request_type = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		request_type = new XMLHttpRequest();
	}
		return request_type;
}

var http = createObject();

/* -------------------------- */
/* SEARCH					 */
/* -------------------------- */
function autosuggest(){
	q = document.getElementById('newAuthor').value;
	// Set the random number to add to URL request
	nocache = Math.random();
	http.open('get', 'search.php?q='+q+'&nocache = '+nocache);
	http.onreadystatechange = autosuggestReply;
	http.send(null);
}

function autosuggestReply() {
	if(http.readyState == 4){
		var response = http.responseText;
		e = document.getElementById('results');
		if(response!=""){
			if(response!="<ul></ul>"){
			e.innerHTML=response;
			e.style.display="block";}
		} else {
			e.style.display="none";
		}
	}
}

function setAuthor(author){
	document.getElementById('newAuthor').value = author;
	document.getElementById('results').style.display="none";
	addAuthor();
}

function generateKey(){
	time = new Date().getTime();
	timeString = time.toString().substr(6);
	key = String.fromCharCode(97 + Math.round(Math.random() * 25)) 
	+ String.fromCharCode(97 + Math.round(Math.random() * 25)) 
	+ String.fromCharCode(97 + Math.round(Math.random() * 25)) 
	+ timeString;
	document.getElementById("key").value = key;
}

function noSpam(){
	if (document.getElementById("email").value != null && document.getElementById("title").value != null && document.getElementById("year").value != null && authors.length > 0) {
		if(document.getElementById("nospam").value == "open knowledge" ) {
			document.getElementById("submit").disabled = false;
		}
	}else{ 
		alert("Missing fields!");
	}
}