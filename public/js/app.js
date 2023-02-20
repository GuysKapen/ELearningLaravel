/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/aos/dist/aos.js":
/*!**************************************!*\
  !*** ./node_modules/aos/dist/aos.js ***!
  \**************************************/
/***/ (function(module) {

!function(e,t){ true?module.exports=t():0}(this,function(){return function(e){function t(o){if(n[o])return n[o].exports;var i=n[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var n={};return t.m=e,t.c=n,t.p="dist/",t(0)}([function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}var i=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e},r=n(1),a=(o(r),n(6)),u=o(a),c=n(7),s=o(c),f=n(8),d=o(f),l=n(9),p=o(l),m=n(10),b=o(m),v=n(11),y=o(v),g=n(14),h=o(g),w=[],k=!1,x={offset:120,delay:0,easing:"ease",duration:400,disable:!1,once:!1,startEvent:"DOMContentLoaded",throttleDelay:99,debounceDelay:50,disableMutationObserver:!1},j=function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];if(e&&(k=!0),k)return w=(0,y.default)(w,x),(0,b.default)(w,x.once),w},O=function(){w=(0,h.default)(),j()},M=function(){w.forEach(function(e,t){e.node.removeAttribute("data-aos"),e.node.removeAttribute("data-aos-easing"),e.node.removeAttribute("data-aos-duration"),e.node.removeAttribute("data-aos-delay")})},S=function(e){return e===!0||"mobile"===e&&p.default.mobile()||"phone"===e&&p.default.phone()||"tablet"===e&&p.default.tablet()||"function"==typeof e&&e()===!0},_=function(e){x=i(x,e),w=(0,h.default)();var t=document.all&&!window.atob;return S(x.disable)||t?M():(x.disableMutationObserver||d.default.isSupported()||(console.info('\n      aos: MutationObserver is not supported on this browser,\n      code mutations observing has been disabled.\n      You may have to call "refreshHard()" by yourself.\n    '),x.disableMutationObserver=!0),document.querySelector("body").setAttribute("data-aos-easing",x.easing),document.querySelector("body").setAttribute("data-aos-duration",x.duration),document.querySelector("body").setAttribute("data-aos-delay",x.delay),"DOMContentLoaded"===x.startEvent&&["complete","interactive"].indexOf(document.readyState)>-1?j(!0):"load"===x.startEvent?window.addEventListener(x.startEvent,function(){j(!0)}):document.addEventListener(x.startEvent,function(){j(!0)}),window.addEventListener("resize",(0,s.default)(j,x.debounceDelay,!0)),window.addEventListener("orientationchange",(0,s.default)(j,x.debounceDelay,!0)),window.addEventListener("scroll",(0,u.default)(function(){(0,b.default)(w,x.once)},x.throttleDelay)),x.disableMutationObserver||d.default.ready("[data-aos]",O),w)};e.exports={init:_,refresh:j,refreshHard:O}},function(e,t){},,,,,function(e,t){(function(t){"use strict";function n(e,t,n){function o(t){var n=b,o=v;return b=v=void 0,k=t,g=e.apply(o,n)}function r(e){return k=e,h=setTimeout(f,t),M?o(e):g}function a(e){var n=e-w,o=e-k,i=t-n;return S?j(i,y-o):i}function c(e){var n=e-w,o=e-k;return void 0===w||n>=t||n<0||S&&o>=y}function f(){var e=O();return c(e)?d(e):void(h=setTimeout(f,a(e)))}function d(e){return h=void 0,_&&b?o(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),k=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(O())}function m(){var e=O(),n=c(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(f,t),o(w)}return void 0===h&&(h=setTimeout(f,t)),g}var b,v,y,g,h,w,k=0,M=!1,S=!1,_=!0;if("function"!=typeof e)throw new TypeError(s);return t=u(t)||0,i(n)&&(M=!!n.leading,S="maxWait"in n,y=S?x(u(n.maxWait)||0,t):y,_="trailing"in n?!!n.trailing:_),m.cancel=l,m.flush=p,m}function o(e,t,o){var r=!0,a=!0;if("function"!=typeof e)throw new TypeError(s);return i(o)&&(r="leading"in o?!!o.leading:r,a="trailing"in o?!!o.trailing:a),n(e,t,{leading:r,maxWait:t,trailing:a})}function i(e){var t="undefined"==typeof e?"undefined":c(e);return!!e&&("object"==t||"function"==t)}function r(e){return!!e&&"object"==("undefined"==typeof e?"undefined":c(e))}function a(e){return"symbol"==("undefined"==typeof e?"undefined":c(e))||r(e)&&k.call(e)==d}function u(e){if("number"==typeof e)return e;if(a(e))return f;if(i(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=i(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(l,"");var n=m.test(e);return n||b.test(e)?v(e.slice(2),n?2:8):p.test(e)?f:+e}var c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},s="Expected a function",f=NaN,d="[object Symbol]",l=/^\s+|\s+$/g,p=/^[-+]0x[0-9a-f]+$/i,m=/^0b[01]+$/i,b=/^0o[0-7]+$/i,v=parseInt,y="object"==("undefined"==typeof t?"undefined":c(t))&&t&&t.Object===Object&&t,g="object"==("undefined"==typeof self?"undefined":c(self))&&self&&self.Object===Object&&self,h=y||g||Function("return this")(),w=Object.prototype,k=w.toString,x=Math.max,j=Math.min,O=function(){return h.Date.now()};e.exports=o}).call(t,function(){return this}())},function(e,t){(function(t){"use strict";function n(e,t,n){function i(t){var n=b,o=v;return b=v=void 0,O=t,g=e.apply(o,n)}function r(e){return O=e,h=setTimeout(f,t),M?i(e):g}function u(e){var n=e-w,o=e-O,i=t-n;return S?x(i,y-o):i}function s(e){var n=e-w,o=e-O;return void 0===w||n>=t||n<0||S&&o>=y}function f(){var e=j();return s(e)?d(e):void(h=setTimeout(f,u(e)))}function d(e){return h=void 0,_&&b?i(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),O=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(j())}function m(){var e=j(),n=s(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(f,t),i(w)}return void 0===h&&(h=setTimeout(f,t)),g}var b,v,y,g,h,w,O=0,M=!1,S=!1,_=!0;if("function"!=typeof e)throw new TypeError(c);return t=a(t)||0,o(n)&&(M=!!n.leading,S="maxWait"in n,y=S?k(a(n.maxWait)||0,t):y,_="trailing"in n?!!n.trailing:_),m.cancel=l,m.flush=p,m}function o(e){var t="undefined"==typeof e?"undefined":u(e);return!!e&&("object"==t||"function"==t)}function i(e){return!!e&&"object"==("undefined"==typeof e?"undefined":u(e))}function r(e){return"symbol"==("undefined"==typeof e?"undefined":u(e))||i(e)&&w.call(e)==f}function a(e){if("number"==typeof e)return e;if(r(e))return s;if(o(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=o(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(d,"");var n=p.test(e);return n||m.test(e)?b(e.slice(2),n?2:8):l.test(e)?s:+e}var u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},c="Expected a function",s=NaN,f="[object Symbol]",d=/^\s+|\s+$/g,l=/^[-+]0x[0-9a-f]+$/i,p=/^0b[01]+$/i,m=/^0o[0-7]+$/i,b=parseInt,v="object"==("undefined"==typeof t?"undefined":u(t))&&t&&t.Object===Object&&t,y="object"==("undefined"==typeof self?"undefined":u(self))&&self&&self.Object===Object&&self,g=v||y||Function("return this")(),h=Object.prototype,w=h.toString,k=Math.max,x=Math.min,j=function(){return g.Date.now()};e.exports=n}).call(t,function(){return this}())},function(e,t){"use strict";function n(e){var t=void 0,o=void 0,i=void 0;for(t=0;t<e.length;t+=1){if(o=e[t],o.dataset&&o.dataset.aos)return!0;if(i=o.children&&n(o.children))return!0}return!1}function o(){return window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver}function i(){return!!o()}function r(e,t){var n=window.document,i=o(),r=new i(a);u=t,r.observe(n.documentElement,{childList:!0,subtree:!0,removedNodes:!0})}function a(e){e&&e.forEach(function(e){var t=Array.prototype.slice.call(e.addedNodes),o=Array.prototype.slice.call(e.removedNodes),i=t.concat(o);if(n(i))return u()})}Object.defineProperty(t,"__esModule",{value:!0});var u=function(){};t.default={isSupported:i,ready:r}},function(e,t){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(){return navigator.userAgent||navigator.vendor||window.opera||""}Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),r=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,a=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,u=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,c=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,s=function(){function e(){n(this,e)}return i(e,[{key:"phone",value:function(){var e=o();return!(!r.test(e)&&!a.test(e.substr(0,4)))}},{key:"mobile",value:function(){var e=o();return!(!u.test(e)&&!c.test(e.substr(0,4)))}},{key:"tablet",value:function(){return this.mobile()&&!this.phone()}}]),e}();t.default=new s},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e,t,n){var o=e.node.getAttribute("data-aos-once");t>e.position?e.node.classList.add("aos-animate"):"undefined"!=typeof o&&("false"===o||!n&&"true"!==o)&&e.node.classList.remove("aos-animate")},o=function(e,t){var o=window.pageYOffset,i=window.innerHeight;e.forEach(function(e,r){n(e,i+o,t)})};t.default=o},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(12),r=o(i),a=function(e,t){return e.forEach(function(e,n){e.node.classList.add("aos-init"),e.position=(0,r.default)(e.node,t.offset)}),e};t.default=a},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(13),r=o(i),a=function(e,t){var n=0,o=0,i=window.innerHeight,a={offset:e.getAttribute("data-aos-offset"),anchor:e.getAttribute("data-aos-anchor"),anchorPlacement:e.getAttribute("data-aos-anchor-placement")};switch(a.offset&&!isNaN(a.offset)&&(o=parseInt(a.offset)),a.anchor&&document.querySelectorAll(a.anchor)&&(e=document.querySelectorAll(a.anchor)[0]),n=(0,r.default)(e).top,a.anchorPlacement){case"top-bottom":break;case"center-bottom":n+=e.offsetHeight/2;break;case"bottom-bottom":n+=e.offsetHeight;break;case"top-center":n+=i/2;break;case"bottom-center":n+=i/2+e.offsetHeight;break;case"center-center":n+=i/2+e.offsetHeight/2;break;case"top-top":n+=i;break;case"bottom-top":n+=e.offsetHeight+i;break;case"center-top":n+=e.offsetHeight/2+i}return a.anchorPlacement||a.offset||isNaN(t)||(o=t),n+o};t.default=a},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){for(var t=0,n=0;e&&!isNaN(e.offsetLeft)&&!isNaN(e.offsetTop);)t+=e.offsetLeft-("BODY"!=e.tagName?e.scrollLeft:0),n+=e.offsetTop-("BODY"!=e.tagName?e.scrollTop:0),e=e.offsetParent;return{top:n,left:t}};t.default=n},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){return e=e||document.querySelectorAll("[data-aos]"),Array.prototype.map.call(e,function(e){return{node:e}})};t.default=n}])});

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
// window.Vue = require('vue').default;
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// const app = new Vue({
//     el: '#app',
// });

