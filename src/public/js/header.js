'use strict';

/*
---------------------------------------
| Toggle header mobile navigation
---------------------------------------
*/
const mobileNavTrigger = document.getElementById('mobileNavTrigger');
mobileNavTrigger.addEventListener('click', () => {
    document.getElementById('mobileNav').classList.toggle('collapse');
    mobileNavTrigger.classList.toggle('close');
});

