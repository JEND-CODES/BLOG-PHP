$(document).ready(function () {

    // Copie de valeurs d"un input à un autre dans le process de vérifications des pseudos disponibles (voir viewCheckusername.php)
    const copyValue = $("#pseudo_checked").val(); // get the value from the first input
    $("#input_checked").val(copyValue); // set the value to another input

    // Scroll to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $("#back-to-top").fadeIn();
        } else {
            $("#back-to-top").fadeOut();
        }
    });
    // scroll body to 0px on click
    $("#back-to-top").click(function () {
        $("body,html").animate({
            scrollTop: 0
        }, 400);
        return false;
    });

});
