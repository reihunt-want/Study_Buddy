<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Study Buddy</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #0f3b23;
            font-family: Arial, sans-serif;
        }
        .login-card {
            background: #f5c85f;
            width: 350px;
            margin: 80px auto;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
        }
        .role-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 15px 0;
        }
        .role-btn {
            padding: 5px 15px;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
            border: none;
        }
        .active-role {
            background: #ff7a00;
            color: #fff;
        }
        .inactive-role {
            background: #2f5d3c;
            color: #fff;
        }
        .login-input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            margin: 10px 0;
        }
        .login-btn {
            background: #2f5d3c;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <img src="{{ asset('img/student.png') }}" alt="Login" width="100">

        <h4 style="margin-top:15px;">Masuk Sebagai</h4>
        <div class="role-btns">
            <button type="button" class="role-btn inactive-role" onclick="setRole('tutor')" id="btn-tutor">Tutor</button>
            <button type="button" class="role-btn active-role" onclick="setRole('siswa')" id="btn-siswa">Siswa</button>
            <button type="button" class="role-btn inactive-role" onclick="setRole('admin')" id="btn-admin">Admin</button>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="role" id="role" value="siswa">

            <input type="text" name="username" class="login-input" placeholder="Username" required>
            <input type="password" name="password" class="login-input" placeholder="Password" required>

            <button type="submit" class="login-btn">Masuk</button>
        </form>
    </div>

    <script>
        function setRole(role) {
            document.getElementById("role").value = role;
            
            // reset semua tombol
            document.getElementById("btn-tutor").classList.remove("active-role");
            document.getElementById("btn-tutor").classList.add("inactive-role");
            document.getElementById("btn-siswa").classList.remove("active-role");
            document.getElementById("btn-siswa").classList.add("inactive-role");
            document.getElementById("btn-admin").classList.remove("active-role");
            document.getElementById("btn-admin").classList.add("inactive-role");

            // aktifkan yang dipilih
            document.getElementById("btn-" + role).classList.add("active-role");
            document.getElementById("btn-" + role).classList.remove("inactive-role");
        }
    </script>

</body>
</html>

