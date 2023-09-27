'use strict';

function handleButtonClick(e) {
  e.preventDefault();

  const formId = e.target.getAttribute('data-form-id');
  const form = document.getElementById(formId);

  if (form) {
      form.submit();
  }
}

function handleDeleteButtonClick(e) {
  e.preventDefault();

  const isConfirmed = window.confirm('削除しますか？');

  if (isConfirmed) {
      const formId = e.target.getAttribute('data-form-id');
      const form = document.getElementById(formId);

      if (form) {
          form.submit();
      }
  }
}

const updateButtons = document.querySelectorAll('.btn-update');
updateButtons.forEach(button => button.addEventListener('click', handleButtonClick));

const storeButtons = document.querySelectorAll('.btn-store');
storeButtons.forEach(button => button.addEventListener('click', handleButtonClick));

const deleteButtons = document.querySelectorAll('.btn-delete');
deleteButtons.forEach(button => button.addEventListener('click', handleDeleteButtonClick));
