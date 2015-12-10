/**
 * Created by Vladyslav on 10.12.2015.
 */

$(document).ready(function () {
    var form = document.forms.sessionForm;
    $(form).submit(function (event) {
        event.preventDefault();

        $.ajax(form.action + '?ajax=true', {
            dataType: 'json',
            type: 'POST',
            data: $(form).serialize(),
            success: function (data) {
                $('.login-partial').replaceWith(data['header']);
                //$('#content').html(data.html);
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