<?php
session_start();
require_once "../inc/partial/header.php";
require_once "../../vendor/autoload.php";
use pondit\DB;

$DB=  new DB;
$table="sub_categories";
$condition=[
  'return_type'=>'all'
];
$result=$DB->getRows($table,$condition);
?>

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
  <a type="button" href="./add_subcategory.php" class="btn btn-dark">Add New</a>
    <div class="sl-page-title">
    </div><!-- sl-page-title -->
    <div class="table-responsive">
      <table class="table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($result as $key=>$value):?>
          <tr id=tr_<?=$value['id']?>>
            <td scope="row"><?=++$key?></td>
            <td scope="row"><?=$value['name']?></td>
            <td scope="row"><?=$value['description']?></td>
            <td><a href="update_category.php?id=<?=$value['id']?>" class="btn btn-primary active">Update</a>
            <a class="btn btn-info " >View</a>

              <button  type="button" class="btn btn-danger active subcategory-delete" value="<?=$value['id']?>" style="border-radius:3px">Delete</button>

            </td>
          </tr>
        <?php endforeach?>  
        </tbody>
      </table>
    </div>
    



  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->



<?php
require_once "../inc/partial/footer.php";

?>
<script>

$('.subcategory-delete').click(function(e){
    e.preventDefault();

    var subcategory_id = $(this).val();
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
            url:'./subcategory_delete.php',
            data: {
              'subcategory_id': true,
              'subcategory_id': subcategory_id,
            },
            success: function(response){
            }
            
          
          });
          
          $('#tr_'+subcategory_id).hide(2000);
        }
      })



});
</script>
