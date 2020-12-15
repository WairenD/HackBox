// window.onbeforeunload = () => '';

const a = [
    "HINT 1",
    "HINT 2 Lorem Ipsum",
    "HINT 3",
    "HINT 4",
    "HINT 5.",
    "HINT 6.",
    "HINT 7.",
];

var hints=0;
function getHint() {
    $('#hint').show().delay(5000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 8000);

    document.getElementById('hint').innerHTML = (a[this.hints]);
    this.hints = this.hints < a.length - 1? ++this.hints: 0;
}