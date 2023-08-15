'use strict';

/** 検索条件フォーム */
const filterForm = document.getElementById('filterForm');

/**
 * 指定したidのセレクトボックが変更された時フォームを送信する
 *
 * @param {string} targetIdName -セレクトボックスのID
 */
function submitForm(targetIdName) {
    document.getElementById(targetIdName).addEventListener('change', () => {
        filterForm.submit();
    });
}

submitForm('categorySelector');
submitForm('tagOptionSelector');

/** 複数のタグチェックボックス */
const checkboxes = document.getElementsByName('tag_slugs[]');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        filterForm.submit();
    });
});

