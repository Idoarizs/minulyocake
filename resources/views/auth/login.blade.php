<!DOCTYPE html>
<html>

<head>
    <title>Minulyo Cake</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="animate__animated animate__fadeInDown">Login</h1>

        @if ($errors->any())
            <div class="animate__animated animate__fadeInUp">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="login-form" action="{{ route('login') }}" method="POST" class="animate__animated animate__fadeIn">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat Saya</label>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 25%;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container > #login-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: inline;
        margin-bottom: 10px;
        color: #666;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="checkbox"] {
        margin-right: 5px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        width: 100%;
        font-size: 16px;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        color: red;
    }

    ul li {
        margin-bottom: 5px;
    }
</style>

<script>
    gsap.from(".container", { duration: 1, opacity: 0, y: 50, ease: "power2.out" });
    gsap.from("#login-form", { duration: 1, opacity: 0, y: 50, ease: "power2.out", delay: 0.5 });
</script>

</html>