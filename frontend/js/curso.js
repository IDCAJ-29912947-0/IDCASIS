function desglozar_precio()
{
   //tasa de impuesto	
   var tasa=document.getElementById("fky_iva").value
   var total=document.getElementById("pre_cur").value
   var baseImponible = (total / parseFloat("1."+tasa));
   var iva=baseImponible*parseFloat("0."+tasa)

   document.getElementById("bas_cur").value=baseImponible.toFixed(2)
   document.getElementById("iva_cur").value=iva.toFixed(2)
}