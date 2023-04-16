const cardsContainer = document.getElementById("painting-container");

async function createCards(products) {
    let cardElements = products.paintings.map((product) => {
        return createCard(product);
    });

    return await Promise.all(cardElements);
}
