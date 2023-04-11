// const inputImageElement = document.getElementById('inputImage');

// inputImageElement.addEventListener('change', (e) => {
//     console.log(e.target);
// });

function checkImage (element) {
    console.log(element.files[0]);

    const fileReader = new FileReader();

    fileReader.readAsDataURL(element.files[0]);

    fileReader.addEventListener('load', () => {
        const currentImageElement = document.getElementById('imagePreview');
        currentImageElement.style.backgroundImage = `url("${fileReader.result}")`;
    });

}