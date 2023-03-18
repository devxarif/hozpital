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
