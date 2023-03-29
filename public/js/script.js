var grid = new Muuri(".grid", {
    dragEnabled: true,
    layout: {
        fillGaps: true,
    },
});

window.addEventListener("load", function () {
    grid.refreshItems().layout();

    document.body.classList.add("images-loaded");
});
