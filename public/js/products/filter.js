//DOM elements
const sortBySelectElement = document.getElementById("sortBySelect");
const sortTypeSelectElement = document.getElementById("sortTypeSelect");

const styleCheckboxes = document.querySelectorAll(
    "input[type=checkbox][name=style]"
);
const plotCheckboxes = document.querySelectorAll(
    "input[type=checkbox][name=plot]"
);
const techniqueCheckboxes = document.querySelectorAll(
    "input[type=checkbox][name=technique]"
);
const materialCheckboxes = document.querySelectorAll(
    "input[type=checkbox][name=material]"
);

const btnResetFiltersElement = document.getElementById("btnResetFilters");

let sortBy = "price";
let typeSort = "asc";
let stylesId = [];
let plotsId = [];
let techniquesId = [];
let materialsId = [];

btnResetFiltersElement.addEventListener("click", () => resetFilters());
