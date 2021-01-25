const a = [
    "Their user input is not validated. Drag and drop the right query into the search bar for SQL injection!",
    "I've looked into the source code of the website and found the original query, it looks something like this: SELECT userID, name, priviledge_level, chat_link FROM bb_users WHERE (priviledge_level = 1 && name LIKE '[INPUT]')",
    "Try inputting something, I'll tell you if it's a valid query or not"
];

var hints = 0;


function getHint() {
    $('#hint').show().delay(10000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 8000);

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