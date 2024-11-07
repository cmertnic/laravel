import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('tel');
    var maskOptions = {
        mask: '(000) 000-0000' 
    };
    var mask = IMask(input, maskOptions);
});