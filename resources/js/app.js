require('./bootstrap');

const Alpine = require('alpinejs').default;

window.Alpine = Alpine;

console.log("alpinejs : ", Alpine);

document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    Alpine.start();
});
