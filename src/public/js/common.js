'use strict';

// header mobile navigation
const navBtn = document.getElementById('navBtn');
navBtn.addEventListener('click', () => {
    document.getElementById('mobileNav').classList.toggle('collapse');
    navBtn.classList.toggle('close');
});
