let avaliableKeywords = [
    "Channel",
    "CodingLab",
    "CodingNepal",
    "YouTube",
    "YouTuber",
    "YouTube Channel",
    "Blogger",
    "Bollywood",
    "Vlogger",
    "Vechiles",
    "Facebook",
    "Freelancer",
    "Facebook Page",
    "Designer",
    "Developer",
    "Web Designer",
    "Web Developer",
    "Login Form in HTML & CSS",
    "How to learn HTML & CSS",
    "How to learn JavaScript",
    "How to became Freelancer",
    "How to became Web Designer",
    "How to start Gaming Channel",
    "How to start YouTube Channel",
    "What does HTML stands for?",
    "What does CSS stands for?",
];

const resultBox = document.getElementById("result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = () => {
    let result = [];
    let input = inputBox.value;

    if (input.length) {
        result = avaliableKeywords.filter((keyword) => {
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
    }

    display(result);

    if (!input.length) {
        resultBox.textContent = "";
    }
};

function display(result) {
    resultBox.textContent = "";

    result.forEach((item) => {
        resultBox.insertAdjacentHTML(
            "afterBegin",
            `<li onclick="selectInput('${item}')">${item}</li>`
        );
    });
}

function selectInput(query) {
    inputBox.value = query;
    resultBox.textContent = "";
}
