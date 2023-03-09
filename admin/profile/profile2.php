<?php
session_start();
require_once "../inc/partial/header.php";
require_once "../inc/partial/config.php";
$sql=$conn->prepare("SELECT * FROM users WHERE id={$_SESSION['id']}");
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
        <!-- row -->
      <div class="container-fluid">
          <form class="col-6 m-auto" action="profile_post.php" method="post" enctype="multipart/form-data">
                <div class="upload">
                  <img src="../dashboard_assets/images/profile/<?=$profile['profile_pic'];?>" alt="" id="image" >
                  <div class="rightRound" id="upload">
                    <input type="file" name="fileImg" id="fileImg" accept=".jpeg, .jpg, .png">
                    <input type="hidden" name="old_image" value="<?=$profile['profile_pic'];?>">
                    <i class="fa fa-camera"></i>
                  </div> 
                </div>
                  <h3 class="text-center mt-2"><?=$profile['uname']?></h3>
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
<!--**********************************
    Content body end
***********************************-->



<?php
require_once "../inc/partial/footer.php";
?>

<!-- script for service update popup modal  -->
<script>
  $(document).ready(function(){
    $('.serviceupdate').on('click',function(){
      $('#updateservice').modal('show');

      $tr = $(this).closest('tr');

		  var data= $tr.children("td").map(function(){
			return $(this).text();
      }).get();
      console.log(data);
      $('#update_id').val(data[1]);
      $('#service_icon').val(data[2]);
      $('#service_title').val(data[4]);
      $('#description').val(data[5]);
    
    });
  });
</script>
<script type="text/javascript"> 
    document.getElementById("fileImg").onchange = function(){
    document.getElementById("image").src = URL.createObjectURL(fileImg.files[0])//preview new img
    // document.getElementById("cancel").style.display="block";
    // document.getElementById("confairm").style.display="block";
    document.getElementById("fileImg").style.display="none";
  }
</script>
