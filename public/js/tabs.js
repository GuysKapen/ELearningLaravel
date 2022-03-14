window.onload = function () {
    console.log("Loaded")
    setupTap()

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

