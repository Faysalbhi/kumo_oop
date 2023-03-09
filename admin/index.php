<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="dashboard_assets/css/form.css">
</head>
<body>
  
  <div class="page-content d-flex align-items-center">
    <div class="container d-flex justify-content-center">
      <div class="col-12 col-sm-10 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
        <div class="auth-card">
            <div class="logo-area">
              <img class="logo" src="dashboard_assets/images/logo.jpg" alt="logo">
            </div>
            <h5 class="auth-title">Programming Skills</h5>
            
            <p class="auth-title">Admin</p>
            <hr class="separator">
            <form action="auth/admin_loging_post.php" method="post">
              <div class="mb-2 mt-5">
                <?php
                if(isset($_SESSION['email_error'])):?>
                <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['email_error'];
                unset($_SESSION['email_error']);
                ?>
                </div>
                <?php endif?>
                
                <input type="text" name="email" class="form-control" placeholder="E-Mail Address" >
                <div id="emailHelp" class="form-text input-info-text">E-mail Address or User Name</div>
              </div>
              <div class="mb-3">
                  <input type="password" name="password"class="form-control " placeholder="Password">
                  <?php
                if(isset($_SESSION['pass_serror'])):?>
                <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['pass_serror'];
                unset($_SESSION['pass_serror']);
                ?>
                </div>
                <?php endif?>
              </div>
             <button type="submit" name="submit" class="btn auth-btn mt-2 mb-4">Login</button>
            </form>
            <p class="text mb-1">Forget <a class="text-link">Password?</a></p>
            <p class="text mb-4">Don't have an account yet?<a href="sign_up.php" class="text-link">Create Account</a></p>

        </div>
      </div>
    
    </div>
  </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>