"use strict";

const select = (el, all = false) => {
    el = el.trim()
    if (all) {
        return [...document.querySelectorAll(el)]
    } else {
        return document.querySelector(el)
    }
}

const removePreloader = () => preloader.remove();
let preloader = select("#preloader");
if (preloader) {
    window.addEventListener("load", () => setTimeout(removePreloader, 400));
}

// cookies alert
if (localStorage.getItem('cookie_visibility') && localStorage.getItem('cookie_visibility') == 'hide') {
    document.getElementById('cookie_content').style.setProperty('display', 'none', 'important');
} else {
    document.getElementById('cookie_content').style.setProperty('display', 'block', 'important');
}

function hideCookie() {
    localStorage.setItem('cookie_visibility', 'hide');
    document.getElementById('cookie_content').style.setProperty('display', 'none', 'important');
}
