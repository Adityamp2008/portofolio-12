<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME')}} | Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Memberi sedikit background pada body untuk kontras */
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        
                        <h3 class="card-title text-center mb-4">Selamat Datang</h3>
                        
                        <form action="#" method="post">
                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="nama@email.com" required>
                                <label for="floatingEmail">
                                    <i class="bi bi-envelope-fill me-2"></i>
                                    Alamat Email
                                </label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">
                                    <i class="bi bi-lock-fill me-2"></i>
                                    Password
                                </label>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Ingat Saya
                                    </label>
                                </div>
                                <a href="#" class="form-text text-decoration-none">Lupa Password?</a>
                            </div>
                            
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit">Masuk</button>
                            </div>
                            
                        </form>
                        <p class="text-center mt-4 form-text">
                            Belum punya akun? <a href="#" class="text-decoration-none fw-medium">Daftar di sini</a>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>