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
                                <form action= "{{ route('postregister') }}" method= "post">
                                    @csrf
                                    
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username ..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="level" required style="display:none">
                        <option value="user" selected>User</option>
                        </select>
                    </div>
                                    <div class="mt-4 mb-4">
                                        <button type="submit" class="rounded-0">Register</button>
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