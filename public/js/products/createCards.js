const cardsContainer = document.getElementById("painting-container");

async function createCards(products) {
    let cardElements = products.map((product) => {
        return createCard(product);
    });

    return await Promise.all(cardElements);
}

async function createCard({ image, title, width, height, price, artist }) {
    let itemElement = document.createElement("div");
    itemElement.classList.add("item", "painting-card");

    let itemContentElement = document.createElement("div");
    itemContentElement.classList.add(
        "item-content",
        "d-flex",
        "flex-column",
        "gap-1"
    );

    let imgElement = document.createElement("img");
    imgElement.classList.add("painting-img", "mb-2");
    imgElement.src = `http://127.0.0.1:8000/images/paintings/${image}`;

    let artistElement = document.createElement("div");
    artistElement.classList.add("painting-artist");
    artistElement.textContent = `${artist.surname} ${artist.name}`;

    let titleElement = document.createElement("div");
    titleElement.classList.add("painting-title");
    titleElement.textContent = title;

    let descriptionElement = document.createElement("div");
    descriptionElement.classList.add("painting-description");

    let sizeElement = document.createElement("div");
    sizeElement.classList.add("painting-size");
    sizeElement.textContent = `${width}' ш X ${height}' в`;

    let techniqueElement = document.createElement("div");
    techniqueElement.classList.add("painting-technique");
    techniqueElement.textContent = "Масло";

    let priceElement = document.createElement("div");
    priceElement.classList.add("painting-price");
    priceElement.textContent = `${price} Р`;

    descriptionElement.append(sizeElement);
    descriptionElement.append(techniqueElement);

    itemContentElement.append(imgElement);
    itemContentElement.append(artistElement);
    itemContentElement.append(titleElement);
    itemContentElement.append(descriptionElement);
    descriptionElement.append(priceElement);

    itemElement.append(itemContentElement);

    return new Promise((res) => {
        imgElement.onload = () => res(itemElement);
    });
}
