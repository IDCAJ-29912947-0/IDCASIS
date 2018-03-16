function buscar_requisitos_curso()
{
    var sel_idx=document.getElementById("fky_tipo_curso").selectedIndex
    if(sel_idx>0)
    {	

	var fky_tipo_curso=document.getElementById("fky_tipo_curso").value
	var objAjax=new XMLHttpRequest()
	objAjax.open("GET","../../../backend/controlador/requisito_por_curso.php?accion=filtrar&fky_tipo_curso="+fky_tipo_curso)
	objAjax.onreadystatechange=function(){
      alert(objAjax.status)
      alert(objAjax.readyState)
       if(objAjax.status==200 && objAjax.readyState==4)
       	{
       		alert(objAjax.responseText)
       		document.getElementById("requisitos").innerHTML=objAjax.responseText
       	}

	}
	objAjax.send(null)
   }else
   	alert("Debe seleccionar un curso")
	
}