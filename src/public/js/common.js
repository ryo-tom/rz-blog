'use strict';

// header mobile navigation
const navBtn = document.getElementById('navBtn');
navBtn.addEventListener('click', () => {
    document.getElementById('mobileNav').classList.toggle('collapse');
    navBtn.classList.toggle('close');
});

/*
---------------------------------------
| Toggle search modal window
---------------------------------------
*/
function toggleSearchModal() {
  searchModal.classList.toggle('disable');
  htmlBody.classList.toggle('modal-open');
}

const htmlBody           = document.body;
const searchModalTrigger = document.getElementById('searchModalTrigger');
const searchModal        = document.getElementById('searchModal');
const searchClose        = document.getElementById('searchClose');

searchModalTrigger.addEventListener('click', () => {
  toggleSearchModal();
});
searchModal.addEventListener('click', e => {
  const target = e.target;
  if (target.classList.contains('modal') && !target.classList.contains('modal-container')) {
      toggleSearchModal();
  }
});
searchClose.addEventListener('click', () => {
  toggleSearchModal();
});
