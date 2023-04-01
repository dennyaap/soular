createCards().then((data) => {
    let cards = data;
    const newItems = grid.add(cards, { active: false });
    grid.show(newItems);
});

sortSelectWidthElement.addEventListener("change", (e) => {});

sortSelectPriceElement.addEventListener("change", (e) => {});
