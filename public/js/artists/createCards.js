const cardsContainer = document.getElementById("painting-container");

async function createCards(products) {
    let cardElements = products.artists.map((product) => {
        return createCard(product);
    });

    return await Promise.all(cardElements);
}
