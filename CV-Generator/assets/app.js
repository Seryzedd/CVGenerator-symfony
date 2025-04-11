// app.js

$('.alert .btn-close').on('click', function() {
    let alertBlock = jQuery(this).closest('.alert')
    alertBlock.fadeOut('slow');

    setTimeout(function() {
        alertBlock.remove()
    }, 3000)
})

$(document).ready(function() {
    $('.alert').fadeIn('slow', 'swing');

    setTimeout(function() {
        let alertBlock = jQuery('.alert')

        alertBlock.each(function(){
            var block = $(this)
            block.fadeOut('slow');

            setTimeout(function() {
                block.remove()
            }, 10000)
        })
    }, 5000) 
})

$('input[type="file"]').on('change', function() {
    const file = this.files;
    const previewcontainer = $('#img_preview');
    if (file) {
        
        if (previewcontainer.find('img').length == 0) {
            let newpic = document.createElement("img")
            newpic.setAttribute('display', 'none')
            previewcontainer.html(newpic);
        } else {
            previewcontainer.find('img').fadeOut(0)
        }

        let img = previewcontainer.find('img')

        const fileReader = new FileReader();
        fileReader.onload = function(event) {
            img.attr('src', event.target.result);
        }

        fileReader.readAsDataURL(file[0]);

        img.fadeIn('slow')
    }
})