const nav_template = document.querySelector('#nav-template');
const clone = nav_template.content.cloneNode(true);

const sections = document.querySelectorAll(".nav-elements");

sections.forEach(section => {
    section.appendChild(clone.cloneNode(true));
});


function toggle() {
    const mobile_menu = document.querySelector('.mobile-menu');
    if (mobile_menu.style.display === "flex") {
        mobile_menu.style.display = "none";
    }
    else {
        mobile_menu.style.display = "flex";
    }
}