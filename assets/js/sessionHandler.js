/**

 * Created by Vladyslav on 29.12.2015.

 */



$(document).ready(function () {

    var form = document.forms.sessionForm;

    $(form).submit(function (event) {

        event.preventDefault();



        $.ajax(this.action + '?ajax=true', {

            dataType: 'json',

            type: 'POST',

            data: $(form).serialize(),

            success: function (data) {

                //$('.login-partial').replaceWith(data['header']);

                history.pushState({href: '/index.html'}, document.title, '/index.html');

                $('#content').html(data.content);
                if(data.hasOwnProperty('header'))
                    $('header').replaceWith(data.header);

                $("html, body").animate({scrollTop: "0px"});



            },

            error: function (xhr) {

                $('.alert').remove();

                try {

                    for (var prop in xhr.responseJSON.errors)

                        $(form).prepend('<div class="alert alert-danger">' + prop + ": " + xhr.responseJSON.errors[prop] + '</div>');

                } catch (e) {

                    $(form).prepend('<div class="alert alert-danger">Unknown error occurred</div>')

                }

            }

        })

    })

});