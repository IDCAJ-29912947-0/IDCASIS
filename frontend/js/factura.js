function preguntar_factura()
{

 var respuesta=document.getElementById('nec_fac').value
    if(respuesta=="S")
 	{
      document.getElementById("tipo_persona").className =document.getElementById("tipo_persona").className.replace( /(?:^|\s)d-none(?!\S)/g , ' d-block' )
 	}

}

function preguntar_tipo_persona()
{
 var respuesta=document.getElementById('per_fac').value
    if(respuesta=="N")
 	{
      document.getElementById("retiene_islr").className =document.getElementById("retiene_islr").className.replace( /(?:^|\s)d-none(?!\S)/g , ' d-block' )
 	}else
 	if(respuesta=="J")
 	{
      document.getElementById("contribuyente").className =document.getElementById("contribuyente").className.replace( /(?:^|\s)d-none(?!\S)/g , ' d-block' )
 	}	

}