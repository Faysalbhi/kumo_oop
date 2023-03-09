<?php

require_once "../inc/partial/header.php";
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="products";
$data=[
  'return_type'=>"single",
  'where'=>[
      'id'=>$_GET['id']
      ],
];
$product=$DB->getRows($table,$data);



// // select  category 
$DB->sqlAll("SELECT * FROM categories");
$category=$DB->result;



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
      <h5>Update Product</h5>
      <p>This is a starter page</p>
    </div><!-- sl-page-title -->
    <div class="row">
    
      <div class="card bg- col-md-8 m-auto ">
        <div class="card-body ">
                 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product </h6>

          <div class="form-layout">
          <form action="updatee_product_post.php" method="POST">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="<?=$product['name']?>" name="name"  placeholder="Enter Product Name">
                  <input class="form-control" type="hidden" value="<?=$_GET['id']?>" name="id"  placeholder="Enter Product Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="<?=$product['price']?>" name="price" placeholder="Enter Product Code">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-12">
                <div class="form-outline ">
                  <label class="form-control-label">Product description: <span class="tx-danger">*</span></label>
                  <textarea id="" class="form-control" cols="300" rows="100" value="<?=$product['description']?>" name="description" placeholder="Enter Product Descp"></textarea>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-select form-control" name="category_id" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php foreach($category as $cat):?>  
                    <option value="<?=$cat['id']?>" <?=($cat['id']==$product['category_name'])?'selected': ''?>><?=$cat['name']?></option>
                    <?php endforeach?>  
                  </select>
                </div>
              </div><!-- col-8 -->
              
            </div>

            <div class="form-layout-footer">
              <button  type="submit" name="submit" class="btn btn-info mg-r-5">Update</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
           </form> 
          </div><!-- form-layout -->
        </div>
      </div>
    </div>


  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->




<?php
require_once "../inc/partial/footer.php";

?>