<?php
require_once "../inc/partial/header.php";
require_once "../../vendor/autoload.php";
use pondit\calculator\Calculator;

$num1=$_POST['number1']?? null;
$num2=$_POST['number2']?? null;

$calObj= new Calculator($num1,$num2);

if($_SERVER['REQUESR_METHOD']=='POST'){
  if($_POST['cal']=="+"){
  
  $result= $calObj->sum(); 
  
}elseif($_POST['cal']=="-"){
  
  $result= $calObj->sub(); 
  
}elseif($_POST['cal']=="*"){
    $result= $calObj->multi(); 
  }
  elseif($_POST['cal']=="/"){
    
    $result= $calObj->div(); 
  }

}
//  echo $result;

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
      <h5>Calculator</h5>
    </div><!-- sl-page-title -->
            <div class="col-md-6 m-auto">
          <div class="card">
              <div class="card-header bg-warning">
                  <h3> Calculator</h3>
              </div>
              <div class="card-body">
              <form action="" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Numer 1</label>
                      <input type="text" class="form-control" name="number1" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Numer 2</label>
                      <input type="text" class="form-control" name="number2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    
                    <div class="d-flex justify-content-center">
                    <button type="submit" name="cal" value="+" style="border-radius:5px" class="btn btn-primary mx-2">+</button>
                    <button type="submit" name="cal"  value="-" style="border-radius:5px" class="btn btn-secondary mx-2">-</button>
                    <button type="submit" name="cal" value="*" style="border-radius:5px" class="btn btn-info mx-2">X</button>
                    <button type="submit" name="cal" value="/" style="border-radius:5px" class="btn btn-warning mx-2">/</button>
                    </div>
                  </form>
              </div>
              <div class="card-footer">
                <h3><Strong class="text-warning">Result:  </Strong ><?php echo $result?? ''?></h3>

              </div>
          </div>
      </div>
    </div>


  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->




<?php
require_once "../inc/partial/footer.php";

?>