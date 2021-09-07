<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .container{
            width: 100px;
            height: 100px;
        }

        .button3 {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div>
    @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

    const failRequest = {
            "pay_form": {
                "token": "xxx",
                "design_name": "des1"
            },
            "transactions": {
                "12345-7891234567": {
                    "id": "12345-7891234567",
                    "operation": "pay",
                    "status": "success",
                    "descriptor": "FAKE_PSP",
                    "amount": 2345,
                    "currency": "USD",
                    "fee": {
                        "amount": 0,
                        "currency": "USD"
                    },
                    "card": {
                        "bank": "CITIZENS STATE BANK",
                    }
                }
            },
            "error": {
                "code": "6.01",
                "messages": [
                    "Unknown decline code"
                ],
                "recommended_message_for_user": "Unknown decline code"
            },
            "order": {
                "order_id": "12345-7891234567",
                "status": "declined",
                "amount": 2345,
                "refunded_amount": 0,
                "currency": "USD",
                "marketing_amount": 2345,
                "marketing_currency": "USD",
                "processing_amount": 2345,
                "processing_currency": "USD",
                "descriptor": "FAKE_PSP",
                "fraudulent": false,
                "total_fee_amount": 0,
                "fee_currency": "USD"
            },
            "transaction": {
                "id": "12345-7891234567",
                "operation": "pay",
                "status": "fail"
            }
        }
    ;

    const successRequest = {
            "pay_form": {
                "token": "xxx",
                "design_name": "des1"
            },
            "transactions": {
                "12345-7891234567": {
                    "id": "12345-7891234567",
                    "operation": "pay",
                    "status": "success",
                    "descriptor": "FAKE_PSP",
                    "amount": 2345,
                    "currency": "USD",
                    "fee": {
                        "amount": 0,
                        "currency": "USD"
                    },
                    "card": {
                        "bank": "CITIZENS STATE BANK",
                    }
                }
            },
            "error": {
                "code": "6.01",
                "messages": [
                    "Unknown decline code"
                ],
                "recommended_message_for_user": "Unknown decline code"
            },
            "order": {
                "order_id": "12345-7891234567",
                "status": "declined",
                "amount": 2345,
                "refunded_amount": 0,
                "currency": "USD",
                "marketing_amount": 2345,
                "marketing_currency": "USD",
                "processing_amount": 2345,
                "processing_currency": "USD",
                "descriptor": "FAKE_PSP",
                "fraudulent": false,
                "total_fee_amount": 0,
                "fee_currency": "USD"
            },
            "transaction": {
                "id": "12345-7891234567",
                "operation": "pay",
                "status": "success"
            }
        }
    ;

    $(".success-request").click(function(event){

        event.preventDefault();

        const jsonString = JSON.stringify(successRequest);

        const xhr = new XMLHttpRequest();

        xhr.open("POST", "/request/callback");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
        xhr.send(jsonString);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                console.log(JSON.parse(xhr.responseText));

                if(JSON.parse(xhr.responseText).status == 'success'){
                    location.href = 'http://localhost:8088/success';
                }
            }
        }
    });

    $(".fail-request").click(function(event){

        event.preventDefault();

        const jsonString = JSON.stringify(failRequest);

        const xhr = new XMLHttpRequest();

        xhr.open("POST", "/request/callback");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
        xhr.send(jsonString);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                console.log(JSON.parse(xhr.responseText));

                if(JSON.parse(xhr.responseText).status == 'fail'){
                    location.href = 'http://localhost:8088/fail';
                }
            }
        }
    });
</script>
</body>
</html>
