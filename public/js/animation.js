const onEntry = (entry) => {
    entry.forEach((change) => {
        if (change.isIntersecting) {
            change.target.classList.add("element-show");
        }
    });
};

const options = {
    threshold: [0.5],
};

let observer = new IntersectionObserver(onEntry, options);

let elements = document.getElementsByClassName("element-animation");

for (let element of elements) {
    observer.observe(element);
}
