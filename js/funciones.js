$(document).on('ready',function(){
    var valor = 1;
    var cantidad = 1;
    $('#docente, #curso').change(function(){
        cantidad = 1;
        $('.msg').text(' ').removeClass('msg_error','msg_ok').animate({ 'right' : '-155px' }, 300);
        return false;
    });
    $(".boton_envio_si").click(function() {
            valor = 1;
        var docente = $("#docente").val();
            suma = $(".suma").val();
            curso = $("#curso").val();
            if(suma == "2+8" && cantidad < 2)
            {
                cantidad += 1;
                $('.ajaxgif').removeClass('hide');
                var datos = 'docente='+ docente + '&curso=' + curso + '&valor=' + valor;
                $.ajax({
                    type: "POST",
                    url: "relacionar.php",
                    data: datos,
                    success: function() {
                        $('.ajaxgif').hide();
                        $('.msg').text('Genial...!').addClass('msg_ok').animate({ 'right' : '155px' }, 300);  
                    },
                    error: function() {
                        $('.ajaxgif').hide();
                        $('.msg').text('Error!').addClass('msg_error').animate({ 'right' : '155px' }, 300);                 
                    }
                });
            }
            else 
            {
                cantidad = 1;
                $('.msg').text(' ').removeClass('msg_error','msg_ok').animate({ 'right' : '-155px' }, 300);
        
                alert("No valido - Eliga Curso y/o Docente");
                return false;
            }
            cantidad++;
            return false;
    });
    $(".boton_envio_no").click(function() {
            valor = 1;
        var docente = $("#docente").val();
            suma = $(".suma").val();
            curso = $("#curso").val();
            if(suma == "2+8" && cantidad < 2)
            {
                valor = 1;
                $('.ajaxgif').removeClass('hide');
                var datos = 'docente='+ docente + '&curso=' + curso + '&valor=' + valor;
                $.ajax({
                    type: "POST",
                    url: "relacionar.php",
                    data: datos,
                    success: function() {
                        $('.ajaxgif').hide();
                        $('.msg').text('Genial...!').addClass('msg_ok').animate({ 'right' : '155px' }, 300);  
                    },
                    error: function() {
                        $('.ajaxgif').hide();
                        $('.msg').text('Error!').addClass('msg_error').animate({ 'right' : '155px' }, 300);                 
                    }
                });
            }
            else 
            {
                cantidad = 1;
        $('.msg').text(' ').removeClass('msg_error','msg_ok').animate({ 'right' : '-155px' }, 300);
                alert("No valido - Eliga Curso y/o Docente");
                return false;
            }
            return false;
    });
    $(".boton_envio_total").click(function(){
        $("#resultados").show();
        $("#resultados").animate({"height":"60px"}, "slow");
        return false;
    });
});