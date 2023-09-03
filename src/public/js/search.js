'use strict';

const htmlBody            = document.body;
const searchModalTrigger  = document.getElementById('searchModalTrigger');
const searchModal         = document.getElementById('searchModal');
const mobileModalClose    = document.getElementById('mobileModalClose');

/**
 * Toggle search modal window and body class
 */
function toggleSearchModal() {
  searchModal.classList.toggle('disable');
  htmlBody.classList.toggle('modal-open');
}

/**
 * Check if the event target should close the modal
 * @param {EventTarget} target - The event target
 * @returns {boolean} - Whether the modal should be closed
 */
function shouldCloseModal(target) {
    const isModalBackground = target.classList.contains('layout-modal');
    const isNotModalContent = !target.classList.contains('modal-container');
    
    return isModalBackground && isNotModalContent;
}

// Event Listeners
searchModalTrigger.addEventListener('click', toggleSearchModal);
searchModal.addEventListener('click', (e) => {
  if (shouldCloseModal(e.target)) {
    toggleSearchModal();
  }
});
mobileModalClose.addEventListener('click', toggleSearchModal);
