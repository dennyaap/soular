@extends('templates.app')

@section('title', 'Корзина')

@section('content')

@section('script')
<style>
@media (min-width: 1025px) {
    .h-custom {
        height: 100vh !important;
    }
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
}

.card-registration .select-arrow {
    top: 13px;
}

.bg-grey {
    background-color: #eae8e8;
}

@media (min-width: 992px) {
    .card-registration-2 .bg-grey {
        border-top-right-radius: 16px;
        border-bottom-right-radius: 16px;
    }
}

@media (max-width: 991px) {
    .card-registration-2 .bg-grey {
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
    }
}
</style>
@endsection

<section class="h-100 h-custom" style="background-color: #F5F5F5;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Корзина</h1>
                                        <h6 class="mb-0 text-muted">Подарите незабываемые эмоции!</h6>
                                    </div>
                                    <hr class="my-4">

                                    <div id="cardsContainer">

                                    </div>

                                    <hr class="my-4">

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="{{ route('paintings.index') }}" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Вернуться к товарам</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Итого</h3>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Итого</h5>
                                        <h5 id="countProduct"></h5>
                                        <h5 id="totalPrice">0</h5>
                                    </div>

                                    <div class="alert alert-success align-items-center" role="alert" id="successAlert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                            aria-label="Success:">
                                            <use xlink:href="#check-circle-fill" />
                                        </svg>
                                        <div>
                                            Заказ успешно оформлен
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg"
                                        data-mdb-ripple-color="dark" data-bs-toggle="modal"
                                        data-bs-target="#modalCheckout">Оформить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalCheckout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подтверждение пароля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Введите пароль..." class="form-control" id="userPassword" />
                <div class="alert alert-danger mt-3" role="alert" id="dangerAlert">
                    Неверный пароль
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="checkout()">Подтвердить</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="{{ asset('/js/script.js') }}"></script>
<script>
//элементы DOM
let cardsContainerElement = document.getElementById('cardsContainer');

const totalPriceElement = document.getElementById('totalPrice');
const countProductElement = document.getElementById('countProduct');
const successAlertElement = document.getElementById('successAlert');
const userPasswordElement = document.getElementById('userPassword');
const dangerAlertElement = document.getElementById('dangerAlert');
const modalCheckoutElement = document.getElementById('modalCheckout');


successAlertElement.style.display = 'none';
dangerAlertElement.style.display = 'none';


let cartProducts = []; //продукты

//создание карточек
const createCards = (products) => {
    let cardElements = '';

    console.log(products);

    products.forEach((product) => {
        cardElements += createCard(product);
    });

    // cardsContainerElement.insertAdjacentHTML('beforeEnd', cardElements);
    cardsContainerElement.innerHTML = cardElements;
    totalPriceElement.textContent = `${calcPriceProducts(products)} руб.`;
}

//создание карточки товара
const createCard = ({
    product_id,
    title,
    price,
    image,
    categoryName,
    count,
    summary
}) => {
    return `
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                            src="{{ url('/storage/products/' . '${image}') }}"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">${categoryName}</h6>
                        <h6 class="text-black mb-0">${title}</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                        <input id="form1" min="0" name="quantity" value="${count}" type="number"
                            class="form-control form-control-sm" />

                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0 productPrice" data-price="${price}">${summary} р.</h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end" onclick="destroyProduct(${product_id})">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
            `;

}


//итоговая стоимость
const calcPriceProducts = (products) => {
    return products.reduce((price, product) => price + product.summary, 0);
}

//получаем все продукты
const getCartProducts = async () => {
    return await getJSON(`{{ route('basket.paintings') }}`);
}


const changeProduct = (products, newProduct) => {
    return cartProducts.map((product) => {
        if (product.product_id === newProduct.product_id) {
            return newProduct;
        }
        return product;
    });
}

async function destroyProduct(productId) {
    const cartProduct = (await postJSON(`{{ route('basket.destroy') }}`, productId, "POST", `{{ csrf_token() }}`))
        .data;

    createCards(cartProducts.filter((product) => product.product_id !== cartProduct.product_id));
}

//функции добавления и уменьшения товара
async function addProduct(productId) {
    const cartProduct = (await postJSON(`{{ route('basket.add') }}`, productId, "POST", `{{ csrf_token() }}`)).data;

    createCards(changeProduct(cartProducts, cartProduct));
}

async function decreaseProduct(productId) {
    const cartProduct = (await postJSON(`{{ route('basket.decrease') }}`, productId, "PATCH", `{{ csrf_token() }}`))
        .data;

    createCards(changeProduct(cartProducts, cartProduct));
}


(async () => {
    cartProducts = await getCartProducts();

    let countProducts = 0;

    createCards(cartProducts);

    // countProductElement.textContent = `${countProducts} шт.`;
})();


async function checkout() {
    const totalPrice = calcPriceProducts(cartProducts);



    if (await postJSON(`{{ route('basket.checkPassword') }}`, userPassword.value, "POST", `{{ csrf_token() }}`)) {
        modalCheckoutElement.classList.remove('show');
        document.querySelector('.modal-backdrop').classList.remove('show');

        if (await postJSON(`{{ route('basket.checkout') }}`, totalPrice, "POST", `{{ csrf_token() }}`)) {
            successAlert.style.display = 'flex';
            cardsContainerElement.innerHTML = 'Корзина пуста';
        };

    } else {
        dangerAlertElement.style.display = 'block';
    }
}
</script>
@endpush