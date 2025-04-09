// app.js

$('.alert .btn-close').on('click', function() {
    let alertBlock = jQuery(this).closest('.alert')
    alertBlock.fadeOut('slow');

    setTimeout(function() {
        alertBlock.remove()
    }, 3000)
})

$(document).ready(function() {
    setTimeout(function() {
        let alertBlock = jQuery('.alert')

        alertBlock.each(function(){
            var block = $(this)
            block.fadeOut('slow');

            setTimeout(function() {
                block.remove()
            }, 6000)
        })
    }, 1000) 
})