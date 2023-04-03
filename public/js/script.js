let grid = new Muuri(".grid", {
    dragEnabled: false,
    layout: {
        fillGaps: true,
    },
    sortData: {
        price: function (item, element) {
            console.log(element.getAttribute("data-price"));
            return parseFloat(element.getAttribute("data-price"));
        },
    },
});

window.addEventListener("load", function () {
    grid.refreshItems().layout();
    // document.body.classList.add("images-loaded");
});
