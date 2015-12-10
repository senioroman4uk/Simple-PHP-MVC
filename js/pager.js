/**
 * Created by Vladyslav on 15.11.2015.
 */
function Pager() {
    var popped = ('state' in window.history) && window.history.state != null;
    var initialURL = location.href;


    var updateHistory = function (url) {
        history.pushState({href: url}, document.title, url);
    };

    function updateHeader() {
        $.get('/header', 'html', function (html) {
            $('header').remove();
            $('#container').prepend(html);
        })
    }

    window.history.replaceState({'href': initialURL}, document.title, window.location.href);

    $(window).bind("popstate", function (e) {
        var initialPop = !popped && location.href == initialURL;
        popped = true;
        if (initialPop)
            return;

        currentXhr = $.ajax(e.originalEvent.state.href.replace('html', 'json'), historyAjaxOptions);
    });

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
        beforeSend: redirectAjaxOptions['beforeSend'],
        complete: redirectAjaxOptions['complete'],

        success: function (data) {
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
                    updateHistory(href);
                    $('#content').html(data.content);
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

            $.ajax(that.href.replace('html', 'json'), {
                dataType: 'html',
                type: 'GET',
                success: function (data) {
                    $('.login-partial').replaceWith(data);
                }
            });
        },
        updateHeader: updateHeader
    }
}


