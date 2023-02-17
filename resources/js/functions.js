window.onload = function () {
    setupTap()
    setupRating()
}

window.showConfirmPopup = function (callback, message = 'Do you really want to delete? You wont be able to revert it.', confirmText = "Confirm", cancelText = "Cancel") {
    new jBox('Confirm', {
        confirmButton: confirmText, // Text for the submit button
        cancelButton: cancelText, // Text for the cancel button
        confirm: callback, // Function to execute when clicking the submit button. By default jBox will use the onclick or href attribute in that order if found
        cancel: null, // Function to execute when clicking the cancel button
        closeOnConfirm: true, // Close jBox when the user clicks the confirm button
        target: window,
        addClass: 'jBox-Modal',
        fixed: true,
        attach: '[data-confirm]',
        getContent: 'data-confirm',
        content: message,
        maxWidth: 360,
        blockScroll: true,
        closeOnEsc: true,
        closeOnClick: true,
        closeButton: false,
        overlay: true,
        animation: 'zoomIn',
        preventDefault: true,
    }).open();
}

function setupTap() {

    let tabViews = _class("tab-view")

    for (let i = 0; i < tabViews.length; i++) {
        let panel = _class("tabs-panel")[i];
        if (panel == null) continue
        let tabPanes =
            panel.getElementsByClassName("tab-panel");
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

    $(function () {
        $('span.rating-stars').stars();
    });
}

