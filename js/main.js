//For Taste rating
$(document).ready(function(){
	var contentId = 1;
	var type = "T"
	$('#setratingtaste img').each(function(i) {
	    $(this).click(function() {
	        inputRatingTaste(contentId, i + 1)
	        setRating(i + 1,type)
	    });
	})
})


function inputRatingTaste(id,p){
    if (p > 0) {
    $('#tasterate').val(p);
	}
}

//For Aroma rating
$(document).ready(function(){
	var contentId = 1;
	var type = "A"
	$('#setratingaroma img').each(function(i) {
	    $(this).click(function() {
	        inputRatingAroma(contentId, i + 1)
	        setRating(i + 1,type)
	    });
	})
})


function inputRatingAroma(id,p){
    if (p > 0) {
    $('#aromarate').val(p);
	}
}

//For Value Rating
$(document).ready(function(){
	var contentId = 1;
	var type = "V"
	$('#setratingvalue img').each(function(i) {
	    $(this).click(function() {
	        inputRatingValue(contentId, i + 1)
	        setRating(i + 1,type)
	    });
	})
})


function inputRatingValue(id,p){
    if (p > 0) {
    $('#valuerate').val(p);
	}
}

function setRating(point,type) {
    stars = new Array("1","2","3","4","5");
    start = parseInt(point);
    for(i=0;i<5;i++) {
    	stars[i]=type+stars[i];
    	//alert(stars[i])
        if(i >= start)
        	document.getElementById(stars[i]).src="img/rate_0.gif";
        if(i < parseInt(point))
       		document.getElementById(stars[i]).src="img/rate_1.gif";
    }
}

function validateBeer() {
    var errorMessage = "The information entered has following error(s): \n";
    var valid = true;

    if ($("#beername").val() === "") {
        errorMessage += "\n\t\u2022 Beer Name must not be left blank";
        valid = false;
    }

    if ($("#description").val() === "") {
        errorMessage += "\n\t\u2022 Beer Description must not be left blank";
        valid = false;
    }

    if (!valid) {
        alert(errorMessage);
    }

    return valid;
}

function validateReview() {
    var errorMessage = "The information entered has following error(s): \n";
    var valid = true;

    if ($("#username").val() === "") {
        errorMessage += "\n\t\u2022 Username must not be left blank";
        valid = false;
    }

    if (Number($("#tasterate").val()) === 0) {
        errorMessage += "\n\t\u2022 Taste must must be greater than 0";
        valid = false;
    }

    if (Number($("#aromarate").val()) === 0) {
        errorMessage += "\n\t\u2022 Taste must must be greater than 0";
        valid = false;
    }

    if (Number($("#valuerate").val()) === 0) {
        errorMessage += "\n\t\u2022 Taste must must be greater than 0";
        valid = false;
    }

    if ($("#comment").val() === "") {
        errorMessage += "\n\t\u2022 Comments section must not be left blank";
        valid = false;
    }

    if (!valid) {
        alert(errorMessage);
    }

    return valid;
}
