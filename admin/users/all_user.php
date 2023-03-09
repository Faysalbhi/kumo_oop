<?php
session_start();
require_once "../inc/partial/header.php";
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB=  new DB;
$table="users";
$condition=[
  'return_type'=>'all'
];
$result=$DB->getRows($table,$condition);

?>






<div class="row">
  <div class="col-6">
    <!-- Modal -->

<div class="modal fade" id="updateservice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:600px" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="update_user_post.php" method="post">
      <div class="modal-body">
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
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!-- end update model  -->

  </div>
</div>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>





  <div class="sl-pagebody">
    <?php if(isset($_SESSION['add'])){?>
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
          <span><strong>Well done!</strong> <?=$_SESSION['add']?></span>
        </div><!-- d-flex -->
      </div><!-- alert -->
    <?php unset($_SESSION['add']); }?>

    <?php if(isset($_SESSION['update'])){?>
     
      <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
          <span><strong>Heads up!</strong> <?=$_SESSION['update']?></span>
        </div><!-- d-flex -->
      </div>

    <?php unset($_SESSION['update']); }?>
    
    <?php if(isset($_SESSION['delete'])){?>
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
          <i class="icon ion-ios-close alert-icon tx-24"></i>
          <span><strong>Oh snap!</strong>  <?=$_SESSION['delete']?></span>
        </div><!-- d-flex -->
      </div>
    <?php unset($_SESSION['delete']); }?>
  <div class="sl-pagebody">
  <a type="button" href="add_user.php" class="btn btn-dark">Add New</a>
    <div class="sl-page-title">
    </div><!-- sl-page-title -->
    <div class="table-responsive">
      <table class="table table-success table-striped">
          <thead>
            <th>id</th>
            <th>User Name</th>
            <th>Profile</th>
            <th>Email</th>
            <th>User Role</th>
            <th>Action</th>
          </thead>
          <tbody>
        <?php foreach($result as $key=>$users):?>
          <tr id="tr_<?=$users['id']?>">
            <td><?=$key+1?></td>
            <td><?=$users['uname']?></td>
            <td><img  width="40px" height="40px" style="border-radius:1px 3px 1px 3px" src="./uploads/<?=$users['img']?>" alt="profile"></td>
            <td><?=$users['email']?></td>
            <td><?=$users['user_role']==1?"Admin":"Moderator"?></td>
            <td>
            <button class="btn-sm btn-info serviceupdate"><i style=" color:blue; font-size:18px; box-shadow:none;" class="fa fa-pencil"></i></button>
            <button class="btn-sm btn-warning user-delete " value="<?=$users['id']?>"><i style=" color:red; font-size:18px;box-shadow:none;" class="fa fa-trash"></i></button>
            </td>   
          </tr> 
        <?php endforeach;?>  
          </tbody>
      </table>
    </div>
    



  </div><!-- sl-pagebody -->
  
<!-- ########## END: MAIN PANEL ########## -->



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

<script>

$('.user-delete').click(function(e){
    e.preventDefault();

    var user_id = $(this).val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'post',
            url:'user_delete.php',
            data: {
              'user_id': true,
              'user_id': user_id,
            },
            success: function(response){
            }
            
          
          });
          
          $('#tr_'+user_id).hide(2000);
        }
      })



});
</script>
