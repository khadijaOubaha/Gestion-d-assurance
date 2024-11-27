
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <form action="<?= base_url('/login/validate') ?>" method="post">  
      
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example13">Email </label>

            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example23">Mot de passe</label>

            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
          </div>

          

          <!-- Submit button -->
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Connexion</button>


          

        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>
