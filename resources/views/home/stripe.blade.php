<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #card-element {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        #card-errors {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
@if(Session::has('success'))
    <p style="color:green">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
    <p style="color:red">{{ Session::get('error') }}</p>
@endif

<h2>Stripe Payment ($100)</h2>

<form id="payment-form">
    @csrf
    <label>Name on Card</label>
    <input type="text" id="name" required placeholder="Cardholder Name">

    <label>Card Details</label>
    <div id="card-element"></div>
    <div id="card-errors" role="alert"></div>

    <button id="pay-button" type="submit">Pay $100</button>
</form>

<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}"); // Publishable key
const elements = stripe.elements();
const card = elements.create("card", {hidePostalCode: true});
card.mount("#card-element");

const form = document.getElementById("payment-form");

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    document.getElementById('card-errors').textContent = '';

    const name = document.getElementById('name').value;

    const {token, error} = await stripe.createToken(card, {name});

    if (error) {
        document.getElementById('card-errors').textContent = error.message;
    } else {
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.setAttribute('action', "{{ route('stripe.post') }}");
        form.setAttribute('method', "POST");
        form.submit();
    }
});
</script>
</body>
</html>
