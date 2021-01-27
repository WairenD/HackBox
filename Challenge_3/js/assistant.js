const a = [
    "As a user on this site we cannot do anything, we need to escalate our privileges. Check around the webpage if you can somehow change your role to an Admin",
    "It seems that to access anything on this site you need a valid authorization token.",
    "The website seems to be storing user info on the user's side, press f12 and check around the Storage if you can't use that to your advantage."
];

var hints = 0;


function getHint() {
    $('#hint').show().delay(10000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 8000);
    document.getElementById('hint').style.backgroundColor = "#171717";
    document.getElementById('hint').innerHTML = (a[this.hints]);
    this.hints = this.hints < a.length - 1? ++this.hints: 0;
}

function getHintWithInput(hintText) {
    $('#hint').show().delay(10000).hide(0);
    setTimeout(function () {
        $('#hint').fadeOut('fast');
    }, 8000);
    document.getElementById('hint').innerHTML = (hintText);
}
