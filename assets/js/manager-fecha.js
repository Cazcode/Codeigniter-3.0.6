/**
 * Fecha Actual en formato YYYY-MM-DD HH:ii
 * @return {String} Fecha Actual
 */
function getFechaActual() {
    var f = new Date();
    return f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate() + " " + f.getHours() + ":" + f.getMinutes();
}
/**
 * Fecha Actual en formato YYYY-MM-DDTHH:ii
 * @return {String} Fecha Actual
 */
function fechaActualDateTime() {
    var f = new Date();
    var anio = f.getFullYear();
    var mes = (f.getMonth() + 1);
    var dia = f.getDate();
    var hora = f.getHours();
    var minuto = f.getMinutes();
    if(mes<10) mes = '0'+mes;
    if(dia<10) dia = '0'+dia;
    if(hora<10) hora = '0'+hora;
    if(minuto<10) minuto = '0'+minuto;
    return anio+"-"+mes+"-"+dia+"T"+hora+":" +minuto;
}
