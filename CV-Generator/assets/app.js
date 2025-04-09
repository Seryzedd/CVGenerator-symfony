// app.js

$('.alert .btn-close').on('click', function() {
    let alertBlock = jQuery(this).closest('.alert')
    alertBlock.fadeOut('slow');

    setTimeout(function() {
        alertBlock.remove()
    }, 3000)
})