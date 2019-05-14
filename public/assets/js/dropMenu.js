var el_sub_menu = document.getElementById('interests');
    el_sub_menu.addEventListener('click', showSub, false);
    el_sub_menu.addEventListener('mouseleave', hideSub, false);

function showSub() {
        this.children[1].style.height = "auto";
        this.children[1].style.opacity = "1";
        this.children[1].style.overflow = "visible";
}

function hideSub() {
        this.children[1].style.height = "0";
        this.children[1].style.opacity = "0";
        this.children[1].style.overflow = "hidden";
}