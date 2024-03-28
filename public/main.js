// Header Scroll
window.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition > 0) {
        document.querySelector("header").classList.add('header-active');
    } else {
        document.querySelector("header").classList.remove('header-active');
    }
});
// End header scroll


// POPUP MODAL

$(document).ready(function () {
    var $popupViews = $('.popup-view');
    var $popupBtns = $('.popup-btn');
    var $closeBtns = $('.close-btn');

    $($popupBtns).on('click', function () {
        $($popupViews).toggleClass('active');
    });

    $closeBtns.on("click", function () {
        $popupViews.removeClass('active');
    });
});

$('[data-toggle="modal"]').on('click', function (e) {
    var modalImage = $(this).find('[data-content="image"]').attr('src');
    var modalText = $(this).find('[data-content="name"]').text();
    var modalDescription = $(this).find('[data-content="description"]').text();
    var modalCode = $(this).find('[data-content="price"]').text();
    $('.popup-card .image').attr('src', modalImage);
    $('.popup-card .name').text(modalText);
    $('.popup-card .price').text(modalCode);
    $('.popup-card .description').text(modalDescription);
    console.log(modalText + modalImage);
});

// End POPUP MODAL

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader() {
    const header = document.getElementById('header')
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if (this.scrollY >= 80) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

/*=============== QUESTIONS ACCORDION ===============*/
const accordionItems = document.querySelectorAll('.questions__item');

accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.questions__header');

    accordionHeader.addEventListener('click', () => {
        const openItem = document.querySelector('.accordion-open')
        toggleItem(item)

        if (openItem && openItem !== item) {
            toggleItem(openItem)
        }
    })
})

const toggleItem = (item) => {
    const accordionContent = item.querySelector('.questions__content');

    if (item.classList.contains('accordion-open')) {
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    }
    else {
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

function scrollActive() {
    const scrollY = window.scrollY

    sections.forEach(current => {
        const sectionHeight = current.offsetHeight
        sectionTop = current.offsetTop - 58;
        sectionId = current.getAttribute('id')

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        } else {
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*=============== SHOW SCROLL UP ===============*/
// function scrollUp() {
//     const scrollUp = document.getElementById('scroll-up');
//     // When the scroll is higher than 200 viewport height, add the show-scroll class to the a tag with the scroll-up class
//     this.scrollY >= 200 ? scrollUp.classList.add('show-scroll') : scrollUp.classList.remove('show-scroll')
// }
// window.addEventListener('scroll', scrollUp)

/*=============== DARK LIGHT THEME ===============*/
// const themeButton = document.getElementById('theme-button')
// const darkTheme = 'dark-theme'
// const iconTheme = 'ri-sun-line'

// // Previously selected topic (if user selected)
// const selectedTheme = localStorage.getItem('selected-theme')
// const selectedIcon = localStorage.getItem('selected-icon')

// // We obtain the current theme that the interface has by validating the dark-theme class
// const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
// const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-line' : 'ri-sun-line'

// // We validate if the user previously chose a topic
// if (selectedTheme) {
//     // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
//     document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
//     themeButton.classList[selectedIcon === 'ri-moon-line' ? 'add' : 'remove'](iconTheme)
// }

// Activate / deactivate the theme manually with the button
// themeButton.addEventListener('click', () => {
//     // Add or remove the dark / icon theme
//     document.body.classList.toggle(darkTheme)
//     themeButton.classList.toggle(iconTheme)
//     // We save the theme and the current icon that the user chose
//     localStorage.setItem('selected-theme', getCurrentTheme())
//     localStorage.setItem('selected-icon', getCurrentIcon())
// })

/*=============== SCROLL REVEAL ANIMATION ===============*/
// const sr = ScrollReveal({
//     origin: 'top',
//     distance: '60px',
//     duration: 2500,
//     delay: 400
//     // reset : true
// })

// sr.reveal('.home__data')
// sr.reveal('.home__img', { delay: 500 })
// sr.reveal('.home__social', { delay: 600 })
// sr.reveal('.about__img, .contact__box', { origin: 'left' })
// sr.reveal('.about__data, .contact__form', { origin: 'left' })
// sr.reveal('.steps__card, .product__card, .questions__group, .footer', { interval: 100 })
