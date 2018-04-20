$(document).ready(function(){
    var inputs = document.querySelectorAll('.form input');
    for (i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function(e) {
                var s = $('#s-room').val();
                var lr = $('#len-room').val();
                var lw = $('#width-room').val();
                var lb = $('#len-board').val() / 1000;
                var wb = $('#width-board').val() / 1000;
                var n = $('#number-board').val();
                var lprice = $('#lprice').text();
                var formula = ((lr*lw))/(lb*wb*n);
                var itogo = (lr*lw);
                var price = itogo*lprice;
                var pin = Math.ceil(formula) * lprice;
                if(s !== ''){
                    $('#spinner-value').html('<br>'+s+'м<sup>2</sup> = '+(s*lprice));
                    $('#number-packaging').val(Math.ceil(formula));
                }else{
                    $('#spinner-value').html('<br>'+itogo+'м<sup>2</sup> = '+price);
                    $('#number-packaging').val(Math.ceil(formula));
                }

        });
    }
});








