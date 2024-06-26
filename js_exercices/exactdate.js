var date = new Date();
var day = date.getDay();
var month = date.getMonth();
const year = date.getFullYear();
if(day<10){
    day = "0"+day
}
if(month<10){
    month = "0"+month
}
const full_date = day+"/"+month+"/"+year;
console.log(full_date)