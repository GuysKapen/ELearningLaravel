window.onload = function () {
    setupTap()
    setupRating()
}

function setupTap() {

    let tabViews = _class("tab-view")

    for (let i = 0; i < tabViews.length; i++) {
        let tabPanes = _class("tabs-panel")[i].getElementsByClassName("tab-panel");
        for (let k = 0; k < tabPanes.length; k++) {
            const tab = tabPanes[k];
            tab.addEventListener("click", function () {
                _class("tabs-panel")[i].getElementsByClassName("active")[0].classList.remove("active")

                tab.classList.add("active")

                _class("tabs-content")[i].getElementsByClassName("active")[0].classList.remove("active")

                _class("tabs-content")[i].getElementsByClassName("tab-content")[k].classList.add("active")

            })
        }
    }
}

function _class(name) {
    return document.getElementsByClassName(name);
}

function setupRating() {
    $('.rating-input input').click(function () {
        $(".rating-input span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $.fn.stars = function () {
        return $(this).each(function () {
            const starWidth = $(this).width() / 5;
            const width = Math.max(0, (Math.min(5, parseFloat($(this).html())))) * starWidth;
            $(this).html(`<span style=\"width: ${width}px;position: absolute;top: 0;background: #fff;\"></span><span style=\"width: ${width}px;z-index: 100;position: absolute;top: 0;\"></span>`)
        });
    }

    $(document).ready(function () {
        $('span.rating-stars').stars();
    });
}

