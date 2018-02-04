$(document).ready(function(){
    var inputs = document.querySelectorAll('.form input');
    for (i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function(e) {
                var lr = $('#len-room').val();
                var lw = $('#width-room').val();
                var lb = $('#len-board').val() / 1000;
                var wb = $('#width-board').val() / 1000;
                var n = $('#number-board').val();
                var itogo = (lr*lw);
                var lprice = $('#lprice').text();
                var formula = ((lr*lw))/(lb*wb*n);
                var pin = Math.ceil(formula) * lprice;
                $('#spinner-value').html('<br>'+itogo+'м<sup>2</sup> = '+pin);
                $('#number-packaging').val(Math.ceil(formula));
        });
    }
});








