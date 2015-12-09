/**
 * Created by Vladyslav on 15.11.2015.
 */
function Pager() {
    var popped = ('state' in window.history) && window.history.state != null;
    var initialURL = location.href;


    var updateHistory = function (url) {
        history.pushState({href: url}, document.title, url);
    };

    window.history.replaceState({'href': initialURL}, document.title, window.location.href);

    $(window).bind("popstate", function (e) {
        //e.preventDefault();

        var initialPop = !popped && location.href == initialURL;
        popped = true;
        if (initialPop)
            return;

        currentXhr = $.ajax(e.originalEvent.state.href.replace('html', 'json'), historyAjaxOptions);
    });

    var unbind = function () {
        $(window).unbind('popstate');
        $(document).off('click', 'a');
    };


    var inProcess = false;
    var currentXhr = null;

    var redirectAjaxOptions = {
        dataType: 'json',
        //data : {ajax : true},
        beforeSend: function () {
            inProcess = true;
        },
        complete: function () {
            inProcess = false;
            currentXhr = null;
        }
    };

    var historyAjaxOptions = {
        dataType: 'json',
        beforeSend: function () {
            inProcess = true;
        },

        complete: function () {
            inProcess = false;
            currentXhr = null;
        },

        success: function (data) {
            unbind();
            $('#content').html(data.content);
            $("html, body").animate({scrollTop: "0px"});
        }
    };


    return {
        linkClickHandler: function (event) {
            if (this.href.match(/\/dashboard$/))
                return;

            event.preventDefault();

            if (currentXhr)
                currentXhr.abort();

            redirectAjaxOptions['success'] = function (href) {
                return function (data) {
                    unbind();
                    updateHistory(href);
                    //console.log(data);
                    $('#content').html(data.content);
                    //document.title = data.title;
                    $("html, body").animate({scrollTop: "0px"});
                }
            }(this.href);
            currentXhr = $.ajax(this.href.replace('html', 'json'), redirectAjaxOptions);
        },

        logoutHandler: function (event) {
            event.preventDefault();
            var that = this;

            //TODO: Refactor
            if (currentXhr)
                currentXhr.abort();

            $.ajax(that.href, {
                dataType: 'json',
                type: 'GET',
                data: {isAjax: true},
                success: function (data) {
                    unbind();

                    document.title = data.title;
                    history.pushState({}, document.title, '/');
                    updateHeader();
                    $('#content').html(data.html);
                },
                error: function (xhr) {
                    $('.alert').remove();
                    try {
                        xhr.responseJSON.errors.forEach(function (error) {
                            $(form).prepend('<div class="alert alert-danger">' + error + '</div>')
                        });
                    } catch (e) {
                        $(form).prepend('<div class="alert alert-danger">Unknown error occurred</div>')
                    }
                }
            });

        },

        unbind: unbind
    }
}


