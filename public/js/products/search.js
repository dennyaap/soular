let avaliableKeywords = [];

const resultBox = document.getElementById("result-box");
const inputBox = document.getElementById("input-box");

function display(artists) {
    resultBox.textContent = "";

    artists.forEach((artist) => {
        resultBox.insertAdjacentHTML(
            "afterBegin",
            `<li onclick="searchArtist('${artist.id}', '${artist.name} ${artist.surname}')">${artist.name} ${artist.surname}</li>`
        );
    });
}
