<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="{{asset('admin/css/login/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: linear-gradient(#13265c, black);
        }
        
        body form button {
            width: 100%;
            color: white;
            padding: 6px 6px 6px 6px;
            border: none;
            background-color: #13265c;
        }
        
        body form button:hover {
            background-color: #192841;
        }
        
        body img {
            margin-left: 25%;
            margin-right: 30%;
        }
        
        body .container {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="bg-white shadow-lg border-0 rounded-0 mt-5 p-4">
                                <img src="{{asset('admin/assets/img/logo.png')}}" width="150px" alt="">
                                <form action= "{{ route('postlogin') }}" method= "post">
                                    @csrf
                                    <div class="mt-2 mb-2">
                                        <label for="inputEmail" class="mb-2">Username</label>
                                        <input class="form-control form-control-md rounded-0" id="inputEmail" type="text" name="username" placeholder="Masukkan username anda" />
                                    </div>
                                    <div class="mb-2    ">
                                        <label for="inputPassword" class="mb-2">Kata Sandi</label>
                                        <input class="form-control rounded-0" id="inputPassword" type="password" name="password" placeholder="Masukkan kata sandi anda" />
                                    </div>
                                    <div class="mt-4 mb-4">
                                        <button type="submit" class="rounded-0">Masuk</button>
                                    </div>
                                    <div class="w-100 text-center mt-4 text">
	          	                        <p class="mb-0">Belum Punya Akun?</p>
		                                <a href="/register">Daftar</a>
	                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
</body>

</html>