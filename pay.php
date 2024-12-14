<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_DPGCJ7kqrAuEsf", // Enter the Key ID generated from the Dashboard
        "amount": "50000", // Amount is in currency subunits (10.00 INR)
        "currency": "INR",
        "name": "Craft and Art",
        "description": "Art and Craft Purchase",
        "handler": function (response){
            alert("Payment ID: " + response.razorpay_payment_id);
        },
        "prefill": {
            "name": "DHANASHREE LAXMAN SONUNE",
            "email": "dhanashree.sonune02@gmail.com",
            "contact": "9552003201"
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
</script>
