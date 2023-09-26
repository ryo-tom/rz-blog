'use strict';

function handleButtonClick(e) {
  e.preventDefault();

  const formId = e.target.getAttribute('data-form-id');
  const form = document.getElementById(formId);

  if (form) {
      form.submit();
  }
}

const updateButtons = document.querySelectorAll('.btn-update');
updateButtons.forEach(button => button.addEventListener('click', handleButtonClick));

const storeButtons = document.querySelectorAll('.btn-store');
storeButtons.forEach(button => button.addEventListener('click', handleButtonClick));
