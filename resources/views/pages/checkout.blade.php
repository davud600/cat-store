@extends('layouts.main')

@section('head')
<title>Shipping</title>
@endsection

@section('content')
<a class="button ml-5 mt-5 md:ml-14 md:mt-14 px-6 py-2 md:text-xl text-lg rounded-lg hover:bg-blue-900 transition-all text-white bg-blue-800" href="/shipping">Back</a>

<section id="checkout-section" class="px-4 md:px-14 py-12">
    <article class="flex flex-col items-center text-center gap-4 bg-neutral-800 px-4 md:px-6 py-8 rounded-lg">
        <h1 class="text-2xl md:text-3xl font-bold my-4 text-white">Checkout</h1>

        <form id="checkoutForm" class="w-5/6 md:w-2/3 my-4 flex flex-col gap-6">
            {{ csrf_field() }}

            <label class="text-lg md:text-xl my-3 text-neutral-300 font-semibold">Payment info: </label>
            <input id="card_holder_name" name="card_holder_name" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-3 text-white bg-neutral-600" type="text" required placeholder="Name on card">
            <input id="card_number" name="card_number" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-3 text-white bg-neutral-600" type="text" required placeholder="Credit Card Number (Visa, MasterCard, American Express)">
            <div class="flex flex-col md:flex-row gap-6 md:gap-3">
                <input id="card_exp_date" name="card_exp_date" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-3 text-white bg-neutral-600" type="text" required placeholder="Expiration Date (MM/YY)" maxlength="5" onkeyup="modifyInput(this)">
                <input id="card_sec_code" name="card_sec_code" class="w-full text-base md:text-lg pl-5 pr-3 rounded-lg py-3 text-white bg-neutral-600" type="number" required placeholder="Security Code (CVV)" pattern="/^-?\d+\.?\d*$/" onkeypress="if (this.value.length === 4) return false;">
            </div>
            <input class="text-center cursor-pointer bg-red-600 md:w-48 w-full py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-red-700 transition-all" type="submit">
        </form>

        @php
        $catDob = new DateTime(session()->get('catInfo')['dob']);
        @endphp

        <div class="w-5/6 md:w-2/3">
            <span class="text-lg md:text-xl my-3 text-neutral-300 font-semibold">Purchase info: </span>
            <div class="my-4 w-full flex justify-between">
                <div></div>
                <div class="absolute flex flex-col gap-2 text-start w-1/2">
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Name:</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Price:</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Age:</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Description:</span>
                </div>
                <div class="flex flex-col gap-2 text-end w-1/2">
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('catInfo')['name'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('catInfo')['price'] }}€&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ $catDob->diff(new DateTime())->format('%y years %m months %d days') }} old&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('catInfo')['description'] }}&nbsp;</span>
                </div>
            </div>
        </div>

        <div class="w-5/6 md:w-2/3">
            <span class="text-lg md:text-xl my-3 text-neutral-300 font-semibold">Shipping info: </span>
            <div class="my-4 w-full flex justify-between">
                <div></div>
                <div class="absolute flex flex-col gap-2 text-start w-1/2">
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Full Name:</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">E-Mail:</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Address</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">2nd Address</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">City</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Province</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Zip Code</span>
                    <span class="text-neutral-400 font-medium text-base md:text-lg">Country</span>
                </div>
                <div class="flex flex-col gap-2 text-end w-1/2">
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['full_name'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['email'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['address'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['address2'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['city'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['province'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['zip_code'] }}&nbsp;</span>
                    <span class="text-neutral-400 text-base md:text-lg">{{ session()->get('shippingInfo')['country'] }}&nbsp;</span>
                </div>
            </div>
            <div class="flex justify-start">
                <a href="/shipping" class="button text-center cursor-pointer bg-blue-700 md:w-48 w-full py-3 px-1 text-white rounded-lg font-bold my-4 hover:bg-blue-800 transition-all">Edit</a>
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

    /*
     * form onsubmit event handler
     * validates inputs and shows alert if info invalid
     */
    checkoutForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append("card_holder_name", document.getElementById("card_holder_name").value);
        formData.append("card_number", document.getElementById("card_number").value);
        formData.append("card_exp_date", document.getElementById("card_exp_date").value);
        formData.append("card_sec_code", document.getElementById("card_sec_code").value);

        if (!validateInputs(formData)) {
            // !! TEMPORARY SOLUTION, SHOULD USE alert.blade.php component
            // display alert
            const portalElem = document.getElementById('portal');
            const alertElem = document.createElement('div');
            alertElem.innerHTML = `<div id="error-alert" class="rounded-lg drop-shadow-xl md:w-96 w-72 text-center top-36 left-0 right-0 h-20 ml-auto mr-auto bg-red-50 md:px-5 md:py-4 py-3 px-4 fixed z-50">
                <button class="hover:bg-red-200 rounded-lg transition-all text-red-800 md:text-2xl text-xl font-semibold w-4 h-4 p-4 mt-1 absolute top-0 right-0 mr-1" onclick="this.parentElement.style.display='none';">
                    <span class="absolute left-0 right-0 top-0 bottom-0">x</span>
                </button>
                <span class="md:text-lg text-base text-red-700 font-semibold">Invalid Credit Card Information!</span>
            </div>`;
            portalElem.appendChild(alertElem);

            return;
        }

        paymentRequest(formData);
    });


    /*
     * Make http request to CheckoutController::processPayment function
     */
    async function paymentRequest(formData) {
        try {
            const res = await fetch(`${"{{ url('/') }}"}/payment`, {
                headers: {
                    'x-csrf-token': '{{ csrf_token() }}'
                },
                method: 'post',
                body: formData
            });

            // redirect to thank you page
            if (res.status === 200)
                window.location.href = '/payment-success';
        } catch (error) {
            console.error(error);
        }
    }

    function validateInputs(formData) {
        const cardProcessor = getCardProcessor(formData.get('card_number'));

        if (!cardProcessor) return false;

        if (!validateExpDate(formData.get('card_exp_date'))) return false;

        if (!validateCvv(cardProcessor, formData.get('card_sec_code'))) return false;

        return true;
    }

    /*
     * Returns the card processor of the credit card number given
     * by using regex from cardProcessors array
     */
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