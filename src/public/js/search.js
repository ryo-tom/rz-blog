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

/* -----------------------
Ajax Serach
----------------------- */
const searchInput   = document.getElementById("searchInput");
const searchResults = document.querySelector(".search-results");

searchInput.addEventListener("change", function() {
    const searchQuery = this.value;

    const url = "/search?query=" + encodeURIComponent(searchQuery);

    // 既存の検索結果をクリア
    searchResults.innerHTML = '';

    fetch(url)
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok, status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
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
        console.error('There was a problem with the fetch operation:', error);
        const errorMessage = document.createElement("li");
        errorMessage.classList.add("search-result-item");
        errorMessage.textContent = "検索中にエラーが発生しました。";
        searchResults.appendChild(errorMessage);
    });
});
