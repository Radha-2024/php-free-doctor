<!DOCTYPE html>
<html>
<head>
    <title>Customer Register</title>
</head>
<body>
    <h2>Customer Registration</h2>
    <form method="POST" action="{{ route('customer.register') }}">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('customer.login') }}">Login here</a></p>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</body>
</html>
