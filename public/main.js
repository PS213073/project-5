window.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition > 0) {
        document.querySelector("header").classList.add('header-active');
    } else {
        document.querySelector("header").classList.remove('header-active');
    }
});
