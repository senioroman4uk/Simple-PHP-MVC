/**
 * Created by Vladyslav on 10.12.2015.
 */

$(document).ready(function () {
    var form = document.forms.userForm;
    $(form).submit(function (event) {
        event.preventDefault();
        $.ajax(form.action + '?ajax=true', {
            dataType: 'json',
            type: 'POST',
            data: $(form).serialize(),
            success: function (data) {
                $('.alert').remove();
                history.pushState({href: '/index.html'}, document.title, '/index.html');
                $('.login-partial').replaceWith(data['header']);
                $('#content').html(data.content);
                //$(form).prepend('<div class="alert alert-success">' + data.name + '</div>');
            },
            error: function (xhr) {
                $('.alert').remove();
                try {
                    for (var prop in xhr.responseJSON)
                        $(form).prepend('<div class="alert alert-danger">' + prop + ": " + xhr.responseJSON[prop] + '</div>');
                } catch (e) {
                    $(form).prepend('<div class="alert alert-danger">Unknown error occurred</div>');
                }
            }
        })
    });
});