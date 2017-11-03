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
        
        $('#plus').click(function(){
                var count = $(":input[id^=Contenido_video]").length;
                    
                    var div = '<div class="row" id="video_input">'+$("#Contenido_video").parent().parent().html()+'</div>';
                    $("#Contenido_video").attr("name", "Contenido[video][" + count + "]");
                    $("#ytContenido_video").attr("name", "Contenido[video][" + count + "]");
                    $("#Contenido_video").parent().parent().find("#remove").hide();


                    $("#Contenido_video").attr("id", "Contenido_video_" + count);
                    $("#ytContenido_video").attr("id", "ytContenido_video_" + count);
                    var content = $("#video").html();
                    $("#video").html(content + div);
                    $("#Contenido_video").parent().parent().find("#remove").show();


                    div = '';
                    content = '';
                
        });
        
        $('.remove').click(function(){
                $(this).parent().parent().remove();
                
        });
        
        $(document).on('click', '.remove', function() {
            
            $(this).parent().remove();
            var count = $(":input[id^=Contenido_video]").length;
            $("#Contenido_video_" + count).attr("name", "Contenido[video]");
            $("#ytContenido_video_" + count).attr("name", "Contenido[video]");
                    
            $("#Contenido_video_" + count).attr("id", "Contenido_video");
            $("#ytContenido_video_" + count).attr("id", "ytContenido_video");
            
            $("#Contenido_video").parent().parent().find("#remove").show();


        });
        
        $('#plus_img').click(function(){
                var count = $(":input[id^=Contenido_image]").length;
                    
                    var div = '<div class="row" id="img_input">'+$("#Contenido_image").parent().parent().html()+'</div>';
                    $("#Contenido_image").attr("name", "Contenido[image][" + count + "]");
                    $("#ytContenido_image").attr("name", "Contenido[image][" + count + "]");
                    $("#Contenido_image").parent().parent().find("#remove_img").hide();


                    $("#Contenido_image").attr("id", "Contenido_image_" + count);
                    $("#ytContenido_image").attr("id", "ytContenido_image_" + count);
                    var content = $("#image").html();
                    $("#image").html(content + div);
                    $("#Contenido_image").parent().parent().find("#remove_img").show();


                    div = '';
                    content = '';
                
        });
        
        $('.remove_img').click(function(){
                $(this).parent().parent().remove();
                
        });
        
        $(document).on('click', '.remove_img', function() {
            
            $(this).parent().remove();
            var count = $(":input[id^=Contenido_image]").length;
            $("#Contenido_image_" + count).attr("name", "Contenido[image]");
            $("#ytContenido_image_" + count).attr("name", "Contenido[image]");
                    
            $("#Contenido_image_" + count).attr("id", "Contenido_image");
            $("#ytContenido_image_" + count).attr("id", "ytContenido_image");
            
            $("#Contenido_image").parent().parent().find("#remove_img").show();


        });
        
        
        $("#button_file").click(function(){
           $("#UserProfile_image").click(); 
        });
        
});

function makeSubmit () {
     var count = $(":input[id^=Contenido_video]").length;
     $("#Contenido_video").attr("name", "Contenido[video][" + count + "]");
     $("#ytContenido_video").attr("name", "Contenido[video][" + count + "]");
     $("#Contenido_video").attr("id", "Contenido_video_" + count);
     $("#ytContenido_video").attr("id", "ytContenido_video_" + count);
     
    var count = $(":input[id^=Contenido_image]").length;
     $("#Contenido_image").attr("name", "Contenido[image][" + count + "]");
     $("#ytContenido_image").attr("name", "Contenido[image][" + count + "]");
     $("#Contenido_image").attr("id", "Contenido_image_" + count);
     $("#ytContenido_image").attr("id", "ytContenido_image_" + count);
     
     $("#calendario-update-form").submit();
}
