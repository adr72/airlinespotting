<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
function getCookie(name) {
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

function setCookie(c_name,value,exdays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString())+"; path=/";
	document.cookie=c_name + "=" + c_value;
}
function PonerCookie(){
	setCookie('tiendaaviso','1',365);
    $(document).ready(function() {
    $("#barraaceptacion").slideUp(1000, "linear");
});
}
</script>

<div id="barraaceptacion">
    <div id="infobox3">
	<?php
	if($idi=='ES'){
	echo"Uso de Cookies: esta web inserta cookies propias y de terceros derivadas de su uso en nuestra web, de medios sociales, as&iacute; como de Google Analytics y Adsense.<br>Si contin&uacute;as navegando consideramos que aceptas su uso.&nbsp;&nbsp;&nbsp;<div class='boton'><a class='ambar' href='http://www.airlinespotting.com/cookies/$idi'>m&aacute;s informaci&oacute;n</a></div>&nbsp;&nbsp;
	<div class='boton'><a class='ambar' href='javascript:void(0);' onclick='PonerCookie();'>Aceptar</a></div>";}else{
	echo"Use of Cookies: this site inserted own and third-party cookies resulting from its use in our web, social media, as well as Google Analytics and Adsense.<br>If you continue browsing we consider that you agree to its use.&nbsp;&nbsp;&nbsp;<div class='boton'><a class='ambar' href='http://www.airlinespotting.com/cookies/$idi'>more information</a></div>&nbsp;&nbsp;
	<div class='boton'><a class='ambar' href='javascript:void(0);' onclick='PonerCookie();'>Accept</a></div>";}
		?>
    </div>
</div>

<script>
if(getCookie('tiendaaviso')!="1"){
    $(document).ready(function() {
    $("#barraaceptacion").delay(2000).slideDown(1000, "linear");
});
}
</script>