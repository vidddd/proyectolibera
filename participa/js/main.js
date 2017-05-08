function GetCookie(name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
    while (i<clen) {
        var j=i+alen;

        if (document.cookie.substring(i,j)==arg)
            return "1";
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0)
             break;
     }
    return null;
}

function aceptar_cookies(){
    var expire=new Date();
    expire=new Date(expire.getTime()+7776000000);
    document.cookie="cookies_libera=aceptada; expires="+expire;

    var visit=GetCookie("cookies_libera");
    if (visit==1){
      $('#barraaceptacion').toggle();
    }
}

jQuery(function() {
    var visit=GetCookie("cookies_libera");
    if (visit==1){
        $('#barraaceptacion').toggle();
    } else {
        var expire=new Date();
        expire=new Date(expire.getTime()+7776000000);
        document.cookie="cookies_libera=aceptada; expires="+expire;
    }
});
function cerrar_cookies() {
    $('#barraaceptacion').toggle();
}
$(document).ready(function() {
    $("#form1").validate({
          rules: {
            provincia: {
              required: true,
            },
            hora: {
              required: true,
            },
           lugar: {
              required: true,
            }
          }
      ,messages: {
        email: {
          required: 'Por favor, introduce este una direccion de email válida'
        }
      }
    });
});
