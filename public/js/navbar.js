const navbarElement = document.getElementById("navbar");
const headerElement = document.getElementById("header");

window.onscroll = () => {
    let headerHeight = headerElement.clientHeight;

    if (window.scrollY + navbarElement.clientHeight >= headerHeight) {
        navbarElement.classList.add("navbar-colored");
    } else {
        navbarElement.classList.remove("navbar-colored");
    }
};

console.log("hello");
