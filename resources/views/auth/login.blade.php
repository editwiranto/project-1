<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body{
            height: 100%;
            margin: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container-a{
            width: 800px;
            height: 400px;
        }
    </style>
</head>
<body>
   
    <div class="container-a">
        
        <div class="section" style="display: flex; justify-content:center;align-items:center;">
            <div class="gambar" style="width:100%;height:100%;">
                <img src="{{ asset('images/3dlogin.jpg') }}" alt="gambar-login" width="100%" height="100%">
            </div>
            <div class="f-login text-center shadow rounded" style="width:100%;height:100%;padding:30px;">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <h1 style="margin-bottom: 20px;">LOGIN</h1>
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
                    <div class="d-grid gap-2" style="margin-bottom:20px;">
                        <button class="btn btn-outline-primary" type="submit">Login</button>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ session::get('fail') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>