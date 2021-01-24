$(document).ready(function () {

    // Copie de valeurs d'un input à un autre dans le process de vérifications des pseudos disponibles (voir viewCheckusername.php)
    const copy_value = $('#pseudo_checked').val(); // get the value from the first input
    $("#input_checked").val(copy_value); // set the value to another input

    // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/
    // Pagination des commentaires (plugin Jquery simplePagination.js)
    var items = $(".list-wrapper");
    var numItems = items.length;
    var perPage = 8;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

});