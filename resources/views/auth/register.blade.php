<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>

<body>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="header" style="margin-bottom:50px;margin-top:20px; color:green;">
            <h1>EditPedia</h1>
        </div>
        <div class="body d-flex">
            <div class="section1" style="display: grid; place-items:center;padding:30px;">
                <img src="{{ asset('images/3dregister.jpg') }}" alt="" width="300px" height="300px">
                <p style="font-size: 20px;margin-top:5px;"><strong> Jual Beli Mudah Hanya di EditPedia </strong></p>
                <p>Gabung dan rasakan kemudahan bertransaksi di Tokopedia</p>
            </div>
            <div class="section2 card-body text-center shadow rounded" style="padding: 30px 40px 30px 40px;">
                <h4 style="font-weight: 700;">Daftar Sekarang</h4>
                <p>Sudah punya Akun EditPedia ? <a href="/login">Masuk</a></p>
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer" style="margin-top: 100px;">
            <p>&copy; 2024, Edit Wiranto <a href="#">Edit PediaCare</a></p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>