document.addEventListener("DOMContentLoaded", () => {

    /* ==========================================
       БУРГЕР-МЕНЮ
    ========================================== */

    const burger = document.querySelector(".burger");
    const menu = document.querySelector(".menu");

    if (burger && menu) {

        burger.addEventListener("click", () => {

            burger.classList.toggle("active");
            menu.classList.toggle("active");

        });

        document.querySelectorAll(".menu a").forEach(link => {

            link.addEventListener("click", () => {

                burger.classList.remove("active");
                menu.classList.remove("active");

            });

        });

    }

    /* ==========================================
       SWIPER
    ========================================== */

    new Swiper(".achievementsSwiper", {

        effect: "coverflow",

        grabCursor: true,

        centeredSlides: true,

        slidesPerView: "auto",

        loop: true,

        speed: 700,

        autoplay: {

            delay: 3500,

            disableOnInteraction: false,

        },

        coverflowEffect: {

            rotate: 0,

            stretch: 0,

            depth: 220,

            modifier: 1,

            scale: 0.85,

            slideShadows: false,

        },

        pagination: {

            el: ".swiper-pagination",

            clickable: true,

        },

        navigation: {

            nextEl: ".swiper-button-next",

            prevEl: ".swiper-button-prev",

        },

    });

    /* ==========================================
       ПЛАВНАЯ ПРОКРУТКА
    ========================================== */

document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function(e){

        const href = this.getAttribute("href");

        if(href === "#") return;

        const target = document.querySelector(href);

        if(target){

            e.preventDefault();

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});
    /* ==========================================
       ШАПКА ПРИ ПРОКРУТКЕ
    ========================================== */

    const header = document.querySelector(".header");

    window.addEventListener("scroll",()=>{

        if(window.scrollY > 60){

            header.classList.add("scrolled");

        }else{

            header.classList.remove("scrolled");

        }

    });

    /* ==========================================
       ПОЯВЛЕНИЕ БЛОКОВ
    ========================================== */

    const observer = new IntersectionObserver((entries)=>{

        entries.forEach(entry=>{

            if(entry.isIntersecting){

                entry.target.classList.add("show");

            }

        });

    },{

        threshold:0.15

    });

    document.querySelectorAll(".section").forEach(section=>{

        observer.observe(section);

    });

});