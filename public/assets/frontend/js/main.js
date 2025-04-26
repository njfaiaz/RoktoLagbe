/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
var settingsmenu = document.querySelector(".setting-menu");
var darkBtn = document.getElementById("dark-btn");

function settingsMenuToggle() {
    settingsmenu.classList.toggle("setting-menu-height");
}
darkBtn.onclick = function () {
    darkBtn.classList.toggle("dark-btn-on");
    document.body.classList.toggle("dark-theme");

    if (localStorage.getItem("theme") == "light") {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
};

if (localStorage.getItem("theme") == "light") {
    darkBtn.classList.remove("dark-btn-on");
    document.body.classList.remove("dark-theme");
} else if (localStorage.getItem("theme") == "dark") {
    darkBtn.classList.add("dark-btn-on");
    document.body.classList.add("dark-theme");
} else {
    localStorage.setItem("theme", "light");
}

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/

const sections = document.querySelectorAll("section[id]");

function scrollActive() {
    const scrollY = window.pageYOffset;

    sections.forEach((current) => {
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 50,
            sectionId = current.getAttribute("id");

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document
                .querySelector(".nav__menu a[href*=" + sectionId + "]")
                .classList.add("active-link");
        } else {
            document
                .querySelector(".nav__menu a[href*=" + sectionId + "]")
                .classList.remove("active-link");
        }
    });
}
window.addEventListener("scroll", scrollActive);

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader() {
    const header = document.getElementById("header");
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if (this.scrollY >= 80) header.classList.add("scroll-header");
    else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

/*=============== Timer CountDown Added ===============*/

$(document).ready(function () {
    $(".timer").each(function () {
        var $this = $(this);
        var endTime = $this.data("endtime");
        var isLoggedInUser = $this.data("is-logged-in-user");

        if (!endTime) {
            console.error("Invalid end time for timer element.");
            return;
        }

        var finalTime = new Date(endTime).getTime();

        var timer = setInterval(function () {
            var now = new Date().getTime();
            var distance = finalTime - now;

            if (distance <= 0) {
                clearInterval(timer);

                if (isLoggedInUser === "yes") {
                    $this.html(
                        '<div class="cardbtn"><button class="btn view" id="nextDonate">Next Donate</button></div>'
                    );
                    $this.find("#nextDonate").on("click", function () {
                        window.location.href = "/next-donate";
                    });
                } else {
                    $this.html(
                        "<p><span>00</span><br>Day</p>" +
                            "<p><span>00</span><br>Hour</p>" +
                            "<p><span>00</span><br>Minute</p>" +
                            "<p><span>00</span><br>Second</p>"
                    );
                }
            } else {
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor(
                    (distance % (1000 * 60 * 60)) / (1000 * 60)
                );
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $this.html(
                    "<p><span>" +
                        String(days).padStart(2, "0") +
                        "</span><br>Day</p>" +
                        "<p><span>" +
                        String(hours).padStart(2, "0") +
                        "</span><br>Hour</p>" +
                        "<p><span>" +
                        String(minutes).padStart(2, "0") +
                        "</span><br>Minute</p>" +
                        "<p><span>" +
                        String(seconds).padStart(2, "0") +
                        "</span><br>Second</p>"
                );
            }
        }, 1000);
    });
});
