'use strict';

/**
 * 指定したidのセレクトボックが変更された時
 *
 * @param {string} targetIdName -セレクトボックスのID
 */
function submitForm(targetIdName) {
    document.getElementById(targetIdName).addEventListener('change', () => {
        performFilter();
    });
}

submitForm('categorySelector');
submitForm('tagOptionSelector');

/** 複数のタグチェックボックス */
const checkboxes = document.getElementsByName('tag_slugs[]');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const label = checkbox.closest('.tag-label');
        checkbox.checked ? label.classList.add('tag-checked') : label.classList.remove('tag-checked');

        performFilter();
    });
});

const mobileFilterTrigger = document.getElementById('mobileFilterTrigger');
const mobileFilterBlock = document.getElementById('mobileFilterBlock');
const mobileFilterBack = document.getElementById('mobileFilterBack');

mobileFilterTrigger.addEventListener('click', () => {
  mobileFilterBlock.classList.toggle('show');
  document.body.classList.toggle('filter-open')
});

mobileFilterBack.addEventListener('click', () => {
  mobileFilterBlock.classList.toggle('show');
  document.body.classList.toggle('filter-open')
});

/* -----------------------
Ajax
----------------------- */
/**
 * Fetches and renders posts based on user's filter criteria.
 *
 * 1. Gets the user-selected values.
 * 2. Constructs the URL with the selected values.
 * 3. Fetches the posts using the constructed URL.
 * 4. Renders the posts if any data is returned.
 */
function performFilter() {
  const selections = getSelectedValues();
  const url = buildFilterURL(ajaxFilterRoute, selections);

  fetchPosts(url).then(data => {
      if (data) renderPosts(data);
  });
}

/**
 * Retrieves the selected filter values from the user interface.
 *
 * @returns {Object} - An object containing values selected by the user: category, tag option, and tag slugs.
 */
function getSelectedValues() {
  const selectedCategory  = document.getElementById("categorySelector").value;
  const selectedTagOption = document.getElementById("tagOptionSelector").value;
  const selectedTagSlugs  = Array.from(document.querySelectorAll('input[name="tag_slugs[]"]:checked')).map(e => e.value);

  return {
      category: selectedCategory,
      tagOption: selectedTagOption,
      tagSlugs: selectedTagSlugs
  };
}

/**
 * Constructs a URL based on the given base route and user-selected filter values.
 *
 * @param {string} baseRoute - The base endpoint for the filter request.
 * @param {Object} selections - An object containing the user's filter criteria.
 * @param {string} selections.category - The selected category slug.
 * @param {Array<string>} selections.tagSlugs - An array of selected tag slugs.
 * @param {string} selections.tagOption - The selected tag option value.
 *
 * @returns {string} - The fully constructed URL for fetching filtered results.
 */
function buildFilterURL(baseRoute, selections) {
  const params = new URLSearchParams();
  params.append('category_slug', selections.category);
  selections.tagSlugs.forEach(tag => params.append('tag_slugs[]', tag));
  params.append('tag_option', selections.tagOption);

  return `${baseRoute}?${params.toString()}`;
}

/**
 * Renders post data on the page by clearing the existing posts list,
 * updating the filtered posts count, and appending each post to the posts list.
 *
 * @param {Object} data - The data containing posts and filtered post count.
 */
function renderPosts(data) {
  console.log('Received data:', data);
  clearPostsList();

  const filterBody = document.querySelector('.filter-body');
  if (filterBody) {
      updateOrInsertFilterResult(data.filteredPostCount);
  }

  const postsList = document.querySelector('.posts-list');
  data.posts.forEach((post, index) => {
      const postElement = createPostElement(post, index, data.posts.length);
      postsList.appendChild(postElement);
  });
}

/**
 * Updates the filter result count on the page, or inserts a new count if it doesn't exist.
 *
 * @param {number} count - The number of posts that match the filter.
 */
function updateOrInsertFilterResult(count) {
  const filterBody = document.querySelector('.filter-body');
  const existingFilterResult = filterBody.querySelector(".filter-result");

  if (existingFilterResult) {
      existingFilterResult.textContent = `${count} 件`;
      return;
  }

  const filterResultElement = createFilterResultElement(count);
  filterBody.insertAdjacentElement('beforeend', filterResultElement);
}

/**
 * Creates a new DOM element to display the filtered post count.
 *
 * @param {number} count - The number of posts that match the filter.
 * @returns {HTMLElement} - The new DOM element.
 */
function createFilterResultElement(count) {
  const resultDiv = document.createElement('div');
  resultDiv.classList.add('filter-result');
  resultDiv.textContent = `${count} 件`;
  return resultDiv;
}

/**
 * Formats a date string into YYYY-MM-DD format.
 *
 * @param {string} dateString - The input date string.
 * @returns {string} - The formatted date string.
 */
function formatDateToYMD(dateString) {
  const date  = new Date(dateString);
  return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
}

/**
 * Fetches posts data from the given URL.
 *
 * @param {string} url - The URL to fetch posts from.
 * @returns {Promise<Object>|undefined} - A promise that resolves with the fetched data, or undefined if an error occurred.
 */
function fetchPosts(url) {
  return fetch(url)
      .then(response => {
          if (!response.ok) {
              throw new Error(`Network response was not ok, status: ${response.status}`);
          }
          return response.json();
      })
      .catch(error => {
          insertErrorElement('検索エラーが発生しました... ;(');
          console.error('There was a problem with the fetch operation:', error);
      });
}

function appendTag(tagsList, tagName) {
  const tagItem = document.createElement('div');
  tagItem.classList.add('tag-item');

  const tagLabel = document.createElement('span');
  tagLabel.classList.add('tag-label', 'ignore-pointer');
  tagLabel.textContent = tagName;

  tagItem.appendChild(tagLabel);
  tagsList.appendChild(tagItem);
}

function createPostElement(post, index, totalPosts) {
  const postItem = document.createElement('div');
  postItem.classList.add('post-item');

  const postLink = document.createElement('a');
  postLink.classList.add('post-item-link');
  postLink.href = `/posts/${post.slug}`;

  const postPublishedAt = document.createElement('div');
  postPublishedAt.classList.add('post-published-at');
  postPublishedAt.textContent = formatDateToYMD(post.published_at);

  const postTitle = document.createElement('h2');
  postTitle.classList.add('post-title');
  postTitle.textContent = post.title;

  const tagsList = document.createElement('div');
  tagsList.classList.add('tags-list');
  post.tags && post.tags.forEach(tag => appendTag(tagsList, tag.name));

  const rowNum = document.createElement('div');
  rowNum.classList.add('post-row-num');
  rowNum.textContent = totalPosts - index;

  postLink.appendChild(postPublishedAt);
  postLink.appendChild(postTitle);
  postLink.appendChild(tagsList);
  postLink.appendChild(rowNum);

  postItem.appendChild(postLink);

  return postItem;
}

function clearPostsList() {
  const postsList = document.querySelector('.posts-list');
  postsList.innerHTML = '';
}

function createErrorElement(errorMessage) {
  const errorElement = document.createElement('div');
  errorElement.classList.add('filter-invalid-feedback');
  errorElement.textContent = errorMessage;
  return errorElement;
}

function insertErrorElement(errorMessage) {
  const errorElement = createErrorElement(errorMessage);

  const filterBlock = document.getElementById('filterBlock');
  const filterBody = filterBlock.querySelector('.filter-body');

  filterBody.insertAdjacentElement('beforebegin', errorElement);
}
