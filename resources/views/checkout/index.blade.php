@extends('templates.app')

@section('title', 'Корзина')

@push('style')
<style>
.checkout {
    margin-top: 120px;
}


.bg-brown {
    background: var(--color-brown);
}

.basket-title {
    font-family: 'Arsenica';
}

#btnCheckout {
    padding: 10px 20px;
    border-radius: 25px;
    background: #fff;
    border: 1px solid var(--color-brown);
    color: var(--color-brown);
}

.radio-item {
    display: inline-block;
    position: relative;
    padding: 0 6px;
    margin: 10px 0 0;
}

.radio-item input[type='radio'] {
    display: none;
}

.radio-item label {
    color: #666;
    font-weight: normal;
}

.radio-item label:before {
    content: " ";
    display: inline-block;
    position: relative;
    top: 5px;
    margin: 0 5px 0 0;
    width: 20px;
    height: 20px;
    border-radius: 11px;
    border: 2px solid var(--color-brown);
    background-color: transparent;
}

.radio-item input[type=radio]:checked+label:after {
    border-radius: 11px;
    width: 12px;
    height: 12px;
    position: absolute;
    top: 9px;
    left: 10px;
    content: " ";
    display: block;
    background: var(--color-brown);
}
</style>
@endpush

@section('content')

<div class="container checkout">
    <div class="row g-5" id="header">
        <div class="col-6">
            <h2 class="mb-3 basket-title">
                Корзина
            </h2>

            <div id="cardsContainer">

            </div>
        </div>
        <div class="col-6">
            <h2 class="mb-3 basket-title">Оформление заказа</h2>
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="firstName" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="firstName" value="{{ $userName }}" disabled>
                    </div>

                    <div class="col-12">
                        <label for="firstName" class="form-label">e-mail</label>
                        <input type="text" class="form-control" id="firstName" value="{{ $userEmail }}" disabled>
                    </div>

                    <div class="col-12">
                        <label for="firstName" class="form-label">Номер телефона</label>
                        <input type="text" class="form-control" id="firstName" value="{{ $userPhone }}" disabled>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Адрес</label>
                        <input type="text" class="form-control" id="address" value="{{ $userAddress }}" disabled>
                    </div>
                </div>

                <div class="shipping mt-3">
                    <p class="mb-3">Доставка</p>

                    <div class="my-3">
                        <div class="form-check radio-item">
                            <input id="mail" name="typeShipping" type="radio" class="form-check-input typeShipping"
                                value="MAIL" checked required>
                            <label class="form-check-label" for="mail">По почте</label>
                        </div>
                        <div class="form-check radio-item">
                            <input id="pickup" name="typeShipping" type="radio" class="form-check-input typeShipping"
                                value="PICKUP" required>
                            <label class="form-check-label" for="pickup">Самовывоз</label>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="text-muted" id="descriptionShipping">
                            Доставка по почте осуществляется службой Express Shipping от 5 до 14 дней.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="totalPriceContainer d-flex justify-content-between align-items-center gap-3">
                    <h5>Итого: <span id="totalPrice">0 руб.</span></h5>
                    <button class="btn d-flex align-items-center gap-3" type="submit" id="btnCheckout"><span>Перейти к
                            оплате</span><img src="{{ asset('images/checkout/arrow.svg') }}" alt="arrow" /></button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="{{ asset('/js/fetch.js') }}"></script>

<script>
//элементы DOM
let cardsContainerElement = document.getElementById('cardsContainer');

const totalPriceElement = document.getElementById('totalPrice');
const countProductElement = document.getElementById('countProduct');
const userPasswordElement = document.getElementById('userPassword');
const modalCheckoutElement = document.getElementById('modalCheckout');

const btnCheckoutElement = document.getElementById('btnCheckout');

const descriptionShippingElement = document.getElementById('descriptionShipping');

const descriptionOptions = {
    'MAIL': 'Доставка по почте осуществляется службой Express Shipping от 5 до 14 дней.',
    'PICKUP': 'После оплаты товар надежно хранится на складе до тех пор, пока вы лично не заберете его.',
}

const countBasketElement = document.getElementById('countBasket');

let cartProducts = []; //cart products

let typeShipping = 'MAIL';

const createCards = (products) => {
    cardsContainerElement.textContent = '';

    products.forEach((product) => {
        cardsContainerElement.insertAdjacentHTML('beforeEnd', createCard(product));
    });
}

//создание карточки товара
const createCard = ({
    painting_id,
    title,
    price,
    image,
    artist_name,
    artist_surname,
}) => {
    return `
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                            src="{{ url('storage/paintings/'. '${image}') }}"
                            class="img-fluid" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">${artist_name} ${artist_surname}</h6>
                        <h6 class="text-black mb-0">${title}</h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0 productPrice" data-price="${price}">${price} р.</h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end" onclick="destroyProduct(${painting_id})">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
            `;

}

//total price
const calcPriceProducts = (products) => {
    return products.reduce((price, product) => price + product.price, 0);
}

//get all products
const getCartProducts = async () => {
    return await getJSON(`{{ route('basket.paintings') }}`);
}


const changeProduct = (products, newProduct) => {
    return cartProducts.map((product) => {
        if (product.id === newProduct.id) {
            return newProduct;
        }
        return product;
    });
}

async function destroyProduct(paintingId) {
    const cartProduct = (await postJSON(`{{ route('basket.destroy') }}`, {
            paintingId
        }, `{{ csrf_token() }}`, 'POST'))
        .data;

    cartProducts = cartProducts.filter((product) => product.painting_id !== cartProduct.painting_id)
    createCards(cartProducts);
    totalPriceElement.textContent = `${calcPriceProducts(cartProducts)} руб.`;

    if (+countBasket.textContent - 1 == 0) {
        countBasket.textContent = '';
    } else {
        countBasket.textContent = +countBasket.textContent - 1;
    }

    if (!cartProducts.length) {
        btnShowModal.style.display = 'none';
    }
}

async function addProduct(paintingId) {
    const cartProduct = (await postJSON(`{{ route('basket.add') }}`, {
            paintingId
        }, `{{ csrf_token() }}`, 'POST'))
        .data;

    createCards(changeProduct(cartProducts, cartProduct));
}


(async () => {
    cartProducts = await getCartProducts();

    if (cartProducts.length) {
        createCards(cartProducts);
        totalPriceElement.textContent = `${calcPriceProducts(cartProducts)} руб.`;
    }
})();

btnCheckoutElement.addEventListener('click', (e) => {
    e.preventDefault();

    checkout();
});

async function checkout() {
    const totalPrice = calcPriceProducts(cartProducts);

    if (cartProducts.length != 0) {
        let order = await postJSON(`{{ route('basket.checkout') }}`, {
            totalPrice,
            typeShipping
        }, `{{ csrf_token() }}`, 'POST');

        await postJSON(`{{ route('payment.create') }}`, {
            amount: totalPrice,
            description: 'Оформление заказа',
            orderId: order.id
        }, `{{ csrf_token() }}`, 'POST').then((data) => {
            const paymentLink = data;

            location.href = paymentLink;
        });
    }
}

[...document.getElementsByClassName('typeShipping')].forEach((element) => {
    element.addEventListener('click', (e) => {
        typeShipping = e.target.value;
        descriptionShipping.textContent = descriptionOptions[typeShipping];
    });
});
</script>
@endpush