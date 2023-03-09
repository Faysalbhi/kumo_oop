<?php
require_once "../inc/partial/header.php";
$dbname="mysql:host=localhost;dbname=pondit";
$username="root";
$password='';
$conn=new PDO($dbname,$username,$password);

$sql=$conn->prepare("SELECT * FROM categories ");

$sql->execute();
$category=$sql->fetchAll(PDO::FETCH_ASSOC);

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
      <h5>Add SubCategory</h5>
      <p>This is a starter page</p>
    </div><!-- sl-page-title -->
    <div class="row">
    
      <div class="card bg- col-md-8 m-auto ">
        <div class="card-body ">
                 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New SubCategory</h6>
          <form action="add_subcategory_post.php" method="POST">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">SubCategory Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter Subcategory Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select name="category_id" id="" class="form-control">
                    <option value="" selected disabled>Select Category</option>
                  <?php foreach($category as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?php endforeach?>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Enter Description"></textarea>
                </div>
              </div><!-- col-4 -->
             
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
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