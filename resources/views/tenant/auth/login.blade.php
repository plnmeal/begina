<!-- resources/views/tenant/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tenant Login</title>
</head>
<body>
    <h1>Tenant Login</h1>
    @if(session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('tenant.login.submit') }}">

        @csrf
        <label>Email:</label>
        <input type="email" name="email" required autofocus>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    @if($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
