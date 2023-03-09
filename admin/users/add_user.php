<?php
session_start();
require_once "../inc/partial/header.php";

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Product</h5>
      <p>This is a starter page</p>
    </div><!-- sl-page-title -->
    <div class="row">
    
      <div class="card bg- col-md-8 m-auto ">
        <div class="card-body ">
                 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New User</h6>
            
            <form action="create_user_post.php" method="post">
                  <div class="mb-3 form-group">
                    <label class="form-label input-info-text">First Name</label>
                    <input type="text" name="fname" value="<?=isset($_SESSION['fname'])?$_SESSION['fname']:'';unset($_SESSION['fname'])?>" class="form-control ">
                    <?php echo isset($_SESSION['fname_null'])?"<strong style='color:red'>".$_SESSION['fname_null']."</strong>":'';unset($_SESSION['fname_null'])?>
                  </div>
                  <div class="mb-3 form-group">  
                    <label class="form-label input-info-text">Last Name</label>
                    <input type="text" name="lname" value="<?=isset($_SESSION['lname'])?$_SESSION['lname']:'';unset($_SESSION['lname'])?>" class="form-control ">
                    <?php echo isset($_SESSION['lname_null'])?"<i style='color:red'>".$_SESSION['lname_null']."</i>":''?>
                  </div>
                <div class="mb-3 form-group">
                    <label class="form-label input-info-text">User Name</label>
                    <input type="text" name="uname" value="<?=isset($_SESSION['uname'])?$_SESSION['uname']:'';unset($_SESSION['uname'])?>" class="form-control ">
                    <?php echo isset($_SESSION['uname_null'])?"<i style='color:red'>".$_SESSION['uname_null']."</i>":''?>
                  </div>
                  <div class="mb-3 form-group">
                    <label class="form-label input-info-text">Email</label>
                    <input type="text" name="email" value="<?=isset($_SESSION['email'])?$_SESSION['email']:'';unset($_SESSION['email'])?>" class="form-control ">
                    <?php echo isset($_SESSION['email_null'])?"<i style='color:red'>".$_SESSION['email_null']."</i>":'';unset($_SESSION['email_null'])?>
                    <?php echo isset($_SESSION['email_exist'])?"<i style='color:red'>".$_SESSION['email_exist']."</i>":'';unset($_SESSION['email_exist'])?>
                  </div>
                  <div class="mb-3 form-group">
                    <label class="form-label input-info-text">Password</label>
                    <input type="text" name="password" value="<?=isset($_SESSION['password'])?$_SESSION['password']:'';unset($_SESSION['password'])?>" class="form-control ">
                    <?php echo isset($_SESSION['pass_null'])?"<i style='color:red'>".$_SESSION['pass_null']."</i>":'';unset($_SESSION['pass_null'])?>
                  </div>
                    <!-- <label class="form-label">User Role</label> -->
                  <div class="mb-3 form-group">
                      <select class="form-select form-control " name="user_role" value="<?=isset($_SESSION['user_role'])?$_SESSION['user_role']:''?>" aria-label="Disabled select example" >
                        <option selected disabled>select User Role</option>
                        <option value="0">Edditor</option>
                        <option value="2">Moderator</option>
                        <option value="1">Admin</option>
                      </select>
                      <?php echo isset($_SESSION['user_role_null'])?"<i style='color:red'>".$_SESSION['user_role_null']."</i>":'';unset($_SESSION['user_role_null'])?>
                  </div>
                 
              
                  <button type="submit" name="submit" class="btn btn-primary mb-5 form-control auth-btn">Submit</button>
            </form>
        </div>
      </div>
    </div>


  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->




<?php
require_once "../inc/partial/footer.php";

?>