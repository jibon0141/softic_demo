<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details </title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
 
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            width: 48%;
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="">Payment Details</h2>
             <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />

            <div class="form-group">
                <label for="user_id">User Id</label>
                <input type="number" id="user_id" name="user_id" required>
                <span style="color: red;" class="text-danger"> {{$errors->first('user_id')}}</span>
            </div>

            <div class="form-group">
                <label for="total_amount">Amount</label>
                <input type="text" id="total_amount" name="total_amount" required>
                <span style="color: red;" class="text-danger"> {{$errors->first('total_amount')}}</span>
            </div>


             <button type="submitt">Payment</button>
        </form>
    </div>






    
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>
