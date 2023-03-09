<?php
session_start();
require_once "../inc/partial/header.php";
require_once "../inc/partial/config.php";
$sql=$conn->prepare("SELECT * FROM users WHERE id={$_SESSION['id']}");
$sql->execute();
$profile=$sql->fetch(PDO::FETCH_ASSOC);

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
      <h5>Your Profile </h5>
    </div><!-- sl-page-title -->
    <div class="col-md-6 m-auto">
          <div class="card">
            
              <div class="card-body">
                <form class="col-6 m-auto" action="profile_post.php" method="post" enctype="multipart/form-data">
                <div class="upload">
                  <img src="../dashboard_assets/images/profile/<?=$profile['img'];?>" alt="" id="image" >
                  <div class="rightRound" id="upload">
                    <input type="file" name="fileImg" id="fileImg" accept=".jpeg, .jpg, .png">
                    <input type="hidden" name="old_image" value="<?=$profile['img'];?>">
                    <i class="fa fa-camera"></i>
                  </div> 
                </div>
                  <h5 class="text-center mt-2"><?=$profile['uname']?></h5>
                <div class="form-group">
                  <input class="form-control form-control-lg" type="hidden" name="id" value="<?=$profile['id']?>" aria-label=".form-control-lg example">
                  <input class="form-control form-control-lg " type="text" name="name" value="<?=$profile['uname']?>" aria-label=".form-control-lg example">
                  <div id="emailHelp" class="form-text input-info-text text-danger">
                    <?php if(isset($_SESSION['name_null'])){
                      echo $_SESSION['name_null'];
                    
                    }unset($_SESSION['name_null']);?>
                    </div>
                </div>
                <div class="form-group">
                  <input class="form-control " type="text" name="email" value="<?=$profile['email']?>" aria-label="default input example">
                  <div id="emailHelp" class="form-text input-info-text text-danger">
                    <?php if(isset($_SESSION['email_null'])){
                      echo $_SESSION['email_null'];
                    }unset($_SESSION['email_null']);?>
                    </div>
                </div>
                <div class="form-group">
                  <input class="form-control form-control-sm " type="password" name="old_pass" placeholder="Old password"aria-label=".form-control-sm example">
                  <div id="emailHelp" class="form-text input-info-text text-danger">
                    <?php if(isset($_SESSION['old_pass_null'])){
                      echo $_SESSION['old_pass_null'];
                    
                    }unset($_SESSION['old_pass_null']);?>
                    </div>
                </div> 
                <div class="form-group">
                  <input class="form-control form-control-sm " type="password" name="new_pass" placeholder="New password"aria-label=".form-control-sm example">
                  <div id="emailHelp" class="form-text input-info-text text-danger">
                    <?php if(isset($_SESSION['new_pass_null'])){
                      echo $_SESSION['new_pass_null'];
                    
                    }unset($_SESSION['new_pass_null']);?>
                    </div>
                </div>
                <div class="form-group">
                
                <button type="submit" class="bg-secondary form-control"style="">Update</button>
                </div> 
          </form>
              </div>
          </div>
    </div>


  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->




<?php
require_once "../inc/partial/footer.php";

?>