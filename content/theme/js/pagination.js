$(document).ready(function () {

    // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/
    // Pagination des commentaires (plugin Jquery simplePagination.js)
    var items = $(".list-wrapper");
    var numItems = items.length;
    var perPage = 2;

    items.slice(perPage).hide();

    $("#pagination-container").pagination({
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