/***/ }),

/***/ "./resources/js/functions.js":
/*!***********************************!*\
  !*** ./resources/js/functions.js ***!
  \***********************************/
/***/ (() => {

window.onload = function () {
  setupTap();
  setupRating();
};

window.showConfirmPopup = function (callback) {
  var message = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'Do you really want to delete? You wont be able to revert it.';
  var confirmText = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "Confirm";
  var cancelText = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : "Cancel";
  new jBox('Confirm', {
    confirmButton: confirmText,
    // Text for the submit button
    cancelButton: cancelText,
    // Text for the cancel button
    confirm: callback,
    // Function to execute when clicking the submit button. By default jBox will use the onclick or href attribute in that order if found
    cancel: null,
    // Function to execute when clicking the cancel button
    closeOnConfirm: true,
    // Close jBox when the user clicks the confirm button
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
    preventDefault: true
  }).open();
};

function setupTap() {
  var tabViews = _class("tab-view");

  var _loop = function _loop(i) {
    var panel = _class("tabs-panel")[i];

    if (panel == null) return "continue";
    var tabPanes = panel.getElementsByClassName("tab-panel");

    var _loop2 = function _loop2(k) {
      var tab = tabPanes[k];
      tab.addEventListener("click", function () {
        _class("tabs-panel")[i].getElementsByClassName("active")[0].classList.remove("active");

        tab.classList.add("active");

        _class("tabs-content")[i].getElementsByClassName("active")[0].classList.remove("active");

        _class("tabs-content")[i].getElementsByClassName("tab-content")[k].classList.add("active");
      });
    };

    for (var k = 0; k < tabPanes.length; k++) {
      _loop2(k);
    }
  };

  for (var i = 0; i < tabViews.length; i++) {
    var _ret = _loop(i);

    if (_ret === "continue") continue;
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
      var starWidth = $(this).width() / 5;
      var width = Math.max(0, Math.min(5, parseFloat($(this).html()))) * starWidth;
      $(this).html("<span style=\"width: ".concat(width, "px;position: absolute;top: 0;background: #fff;\"></span><span style=\"width: ").concat(width, "px;z-index: 100;position: absolute;top: 0;\"></span>"));
    });
  };

  $(function () {
    $('span.rating-stars').stars();
  });
}

