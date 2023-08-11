document.getElementById("divhora").style.opacity = "25%";
document.getElementById("divfecha").style.opacity = "25%";
document.getElementById("divprof").style.opacity = "25%";
var especialidad = document.getElementById("especialidad"); // select especialidad
var imputprof= document.getElementsByName("nameprof")[0] ; // input prof nombre
var imputesp= document.getElementsByName("esp")[0]; // input especialidad
var imputfecha=document.getElementsByName("txtfecha")[0]; // input fecha dato
var imputidfecha=document.getElementsByName("fech")[0]; // input fecha id
var imputhora=document.getElementsByName("txthora")[0]; // input hora
var imputhiddenfecha=document.getElementsByName("hidtxtfecha")[0]; // input hora
var imputcheck=document.getElementsByName("txtradio")[0]; // input fecha
var boton=document.getElementsByName("btnaceptar"); // boton aceptar



 function check(){
var radiobut=document.querySelector('input[name="radio"]:checked').value;
//  var imputcheck=document.getElementsByName("txtradio")[0]; // input fecha
imputcheck.value=radiobut
}
 
  function showesp()
  {
 
   imputprof.value=""
  // imputidprof.value=""
   imputfecha.value=""
   imputidfecha.value=""
imputhiddenfecha.value=""
   imputhora.value=""
 imputcheck.value=""
  var selectespecialidad = especialidad.options[especialidad.selectedIndex].text;

if (selectespecialidad ==='Seleccione especialidad medica'|| selectespecialidad ==='Seleccione estudio medico') {
imputesp.value=""

  }else{
    imputesp.value=selectespecialidad
  }}

function showprof (){
  imputfecha.value=""
  imputhiddenfecha.value=""
   imputhora.value=""
   var profesional = document.getElementById("tipo"); // select prof
   var eligeprof = profesional.options[profesional.selectedIndex].text; //text option profesional
  // var idprof = profesional.options[profesional.selectedIndex].value; //text option profesional
  // var idprof = profesional.options[profesional.selectedIndex].getAttribute('data-idprof'); //text option profesional
  imputcheck.value=""
   if (eligeprof ==='Seleccione Profesional') {
    imputprof.value=""
  //  imputidprof.value=""
  }else{
imputprof.value = eligeprof     
//imputidprof.value=idprof
}}
   function showfecha (){
     imputhora.value=""
   var fecha = document.getElementById("fecha"); // select prof
   var selectfecha = fecha.options[fecha.selectedIndex].text; //text option fecha
   var selectidfecha = fecha.options[fecha.selectedIndex].getAttribute("data-valor"); //text data value option fecha
   var selectdatafecha = fecha.options[fecha.selectedIndex].getAttribute("data-texto"); //text data value option fecha
   
    
   if (selectfecha ==='Seleccione Fecha') {
imputfecha.value=""
imputidfecha.value=""
imputhora.value=""
imputhiddenfecha.value=""
   }else{
  imputfecha.value=selectfecha
  imputidfecha.value=selectidfecha
// selectdatafecha=selectfecha
 //selectfecha.append('kkkkk')
 // $('#fecha').append('<option value="jjjjjj">uhuhuhuihyuiyu</option>');
 
  imputhiddenfecha.value= selectdatafecha;
 /* selectElement = document.querySelector('#fecha');
        output = selectElement.options[selectElement.selectedIndex].value;
        fecha.options[fecha.selectedIndex].text= output;

        fecha.options[fecha.selectedIndex].value= output;
*/

 //fecha=selectfecha
    
}}
   function showhora (){
   var hora = document.getElementById("hora"); // select prof
   var selecthora = hora.options[hora.selectedIndex].text; //text option hora
//document.querySelector('#btnaceptar').disabled=false
    if (selecthora ==='Seleccione horarios') {
imputhora.value=""
   }else{
  imputhora.value=selecthora
     }}
  