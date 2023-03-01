@extends('layouts.main')

@section('head')
<title>Shipping</title>
@endsection

@section('content')
<a class="button ml-5 mt-5 md:ml-14 md:mt-14 px-6 py-2 md:text-xl text-lg rounded-lg hover:bg-blue-400 transition-all text-white bg-blue-300" href="{{ url()->previous() }}">Back</a>
<section id="checkout-section" class="px-4 md:px-14 py-12">
    <article class="flex flex-col items-center text-center gap-4 bg-gray-200 px-4 md:px-6 py-8 rounded-lg">
        <h1 class="text-2xl md:text-3xl font-semibold my-4">Checkout</h1>

        <form id="checkoutForm" class="w-5/6 md:w-2/3 my-4 flex flex-col gap-6">
            {{ csrf_field() }}

            <label class="text-lg md:text-xl my-3">Payment info: </label>
            <input id="name" name="name" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="Name on card">
            <input id="creditCard" name="creditCard" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="Credit Card Number">
            <div class="flex flex-col md:flex-row gap-6 md:gap-3">
                <input id="expDate" name="expDate" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="text" required placeholder="Expiration Date (MM/YY)" maxlength="5" onkeyup="modifyInput(this)">
                <input id="secCode" name="secCode" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-2 text-gray-700" type="number" required placeholder="Security Code (CVV)" pattern="/^-?\d+\.?\d*$/" onkeypress="if (this.value.length === 4) return false;">
            </div>
            <input class="text-center cursor-pointer bg-red-500 md:w-48 w-full py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-red-700 transition-all" type="submit">
        </form>

        <div class="w-5/6 md:w-2/3">
            <span class="text-lg md:text-xl my-3">Purchase info: </span>
            <div class="my-4 w-full flex justify-between">
                <div></div>
                <div class="absolute flex flex-col gap-2 text-start w-1/2">
                    <span class="text-gray-600 font-medium text-base md:text-lg">Name:</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Price:</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Age</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Description</span>
                </div>
                <div class="flex flex-col gap-2 text-end w-1/2">
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('catInfo')['name'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('catInfo')['price'] }}€&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('catInfo')['dob']->diff(new DateTime())->format('%y years %m months %d days') }} old&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('catInfo')['description'] }}&nbsp;</span>
                </div>
            </div>
        </div>

        <div class="w-5/6 md:w-2/3">
            <span class="text-lg md:text-xl my-3">Shipping info: </span>
            <div class="my-4 w-full flex justify-between">
                <div></div>
                <div class="absolute flex flex-col gap-2 text-start w-1/2">
                    <span class="text-gray-600 font-medium text-base md:text-lg">Full Name:</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">E-Mail:</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Address</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">2nd Address</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">City</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Province</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Zip Code</span>
                    <span class="text-gray-600 font-medium text-base md:text-lg">Country</span>
                </div>
                <div class="flex flex-col gap-2 text-end w-1/2">
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['fullName'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['email'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['address'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['address2'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['city'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['province'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['zipCode'] }}&nbsp;</span>
                    <span class="text-gray-600 text-base md:text-lg">{{ session()->get('shippingInfo')['country'] }}&nbsp;</span>
                </div>
            </div>
            <div class="flex justify-start">
                <a href="/shipping" class="button text-center cursor-pointer bg-blue-500 md:w-48 w-full py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-blue-700 transition-all">Edit</a>
            </div>
        </div>
    </article>
</section>

<script defer>
    const cardProcessors = [{
            name: "americanExpress",
            regex: /^(?:3[47][0-9]{13})$/,
            cvvLength: 4,
        },
        {
            name: "visa",
            regex: /^(?:4[0-9]{12}(?:[0-9]{3})?)$/,
            cvvLength: 3,
        },
        {
            name: "masterCard",
            regex: /^(?:5[1-5][0-9]{14})$/,
            cvvLength: 3,
        },
    ];
    const checkoutForm = document.getElementById('checkoutForm');

    checkoutForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append("name", document.getElementById("name").value);
        formData.append("creditCard", document.getElementById("creditCard").value);
        formData.append("expDate", document.getElementById("expDate").value);
        formData.append("secCode", document.getElementById("secCode").value);

        if (!validateInputs(formData)) {
            // display alert

            return;
        }

        // make request to CheckoutController::processPayment
    });

    function validateInputs(formData) {
        const cardProcessor = getCardProcessor(formData.get('creditCard'));

        if (!cardProcessor) return false;

        if (!validateExpDate(formData.get('expDate'))) return false;

        if (!validateCvv(cardProcessor, formData.get('secCode'))) return false;

        return true;
    }

    function getCardProcessor(cardNumber) {
        let cardProcessor;

        cardProcessors.forEach(processor => {
            if (cardNumber.match(processor.regex))
                cardProcessor = processor;
        });

        return cardProcessor;
    }

    function validateExpDate(expDate) {
        // regex to match "MM/YY" format
        if (!expDate.match(/^(0[1-9]|1[0-2])\/(2[3-9]|[3-9][0-9])$/)) return false;

        return !isCardExpired(expDate);
    }

    function validateCvv(cardProcessor, cvvNumber) {
        // regex to match 3 or 4 (depending on payment processor) digit code
        if (cardProcessor.cvvLength === 3) return cvvNumber.match(/^[0-9]{3}$/);
        else if (cardProcessor.cvvLength === 4) return cvvNumber.match(/^[0-9]{4}$/);
        else return false;
    }

    /*
     * Credit to ChatGPT for this function :P
     * this compares the current date and the card expiration date given,
     * by converting the string into a date and then comparing them.
     */
    function isCardExpired(expDate) {
        // Split the expiration date into month and year parts
        const parts = expDate.split('/');
        const expMonth = parseInt(parts[0]);
        const expYear = parseInt('20' + parts[1]);

        // Get the current date
        const now = new Date();
        const currentMonth = now.getMonth() + 1;
        const currentYear = now.getFullYear();

        // Compare the expiration year and month with the current year and month
        if (expYear < currentYear || (expYear === currentYear && expMonth < currentMonth)) {
            return true; // Card has already expired
        } else {
            return false; // Card is still valid
        }
    }

    /*
     * Credit to some guy on stackoverflow for this function :P
     * this auto format's the cvv input field to have the slash MM/YY.
     */
    function modifyInput(ele) {
        let inputChar = String.fromCharCode(event.keyCode);
        let code = event.keyCode;
        let allowedKeys = [8];

        if (allowedKeys.indexOf(code) !== -1) {
            return;
        }

        event.target.value = event.target.value.replace(
            /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
        ).replace(
            /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
        ).replace(
            /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
        ).replace(
            /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
        ).replace(
            /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
        ).replace(
            /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
        ).replace(
            /\/\//g, '/' // Prevent entering more than 1 `/`
        );
    }
</script>
@endsection