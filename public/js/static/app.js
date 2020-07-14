window.onscroll = () => {
    const y = scrollY;
    if (y >= 800) {
        document.querySelectorAll('.about-img').forEach((element, index) => {
            setTimeout(() => {
                element.childNodes[1].classList.add('flash');
            }, 900 * (index + 1));
        })
    }
    if (y >= 3285) {
        document.querySelectorAll('.label-blog').forEach((element, index) => {
            setTimeout(() => {
                element.childNodes[1].classList.add('flash');
            }, 500 * (index + 1));
        });
    }
}
