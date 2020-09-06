var $collectionHolder;

// setup an "add a media" link
var $addMediaButton = $('<button type="button" class="add_media_url btn btn-outline-info">+</button>');
var $newLinkLi = $('<li class="list-unstyled text-right"></li>').append($addMediaButton);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of medias
    $collectionHolder = $('ul.medias');

    // add the "add a media" anchor and li to the medias ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('input').length);

    $addMediaButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addMediaForm($collectionHolder, $newLinkLi);
    });

    $collectionHolder.find('li.list-group-item').each(function() {
        addMediaFormDeleteBtn($(this));
    });
});

function addMediaForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li class="list-unstyled list-group-item"></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    addMediaFormDeleteBtn($newFormLi);
}

function addMediaFormDeleteBtn($tagFormLi) {
    var $removeFormButton = $('<button type="button" class="btn btn-outline-danger">-</button>');
    $tagFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $tagFormLi.remove();
    });
}
