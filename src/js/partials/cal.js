$(document).ready(function(){
    var inputs = document.querySelectorAll('.form input');
    for (i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            if(!$(inputs).val() == ''){
                var lr = $('#len-room').val();
                var lw = $('#width-room').val();
                var lb = $('#len-board').val() / 1000;
                var wb = $('#width-board').val() / 1000;
                var n = $('#number-board').val();
                var lprice = $('#lprice').text();
                var formula = ((lr*lw))/(lb*wb*n);
                var pin = Math.ceil(formula) * lprice;
                $('#spinner-value').html(pin);
                $('.card__price-error span').hide();
                console.log('1');
            } else if($('#len-room').val() == '' || $('#width-room').val() == ''){
                $('.card__price-error span').html("Введите цифры");
                $('.card__price-error span').show();
                console.log('2');
            }
        });
    }
});








