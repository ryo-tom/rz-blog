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
searchModalTrigger.addEventListener('click', () => {
  toggleSearchModal();
  searchInput.focus();
});
searchModal.addEventListener('click', (e) => {
  if (shouldCloseModal(e.target)) {
    toggleSearchModal();
  }
});
mobileModalClose.addEventListener('click', toggleSearchModal);

// Hotkey
document.addEventListener('keydown', (e) =>  {
  if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
    toggleSearchModal();
    searchInput.focus();
  }
});

/* -----------------------
Ajax Serach
----------------------- */
const searchForm = document.getElementById("searchForm");
searchForm.addEventListener("submit", e => e.preventDefault());

/**
 * Performs a search operation using the user's input and search scope preferences.
 * Fetches the search results from the server, and updates the DOM with the results.
 *
 * @throws Will throw an error if the network request fails.
 */
function performSearch() {
  const searchQuery  = searchInput.value.trim();
  const radioChecked = document.querySelector('input[name="searchScope"]:checked');
  const searchScope  = radioChecked ? radioChecked.value : 'error';

  const url = `/search?query=${encodeURIComponent(searchQuery)}&scope=${encodeURIComponent(searchScope)}`;

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Network response was not ok, status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      searchResults.innerHTML = '';

      if (!searchQuery) {
        const inputKeywordMessage = document.createElement("li");
        inputKeywordMessage.textContent = "検索キーワードを入力してください";
        searchResults.appendChild(inputKeywordMessage);
        return;
      }

      if (data.posts.length === 0) {
        const noResultsMessage = document.createElement("li");
        noResultsMessage.textContent = `"${searchQuery}" の検索結果はありません`;
        searchResults.appendChild(noResultsMessage);
        return;
      }

      data.posts.forEach(post => {
        const postUrl = `/posts/${post.slug}`;

        const linkElement = document.createElement("a");
        linkElement.setAttribute("href", postUrl);
        linkElement.classList.add("search-result-link");

        const listItemElement = document.createElement("li");
        listItemElement.classList.add("search-result-item");
        listItemElement.textContent = post.title;

        linkElement.appendChild(listItemElement);
        searchResults.appendChild(linkElement);
      });
    })
    .catch(error => {
      searchResults.innerHTML = '';
      console.error('There was a problem with the fetch operation:', error);
      const errorMessage = document.createElement("li");
      errorMessage.classList.add("search-result-item");
      errorMessage.textContent = "検索中にエラーが発生しました。";
      searchResults.appendChild(errorMessage);
    });
}

const searchInput   = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");
const scopeRadios   = document.querySelectorAll('input[name="searchScope"]');

// Event Listeners
searchInput.addEventListener("input", performSearch);

scopeRadios.forEach(radio => {
  radio.addEventListener("change", performSearch);
});
