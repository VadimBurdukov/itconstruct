$(document).ready(function () {

    var inputBox = document.querySelector(".count");
    var invalidChars = [
        "-",
        "+",
        "e",
    ];
    inputBox.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
    $('a.counter__change').on('click', function (e) {
        var oper = $(this).attr("data-oper");
        var count = $(this).closest('.counter').find('input');
            switch (oper) {
                case '-':
                    if (count.val() > 1) {
                        count.val(count.val() - 1);
                    }
                    break;
                case '+':             
                    count.val(parseInt(count.val()) + 1);
                    break;
            } 
    })
});

