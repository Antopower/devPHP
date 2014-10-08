$(function() {
 
        // Confirm deleting resources
	    // méthode pour faire le delete tel que décrit sur http://www.codeforest.net/laravel-4-tutorial-part-2 
        $("form[data-confirm]").submit(function() {
                if ( ! confirm($(this).attr("data-confirm"))) {
                        return false;
                }
        });
 
});

function InvalidMsg(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('Remplissez ce champ');
    }
    else if (textbox.validity.typeMismatch){
        textbox.setCustomValidity('Veuillez entrer un email valide');
    }
    else {
        textbox.setCustomValidity('');
    }
        return true;
    }
	
$('#cconnexion').on('shown.bs.modal', function () {
    $('#usernameText').focus();
})
	
	
