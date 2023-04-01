let grid = new Muuri(".grid", {
    dragEnabled: false,
    layout: {
        fillGaps: true,
    },
});

window.addEventListener("load", function () {
    grid.refreshItems().layout();
    // document.body.classList.add("images-loaded");
});
