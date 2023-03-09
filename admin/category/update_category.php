<?php
require_once "../inc/partial/header.php";
require_once "../../vendor/autoload.php";
use pondit\DB;

$DB=  new DB;
$id=$_GET['id'];
$table='categories';
$condition=['where'=>['id'=>$id],'return_type'=>'single'];
$result=$DB->getRows($table,$condition)


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
          <h6 class="card-body-title">Update Category</h6>
          <form action="update_category_post.php" method="POST">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" value="<?=$result['name']?>" placeholder="Enter firstname">
                  <input class="form-control" type="hidden" name="id" value="<?=$result['id']?>" placeholder="Enter firstname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="description" value="<?=$result['description']?>" placeholder="Enter firstname">
                </div>
              </div><!-- col-4 -->
             
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>
    </div>


  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->




<?php
require_once "../inc/partial/footer.php";

?>