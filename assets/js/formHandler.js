/**
 * Created by Vladyslav on 09.12.2015.
 */

$(document).ready(function () {
    var form = document.forms.activityForm;
    $(form).submit(function (event) {
        event.preventDefault();
        $.ajax(form.action + '?ajax=true', {
            dataType: 'json',
            type: 'POST',
            data: $(form).serialize(),
            success: function (data) {
                $('.alert').remove();
                $(form).prepend('<div class="alert alert-success">' + data.message + '</div>');
            },
            error: function (xhr) {
                $('.alert').remove();
                try {
                    for (var prop in xhr.responseJSON.errors)
                        $(form).prepend('<div class="alert alert-danger">' + prop + ": " + xhr.responseJSON.errors[prop] + '</div>');
                } catch (e) {
                    $(form).prepend('<div class="alert alert-danger">Unknown error occurred</div>');
                }
            }
        })
    });
});
