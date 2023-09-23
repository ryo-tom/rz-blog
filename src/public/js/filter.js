'use strict';

function addFilterOnChange(name, device) {
  const element = document.querySelector(`select[name="${name}"][data-device="${device}"]`)
  element.addEventListener('change', () => {
    performFilter(device);
  });
}

/**
* Toggles the visibility of the mobile filter and modifies the body class accordingly.
*/
function toggleMobileFilter() {
  const mobileFilterBlock = document.getElementById('mobileFilterBlock');
  mobileFilterBlock.classList.toggle('show');
  document.body.classList.toggle('filter-open');
}

/**
 * Initialize event listeners for filtering based on the given device type.
 *
 * @param {string} device - Device type ("pc" or "mobile").
 */
function initFilterEventListeners(device) {
  addFilterOnChange('category', device);
  addFilterOnChange('tag_option', device);

  const checkboxes = document.querySelectorAll(`input[name="tag_slugs[]"][data-device="${device}"]`);
  checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
          const label = checkbox.closest('.tag-label');
          checkbox.checked ? label.classList.add('tag-checked') : label.classList.remove('tag-checked');
          performFilter(device);
      });
  });

  document.getElementById('mobileFilterTrigger').addEventListener('click', toggleMobileFilter);
  document.getElementById('mobileFilterBack').addEventListener('click', toggleMobileFilter);
}

// Initialize the filter event listeners.
initFilterEventListeners('pc');
initFilterEventListeners('mobile');

/* -----------------------
Filter
----------------------- */
function performFilter(device) {
  const selections = getSelectedValues(device);
  const url = buildFilterURL(ajaxFilterRoute, selections);

  switch (device) {
    case 'pc':
      document.getElementById('filterForm').submit();
      break;
    case 'mobile':
      fetchPosts(url).then(data => {
        if (!data) { return; }
        displayFilterCount(data);
      });
      break;
    default:
      console.error('Unknown device type:', device);
  }

}

/**
 * Retrieves the selected filter values from the user interface for a specified device type.
 *
 * @param {string} [device="pc"] - The type of the device ("pc" or "mobile") from which to retrieve the selected values.
 * @returns {Object} - An object containing values selected by the user: category, tag option, and tag slugs.
 */
function getSelectedValues(device = "pc") {
  const selectedCategory  = document.querySelector(`select[name="category"][data-device="${device}"]`).value;
  const selectedTagOption = document.querySelector(`select[name="tag_option"][data-device="${device}"]`).value;
  const selectedTagSlugs  = Array.from(document.querySelectorAll(`input[name="tag_slugs[]"][data-device="${device}"]:checked`)).map(e => e.value);

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
  params.append('category', selections.category);
  selections.tagSlugs.forEach(tag => params.append('tag_slugs[]', tag));
  params.append('tag_option', selections.tagOption);

  return `${baseRoute}?${params.toString()}`;
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
          console.error('There was a problem with the fetch operation:', error);
      });
}

/* -----------------------
Mobile Filter
----------------------- */
function displayFilterCount(data) {
  const filterCount = document.getElementById('filterCount');
  filterCount.textContent = data.filteredPostCount;
}

document.getElementById('mobileFilterClearTrigger').addEventListener('click', () => {
  resetSelect('mobileCategorySelector');
  resetSelect('mobileTagOptionSelector');
  resetCheckboxes('tag_slugs[]', 'mobile');
  performFilter('mobile');
});

function resetSelect(id) {
  const select = document.getElementById(id);
  select.selectedIndex = 0;
}

function resetCheckboxes(name, device) {
  const checkboxes = document.querySelectorAll(`input[name="${name}"][data-device="${device}"]`);
  checkboxes.forEach(checkbox => {
    checkbox.checked = false;
    updateLabelClass(checkbox);
  });
}

function updateLabelClass(checkbox) {
  const label = checkbox.closest('.tag-label');
  checkbox.checked ? label.classList.add('tag-checked') : label.classList.remove('tag-checked');
}
