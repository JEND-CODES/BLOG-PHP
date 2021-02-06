$(function () {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // Messages d'erreurs
        },
        submitSuccess: function ($form, event) {
            // Empêcher les spams et l'envoi par défaut
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            // Récupération des données
            var name = $("input#name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var message = $("textarea#message").val();
            var firstName = name; // Pour le message de réussite ou d'échec
            // Vérification du champ nom pour le message de réussite ou d'échec
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "content/theme/mail/contact_me.php",
                // url: "././mail/contact_me.php",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                cache: false,
                success: function () {
                    // Activaction du bouton et affichage du message de réussite
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Message envoyé</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    // Effacement de tous les champs
                    $('#contactForm').trigger("reset");
                },
                error: function () {
                    // Message d'erreur après l'envoi
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Désolé " + firstName + ", il y a un problème d'envoi momentané. Réessayez !");
                    $('#success > .alert-danger').append('</div>');
                    // Effacement de tous les champs
                    $('#contactForm').trigger("reset");
                },
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// Evénement au click sur les champs d'échec ou de réussite
$('#name').focus(function () {
    $('#success').html('');
});