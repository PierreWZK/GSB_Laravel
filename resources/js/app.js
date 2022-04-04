require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// CHECK CHEXBOX with id bltheme and change the body class
// if (document.getElementById('bltheme').checked == true) {
//     alert('TEST');
//     // document.body.classList.add('bltheme');
// }


/*$('#bltheme').change(function() {
    if ($(this).is(":checked")) {
        $('body').addClass('bltheme');
    } else {
        $('body').removeClass('bltheme');
    }
});  */