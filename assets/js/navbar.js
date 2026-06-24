document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.querySelector(".navbar");
    const hamburger = document.getElementById("hamburger-toggle");
    const navLinks = document.getElementById("nav-links");
    const links = document.querySelectorAll(".nav-item-link");
    const indicator = document.getElementById("nav-indicator");

    let activeLink = null;

    // scroll effect
    window.addEventListener("scroll", () => {
        navbar.classList.toggle("scrolled", window.scrollY > 40);
    });

    // mobile menu
    hamburger?.addEventListener("click", (e) => {
        e.stopPropagation();
        hamburger.classList.toggle("active");
        navLinks.classList.toggle("open");
    });

    document.addEventListener("click", (e) => {
        if (!navLinks.contains(e.target) && !hamburger.contains(e.target)) {
            hamburger.classList.remove("active");
            navLinks.classList.remove("open");
        }
    });

    function moveIndicator(el) {
        if (!el || !indicator) return;

        const rect = el.getBoundingClientRect();
        const parentRect = el.parentElement.getBoundingClientRect();

        indicator.style.width = rect.width + "px";
        indicator.style.left = (rect.left - parentRect.left) + "px";
        indicator.style.opacity = "1";
    }

    // detect active page
    let page = window.location.pathname.split("/").pop() || "dashboard.php";

    links.forEach(link => {
        if (link.getAttribute("href") === page) {
            link.classList.add("active");
            activeLink = link;
        }

        link.addEventListener("mouseenter", () => moveIndicator(link));
        link.addEventListener("mouseleave", () => moveIndicator(activeLink));
    });

    window.addEventListener("load", () => moveIndicator(activeLink));

    window.addEventListener("resize", () => {
        if (window.innerWidth < 768) {
            indicator.style.opacity = "0";
        } else {
            moveIndicator(activeLink);
        }
    });

});
