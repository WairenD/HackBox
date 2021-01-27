const a = [
    "Brute-force is when an attacker submits many passwords or passphrases that eventually lead to correct combination",
    "Check the text,maybe there is something that could help you with the username",
    "Try 'Finding' the username",
    "Have you seen the image?A key for the password could be found ",
    "Try the combinations from Top to Bottom.",
    "Maybe try 'Inspect Element' or 'View Page source'",
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
