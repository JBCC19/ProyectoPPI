const time = document.getElementById('time');

const interval = setInterval(() => {

    const local = new Date();

    time.innerHTML = local.toLocaleTimeString();

}, 1000);

function displayDate() {
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var dateString =
        (day < 10 ? "0" + day : day) +
        "/" +
        (month < 10 ? "0" + month : month) +
        "/" +
        year;
    document.getElementById("date").innerHTML = dateString;
}
setInterval(displayDate, 1000);