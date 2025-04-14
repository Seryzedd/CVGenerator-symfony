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

document
  .querySelectorAll('.add_collection')
  .forEach(btn => {
      btn.addEventListener("click", addFormToCollection)
  });

function addFormToCollection(e) {
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

    collectionHolder.classList.add('py-2');

    const item = document.createElement('li');

    item.classList.add('no-bullet');

    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
        /__name__/g,
        collectionHolder.dataset.index
        );

    collectionHolder.appendChild(item);

    const button = document.createElement('button');
    button.classList.add('remove-new');
    button.classList.add('btn');
    button.classList.add('btn-danger');
    button.setAttribute('type', 'button');
    button.innerText = "Remove new block";

    button.addEventListener('click', function(event) {
        removecontent($(collectionHolder))
    })
    collectionHolder.appendChild(button);

    collectionHolder.dataset.index++;
};

jQuery(document).ready(function() {
    var wrapper = $('.collection-elements');
    deletingparent(wrapper, '.remove-btn')
});

function deletingparent(parent, buttonClass) {
    var button = parent.first(buttonClass);
    console.log(button)
    button.on('click', function(event) {
        removecontent(parent);
    })
}

function removecontent(container) {
    container.html("");
}