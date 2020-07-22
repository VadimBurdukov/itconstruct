$(document).ready(function () {
    $('a.counter__change').on('click', function (e) {
        
        var oper = $(this).attr("oper");
        var count = $(this).closest('.counter').find('input');
            switch (oper) {
                case '-':
                    if (count.val() != 1) {
                        count.val(count.val() - 1);
                    }
                    break;
                case '+':             
                    count.val(parseInt(count.val()) + 1);
                    break;
            } 
    })
});

