<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-size: 12px;
            text-align: left;
        }
    </style>

    <!-- Include jQuery and jQuery Validation Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

</head>
<body>

    <div class="login-container">
        <img src="{{asset('images/logo.png')}}" alt="logo" style="width:60px">
        <form id="admin-login-form" action="{{route('login')}}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <span style="color:red">{{ $error }}</span>
                    @endforeach
                </div>
            @endif
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <div class="error" id="email-error"></div>
                <!-- @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif -->
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="error" id="password-error"></div>
                <!-- @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif -->
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        // jQuery Validation
        $(document).ready(function() {
            $("#admin-login-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 6 characters."
                    }
                }
            });
        });
    </script>

</body>
</html>
