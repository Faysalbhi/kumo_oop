<?php
require_once "../inc/partial/header.php";

$dbname="mysql:host=localhost;dbname=pondit";
$username="root";
$password='';
$conn=new PDO($dbname,$username,$password);

// category 
$sql=$conn->prepare("SELECT * FROM categories");
$sql->execute();
$category=$sql->fetchAll(PDO::FETCH_ASSOC);

// sub category 
$sql=$conn->prepare("SELECT * FROM sub_categories");
$sql->execute();
$subcategory=$sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>

  <div class="sl-pagebody">
    <!-- <div class="sl-page-title">
      <h5>Add Product</h5>
      <p>This is a starter page</p>
    </div>sl-page-title -->
    <div class="row">
    
      <div class="card bg- col-md-12 m-auto ">
        <div class="card-body ">
          <h6 class="card-body-title">Add New Product</h6>
                 <div class="card pd-20 pd-sm-40">

          <div class="form-layout">
          <form action="add_product_post.php" method="POST" enctype="multipart/form-data">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  placeholder="Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" placeholder="Price">
                </div>
              </div><!-- col-4 -->
              
              
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-select form-control" id="category_id" name="category_id" aria-label="Default select example">
                    <option selected disabled>Select Category</option>
                    <?php foreach($category as $item):?>  
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?php endforeach?>  
                  </select>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-select form-control" id="subcategory_id" name="subcategory_id" aria-label="Default select example">
                    <option disabled selected>Select Category</option>
                    <?php foreach($subcategory as $item):?>  
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?php endforeach?> 
                  </select>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Product description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="description" id="summernote" cols="30" rows="10" placeholder="Enter Product Descp"></textarea>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Product Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" accept=".jpeg,.png, .webp" name="image" placeholder="Enter Product Descp">
                </div>
              </div><!-- col-8 -->
         
            </div><!-- row -->

            <div class="form-layout-footer">
              <button  type="submit" name="submit" class="btn btn-info mg-r-5">Submit Form</button>
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

<script>
$('#category_id').change(function(){
        var category_id=$(this).val();
        $.ajax({
          type:'POST',
          url:'getsubcategory.php',
          data:{'category_id':category_id},
          success:function(data){
              $('#subcategory_id').html(data);
              // alert(data);

          }
        
        })
});

$('#summernote').summernote({
  placeholder: 'Enter your Descripton',
  tabsize: 2,
  height: 100
});


</script>
