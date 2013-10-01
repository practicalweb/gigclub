
function addMemberForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');

    // get the new index
    var index = collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a person" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}

// Get the ul that holds the collection 
var collectionHolder = $('ul.members');

// setup an "add a person" link
var $addMemberLink = $('<a href="#" class="add_member_link">Add person</a>');
var $newLink = $('<li></li>').append($addMemberLink);

jQuery(document).ready(function() {
    // add the "add a person" anchor and li to the members div
    collectionHolder.append($newLink);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    collectionHolder.data('index', collectionHolder.find(':input').length);

    $addMemberLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new member form (see next code block)
        addMemberForm(collectionHolder, $newLink);
    });
});
