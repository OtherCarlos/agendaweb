var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);

$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 1200, 'swing', function () {
	        window.location.hash = target;
	    });
	});


        $('#button_editar').click(function(){

                $('#button_editar').addClass('disabled', 'disabled-grey');

                $('#UserProfile_nombres').attr('readonly', false);
                $('#UserProfile_apellidos').attr('readonly', false);
                $('#UserProfile_direccion').attr('readonly', false);
                $('#UserProfile_ciudad').attr('readonly', false);
                $('#UserProfile_pais').attr('readonly', false);
                $('#UserProfile_sobre_mi').attr('readonly', false);       
                $('#button_guardar').show();        
        });
        
});
