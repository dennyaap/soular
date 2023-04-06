const paginationContainer = document.getElementById("pagination");
const pageBtnPrev = document.getElementById("page-btn__prev");
const pageBtnNext = document.getElementById("page-btn__next");

let currentPage = 1;
let limit = 3;

let countPages = 1;

async function calcPages(countAllProducts, limit) {
    return Math.ceil(countAllProducts / limit);
}

function createPagination(currentPage, countPages) {
    paginationContainer.innerHTML = "";

    if (!countPages) {
        countPages = 1;
    }

    for (let page = 1; page <= countPages; page++) {
        let pageItem = document.createElement("div");

        pageItem.innerHTML = `
        <div class="page-item ${
            page === currentPage ? "active" : ""
        }" onclick="changePage(${page})">
            ${page}
        </div>
        `;
        paginationContainer.append(pageItem.firstElementChild);
    }
}

pageBtnPrev.addEventListener("click", (e) => {
    changePage(currentPage - 1);
});

pageBtnNext.addEventListener("click", (e) => {
    changePage(currentPage + 1);
});
