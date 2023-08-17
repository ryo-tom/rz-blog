'use strict';

window.onload = () => {
    let toc = "";
    let level = 0;

    const postBodyDiv = document.getElementById("postContent");

    postBodyDiv.innerHTML = postBodyDiv.innerHTML.replace(
        /<h([\d])>([^<]+)<\/h([\d])>/gi,
        (str, openLevel, titleText, closeLevel) => {
            if (openLevel !== closeLevel) {
                return str;
            }

            if (openLevel > level) {
                toc += (new Array(openLevel - level + 1)).join("<ul>");
            } else if (openLevel < level) {
                toc += (new Array(level - openLevel + 1)).join("</ul>");
            }

            level = parseInt(openLevel);

            const anchor = titleText.replace(/ /g, "_");
            toc += `<li><a class='toc-level-${openLevel}' href='#${anchor}'>${titleText}</a></li>`;

            return `<h${openLevel}><a name='${anchor}'>${titleText}</a></h${openLevel}>`;
        }
    );

    if (level) {
        toc += (new Array(level + 1)).join("</ul>");
    }

    document.getElementById("tableOfContent").innerHTML += toc;
};
