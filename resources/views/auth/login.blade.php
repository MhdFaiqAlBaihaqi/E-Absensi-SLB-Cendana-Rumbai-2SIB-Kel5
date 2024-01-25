<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            color: black;
        }

        .login-container label {
            display: block;
            margin: 15px 0 5px;
            color: black;
            font-weight: bold;
        }

        .login-container input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .login-container input:focus {
            border-color: #3498db;
        }

        .login-container .icon {
            position: relative;
            top: 2px;
            margin-right: 5px;
        }

        .login-container button {
            background-color: #3498db;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: red;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login Form</h2>

        @if(session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email"><i class="icon fas fa-envelope"></i>Email:</label>
            <input type="text" name="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="password"><i class="icon fas fa-lock"></i>Password:</label>
            <input type="password" name="password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit">Login</button>
        </form>
    
    </div>

</body>
</html>
