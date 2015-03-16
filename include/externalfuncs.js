		// Functions for certForm.php

function textCounter(field,cntfield,maxlimit) {
	if (field.value.length > maxlimit) // if too long...trim it!
		field.value = field.value.substring(0, maxlimit);
	// otherwise, update 'characters left' counter
	else
		cntfield.value = maxlimit - field.value.length;
}

function isalldigits(id){
   inputval=document.getElementById(id).value;
   if(isNaN(inputval)){
   	alert('Value must be all digits');
   }
}

function validateForm (certform) {
	valid = true;
	spaceRegex = /^\s*$/;

	if ((null != spaceRegex.exec(document.certform.curdate.value)) ||
			(null != spaceRegex.exec(document.certform.delcertid.value)) ||
			(null != spaceRegex.exec(document.certform.shape.value)) ||
			(null != spaceRegex.exec(document.certform.measure1.value)) ||
			(null != spaceRegex.exec(document.certform.measure2.value)) ||
			(null != spaceRegex.exec(document.certform.measure3.value)) ||
			(null != spaceRegex.exec(document.certform.caratweight.value)) ||
			(null != spaceRegex.exec(document.certform.depth.value)) ||
			(null != spaceRegex.exec(document.certform.tablesurface.value)) ||
			(null != spaceRegex.exec(document.certform.gridlethickness.value)) ||
			(null != spaceRegex.exec(document.certform.comments.value))) {
		alert("Please make sure all of the fields have values in them");
		document.certform.curdate.focus();
		valid = false;
	}
	
	return valid;
}

function validateSearchForm(searchform) {
	valid = true;
	spaceRegex = /^\s*$/;

	if ((null != spaceRegex.exec(document.searchform.certid.value)))  {
		alert("Please make sure you have specified the Certificate ID");
		document.searchform.certid.focus();
		valid = false;
	}
	else if ((null != spaceRegex.exec(document.searchform.caratweight.value))) {
		alert("Please make sure you have specified the Carat Weight");
		document.searchform.caratweight.focus();
		valid = false;
	}
	
	return valid;
}
