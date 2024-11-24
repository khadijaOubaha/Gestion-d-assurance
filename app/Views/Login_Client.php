<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Login Page</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
        }  

        .loho {  
            background-image: url('assets/img/3.jpg'); /* Remplace par le nom de ton image */  
            background-size: cover;  
            background-position: center;  
            background-repeat: no-repeat;  
            min-height: 100vh; /* Fait en sorte que cela occupe toute la hauteur */  
        }  
    </style>  
</head>  
<body>  
<section class="loho">  
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">  
    <div class="row gx-lg-5 align-items-center mb-5">  
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">  
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">  
          Login to your account  
        </h1>  
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">  
          Enter your email and password to access your account.  
        </p>  
      </div>  

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">  
        <div class="card bg-glass">  
          <div class="card-body px-4 py-5 px-md-5">  
            <form action="<?= base_url('/login/validate') ?>" method="post">  
              <div class="form-outline mb-4">  
                <input type="email" id="form3Example3" class="form-control" name="email"/>  
                <label class="form-label" for="form3Example3">Email address</label>  
              </div>  

              <div class="form-outline mb-4">  
                <input type="password" id="form3Example4" class="form-control" name="password"/>  
                <label class="form-label" for="form3Example4">Password</label>  
              </div>  

              <div class="form-check d-flex justify-content-center mb-4">  
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />  
                <label class="form-check-label" for="form2Example33">Remember me</label>  
              </div>  

              <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>  

              <div class="text-center">  
                <p>Don't have an account? <a href="#!" class="link-danger">Register</a></p>  
              </div>  
            </form>  
          </div>  
        </div>  
      </div>  
    </div>  
  </div>  
  <div class="text-center text-white bg-primary py-4">  
    Copyright 2023. All rights reserved.  
  </div>  
</section>  
</body>  
</html>