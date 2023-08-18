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
const mobileModalClose   = document.getElementById('mobileModalClose');

searchModalTrigger.addEventListener('click', () => {
  toggleSearchModal();
});
searchModal.addEventListener('click', e => {
  const target = e.target;
  if (target.classList.contains('layout-modal') && !target.classList.contains('modal-container')) {
      toggleSearchModal();
  }
});
mobileModalClose.addEventListener('click', () => {
  toggleSearchModal();
});
