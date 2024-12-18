var date = new Date();

var current_date = (date.getFullYear() + "-" + "0" + (date.getMonth() + 1) + "-" + "0" + date.getDate());

document.getElementById("max_day").max = current_date;
