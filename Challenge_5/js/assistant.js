const a = [
    "Consider the server hosting this website",
    "The data returns in string format",
];
var hints=0;
function getHint() {
    $('#hint').show().delay(5000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 8000);
    document.getElementById('hint').style.backgroundColor = "#333333";
    document.getElementById('hint').innerHTML = (a[this.hints]);
    this.hints = this.hints < a.length - 1? ++this.hints: 0;
}
