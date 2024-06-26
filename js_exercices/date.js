const date = new Date();
const today = date.getDay();
const daylist = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
const hours = date.getHours();
const minutes = date.getMinutes();
const prepand = (hours>=12)?"PM":"AM";
let hour = 0;
let minute = 0;
if (hours<12){
    hour = "0"+ hours
}else{
    hour = hours
}
if(minutes<10){
    minute = "0"+minutes
}else{
    minute = minutes
}
console.log("Today is : "+daylist[today]);
console.log("Current time is : "+hour+":"+minute+" "+prepand);