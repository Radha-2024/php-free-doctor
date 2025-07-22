<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login</title>
</head>
<body>
    <h2>Doctor Login</h2>
    <form method="POST" action="{{ route('doctor.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="{{ route('doctor.register') }}">Register here</a></p>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</body>
</html>
