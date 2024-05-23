import './bootstrap';
import jQuery from 'jquery';
window.$ = jQuery;


$(document).ready(function() {
    $('.input-image').find('input').on('change', function(e) {
        const urlPath = URL.createObjectURL(e.target.files[0]);
        $('.input-image').find('.load').html('<img class="w-100" src="' + urlPath + '"/>');
    })
});