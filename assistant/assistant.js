// window.onbeforeunload = () => '';

const a = [
    "HINT 1 eque porro quisquam velit",
    "HINT 2 Lorem Ipsum is si.",
    "HINT 3",
    "HINT 4",
    "HINT 5.",
    "HINT 6.",
    "HINT 7.",
];

function newA() {
    $('#hint').show();
    index = Math.floor(Math.random() * (7));
    document.getElementById('hint').innerHTML = (a[index]);

    $('#hint').delay(5000).hide(0);
    setTimeout(function() {
        $('#hint').fadeOut('fast');
    }, 8000);
}