/***/ }),

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

try {
  window.AOS = __webpack_require__(/*! aos */ "./node_modules/aos/dist/aos.js");
  AOS.init({
    duration: 800,
    easing: 'slide',
    once: false
  });
} catch (e) {}

try {
  jQuery(document).ready(function ($) {
    "use strict";

    var siteMenuClone = function siteMenuClone() {
      $('.js-clone-nav').each(function () {
        var $this = $(this);
        $this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
      });
      setTimeout(function () {
        var counter = 0;
        $('.site-mobile-menu .has-children').each(function () {
          var $this = $(this);
          $this.prepend('<span class="arrow-collapse collapsed">');
          $this.find('.arrow-collapse').attr({
            'data-toggle': 'collapse',
            'data-target': '#collapseItem' + counter
          });
          $this.find('> ul').attr({
            'class': 'collapse',
            'id': 'collapseItem' + counter
          });
          counter++;
        });
      }, 1000);
      $('body').on('click', '.arrow-collapse', function (e) {
        var $this = $(this);

        if ($this.closest('li').find('.collapse').hasClass('show')) {
          $this.removeClass('active');
        } else {
          $this.addClass('active');
        }

        e.preventDefault();
      });
      $(window).resize(function () {
        var $this = $(this),
            w = $this.width();

        if (w > 768) {
          if ($('body').hasClass('offcanvas-menu')) {
            $('body').removeClass('offcanvas-menu');
          }
        }
      });
      $('body').on('click', '.js-menu-toggle', function (e) {
        var $this = $(this);
        e.preventDefault();

        if ($('body').hasClass('offcanvas-menu')) {
          $('body').removeClass('offcanvas-menu');
          $this.removeClass('active');
        } else {
          $('body').addClass('offcanvas-menu');
          $this.addClass('active');
        }
      }); // click outisde offcanvas

      $(document).mouseup(function (e) {
        var container = $(".site-mobile-menu");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ($('body').hasClass('offcanvas-menu')) {
            $('body').removeClass('offcanvas-menu');
          }
        }
      });
    };

    siteMenuClone();

    var sitePlusMinus = function sitePlusMinus() {
      $('.js-btn-minus').on('click', function (e) {
        e.preventDefault();

        if ($(this).closest('.input-group').find('.form-control').val() != 0) {
          $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
        } else {
          $(this).closest('.input-group').find('.form-control').val(parseInt(0));
        }
      });
      $('.js-btn-plus').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
      });
    }; // sitePlusMinus();


    var siteSliderRange = function siteSliderRange() {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function slide(event, ui) {
          $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
      });
      $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
    }; // siteSliderRange();
    // var siteCarousel = function () {
    // 	if ( $('.nonloop-block-13').length > 0 ) {
    // 		$('.nonloop-block-13').owlCarousel({
    // 	    center: false,
    // 	    items: 1,
    // 	    loop: true,
    // 			stagePadding: 0,
    // 	    margin: 0,
    // 	    autoplay: true,
    // 	    nav: true,
    // 			navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
    // 	    responsive:{
    //         600:{
    //         	margin: 0,
    //         	nav: true,
    //           items: 2
    //         },
    //         1000:{
    //         	margin: 0,
    //         	stagePadding: 0,
    //         	nav: true,
    //           items: 3
    //         },
    //         1200:{
    //         	margin: 0,
    //         	stagePadding: 0,
    //         	nav: true,
    //           items: 4
    //         }
    // 	    }
    // 		});
    // 	}
    //
    //
    // 	if ( $('.nonloop-block-14').length > 0 ) {
    // 		$('.nonloop-block-14').owlCarousel({
    // 	    center: false,
    // 	    items: 1,
    // 	    loop: true,
    // 			stagePadding: 0,
    // 	    margin: 0,
    // 	    autoplay: true,
    // 	    dots: false,
    // 	    nav: false,
    // 			navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
    // 	    responsive:{
    //         600:{
    //         	margin: 20,
    //         	nav: true,
    //           items: 2
    //         },
    //         1000:{
    //         	margin: 30,
    //         	stagePadding: 20,
    //         	nav: true,
    //           items: 2
    //         },
    //         1200:{
    //         	margin: 30,
    //         	stagePadding: 20,
    //         	nav: true,
    //           items: 3
    //         }
    // 	    }
    // 		});
    //
    // 		$('.customNextBtn').click(function() {
    // 		  $('.nonloop-block-14').trigger('next.owl.carousel');
    // 		})
    // 		$('.customPrevBtn').click(function() {
    // 		  $('.nonloop-block-14').trigger('prev.owl.carousel');
    // 		})
    // 	}
    //
    //
    //
    // 	$('.slide-one-item').owlCarousel({
    //     center: false,
    //     items: 1,
    //     loop: true,
    //     smartSpeed: 900,
    //     autoplayTimeout: 7000,
    // 		stagePadding: 0,
    //     margin: 0,
    //     autoplay: true,
    //     nav: true,
    //     navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">'],
    //   });
    //
    // 	$('.slide-one-item').on('translated.owl.carousel', function(event) {
    // 		console.log('translated');
    // 		$('.owl-item.active').find('.js-slide-text').addClass('active');
    // 	});
    // 	$('.slide-one-item').on('translate.owl.carousel', function(event) {
    // 		console.log('translate');
    // 		$('.owl-item.active').find('.js-slide-text').removeClass('active');
    // 	});
    //
    // 	$('.owl-item.active').find('.js-slide-text').addClass('active');
    //
    //
    // };
    // siteCarousel();
    // var siteStellar = function() {
    // 	$(window).stellar({
    //     responsive: false,
    //     parallaxBackgrounds: true,
    //     parallaxElements: true,
    //     horizontalScrolling: false,
    //     hideDistantElements: false,
    //     scrollProperty: 'scroll'
    //   });
    // };
    // siteStellar();
    // var siteCountDown = function() {
    //
    // 	$('#date-countdown').countdown('2020/10/10', function(event) {
    // 	  var $this = $(this).html(event.strftime(''
    // 	    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
    // 	    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
    // 	    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
    // 	    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
    // 	    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
    // 	});
    //
    // };
    // siteCountDown();


    var siteDatePicker = function siteDatePicker() {
      if ($('.datepicker').length > 0) {
        $('.datepicker').datepicker();
      }
    };

    siteDatePicker();

    var siteSticky = function siteSticky() {
      if ($('.js-sticky-header').length > 0) {
        var _$;

        (_$ = $(".js-sticky-header")) === null || _$ === void 0 ? void 0 : _$.sticky({
          topSpacing: 0
        });
      }
    };

    siteSticky(); // navigation

    var OnePageNavigation = function OnePageNavigation() {
      var navToggler = $('.site-menu-toggle');
      $("body").on("click", ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a", function (e) {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          'scrollTop': $(hash).offset().top
        }, 600, 'easeInOutCirc', function () {
          window.location.hash = hash;
        });
      });
    };

    OnePageNavigation();

    var siteScroll = function siteScroll() {
      $(window).scroll(function () {
        var st = $(this).scrollTop();

        if (st > 100) {
          $('.js-sticky-header').addClass('shrink');
        } else {
          $('.js-sticky-header').removeClass('shrink');
        }
      });
    };

    siteScroll();
  });
} catch (e) {} //
// const signUpButton = document.getElementById('signUp');
// const signInButton = document.getElementById('signIn');
// const container = document.getElementById('container');
//
// signUpButton.addEventListener('click', () => {
// 	container.classList.add("right-panel-active");
// });
//
// signInButton.addEventListener('click', () => {
// 	container.classList.remove("right-panel-active");
// });
//
// const mail_signin=document.getElementById('mailsignin');
// const pwd_signin=document.getElementById('pwdsignin');
// const form_signin=document.getElementById('signin_form');
// const error_signin_mail=document.getElementById('error_signin_mail');
// const error_signin_pwd=document.getElementById('error_signin_pwd');
//
// signin_form.addEventListener('submit',function(e){
//     if (!(mail_signin.value==='' || mail_signin.value==null)){
//       error_signin_mail.innerHTML="E-mail inputted!";
//       error_signin_mail.style.color = "green";
//       error_signin_mail.style.fontSize = "small";
//     }
//     if (!(pwd_signin.value==='' || pwd_signin.value==null)){
//       error_signin_pwd.innerHTML="Password inputted!";
//       error_signin_pwd.style.color = "green";
//       error_signin_pwd.style.fontSize = "small";
//     }
//
//     if (mail_signin.value==='' || mail_signin.value==null){
//       e.preventDefault();
//       error_signin_mail.innerHTML="You have to input an e-mail!";
//       error_signin_mail.style.color = "#ff0000";
//       error_signin_mail.style.fontSize = "small";
//     }
//     else if (pwd_signin.value==='' || pwd_signin.value==null){
//       e.preventDefault();
//       error_signin_pwd.innerHTML="You have to input a password!";
//       error_signin_pwd.style.color = "#ff0000";
//       error_signin_pwd.style.fontSize = "small";
//     }
//
// });
//
// const signup_form=document.getElementById('signup_form');
//
// const name_signup=document.getElementById('name_signup');
// const mail_signup=document.getElementById('mail_signup');
// const pwd1_signup=document.getElementById('pwd1_signup');
// const pwd2_signup=document.getElementById('pwd2_signup');
//
// const error_signup_name=document.getElementById('error_signup_name');
// const error_signup_email=document.getElementById('error_signup_email');
// const error_signup_pwd1=document.getElementById('error_signup_pwd1');
// const error_signup_pwd2=document.getElementById('error_signup_pwd2');
//
// signup_form.addEventListener('submit',function(e){
//     if (!(name_signup.value==='' || name_signup.value==null)){
//       error_signup_name.innerHTML="Name inputted!";
//       error_signup_name.style.color = "green";
//       error_signup_name.style.fontSize = "small";
//     }
//     if (!(mail_signup.value==='' || mail_signup.value==null)){
//       error_signup_email.innerHTML="E-mail inputted!";
//       error_signup_email.style.color = "green";
//       error_signup_email.style.fontSize = "small";
//     }
//     if (!(pwd1_signup.value==='' || pwd1_signup.value==null)){
//       error_signup_pwd1.innerHTML="Password inputted!";
//       error_signup_pwd1.style.color = "green";
//       error_signup_pwd1.style.fontSize = "small";
//     }
//     if (!(pwd2_signup.value==='' || pwd2_signup.value==null)){
//       error_signup_pwd2.innerHTML="Password inputted!";
//       error_signup_pwd2.style.color = "green";
//       error_signup_pwd2.style.fontSize = "small";
//     }
//
//     if (name_signup.value==='' || name_signup.value==null){
//       e.preventDefault();
//       error_signup_name.innerHTML="You have to input a name!";
//       error_signup_name.style.color = "#ff0000";
//       error_signup_name.style.fontSize = "small";
//     }
//     else if (mail_signup.value==='' || mail_signup.value==null){
//       e.preventDefault();
//       error_signup_email.innerHTML="You have to input an email!";
//       error_signup_email.style.color = "#ff0000";
//       error_signup_email.style.fontSize = "small";
//     }
//     else if (pwd1_signup.value==='' || pwd1_signup.value==null){
//       e.preventDefault();
//       error_signup_pwd1.innerHTML="You have to input a password!";
//       error_signup_pwd1.style.color = "#ff0000";
//       error_signup_pwd1.style.fontSize = "small";
//     }
//     else if (pwd2_signup.value==='' || pwd2_signup.value==null){
//       e.preventDefault();
//       error_signup_pwd2.innerHTML="You have to repeat the password!";
//       error_signup_pwd2.style.color = "#ff0000";
//       error_signup_pwd2.style.fontSize = "small";
//     }
//     else if (pwd1_signup.value !== pwd2_signup.value){
//       e.preventDefault();
//       error_signup_pwd2.innerHTML="Passwords don't match!";
//       error_signup_pwd2.style.color = "#ff0000";
//       error_signup_pwd2.style.fontSize = "small";
//     }
//
//
// });
//
// const contact_form=document.getElementById('contact_form');
//
// const contact_fullname=document.getElementById('contact_fullname');
// const contact_subject=document.getElementById('contact_subject');
// const contact_email=document.getElementById('contact_email');
// const contact_message=document.getElementById('contact_message');
//
// const error_contact_fullname=document.getElementById('error_contact_fullname');
// const error_contact_subject=document.getElementById('error_contact_subject');
// const error_contact_email=document.getElementById('error_contact_email');
// const error_contact_message=document.getElementById('error_contact_message');
//
// contact_form.addEventListener('submit',function(e){
//   if (!(contact_fullname.value==='' || contact_fullname.value==null)){
//     error_contact_fullname.innerHTML="Full Name inputted!";
//     error_contact_fullname.style.color = "green";
//     error_contact_fullname.style.fontSize = "small";
//   }
//   if (! (contact_subject.value==='' || contact_subject.value==null)){
//     error_contact_subject.innerHTML="Subject inputted!";
//     error_contact_subject.style.color = "green";
//     error_contact_subject.style.fontSize = "small";
//   }
//   if (! (contact_email.value==='' || contact_email.value==null)){
//     error_contact_email.innerHTML="E-mail inputted!";
//     error_contact_email.style.color = "green";
//     error_contact_email.style.fontSize = "small";
//   }
//   if (! (contact_message.value==='' || contact_message.value==null)){
//     error_contact_message.innerHTML="Message inputted!";
//     error_contact_message.style.color = "green";
//     error_contact_message.style.fontSize = "small";
//   }
//
//   if (contact_fullname.value==='' || contact_fullname.value==null){
//     e.preventDefault();
//     error_contact_fullname.innerHTML="You have to input your full name!";
//     error_contact_fullname.style.color = "#ff0000";
//     error_contact_fullname.style.fontSize = "small";
//   }
//   else if (contact_subject.value==='' || contact_subject.value==null){
//     e.preventDefault();
//     error_contact_subject.innerHTML="You have to input the subject!";
//     error_contact_subject.style.color = "#ff0000";
//     error_contact_subject.style.fontSize = "small";
//   }
//   else if (contact_email.value==='' || contact_email.value==null){
//     e.preventDefault();
//     error_contact_email.innerHTML="You have to input an e-mail!";
//     error_contact_email.style.color = "#ff0000";
//     error_contact_email.style.fontSize = "small";
//   }
//   else if (contact_message.value==='' || contact_message.value==null){
//     e.preventDefault();
//     error_contact_message.innerHTML="You have to input your message!";
//     error_contact_message.style.color = "#ff0000";
//     error_contact_message.style.fontSize = "small";
//   }
//
//
//
// });

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/functions.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;