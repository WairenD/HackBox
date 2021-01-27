const a = [
    "You should look at Dewitt Minerva's profile maybe you can find something there.",
    "Hmm sometimes people will use a thing that they won't forget as a password.",
    "The her birthday seems like the right candidate for this."
];

var hints=0;
function getHint() {
    $('#hint').show().delay(10000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 10000);
    document.getElementById('hint').style.backgroundColor = "#333333";
    document.getElementById('hint').innerHTML = (a[this.hints]);
    this.hints = this.hints < a.length - 1? ++this.hints: 0;
}
