<?php
require_once "./inc/partial/header.php";
require_once "./inc/partial/config.php";

// user 
$sql=$conn->prepare("SELECT * FROM users ");
$sql->execute();
$users=$sql->fetchAll(PDO::FETCH_ASSOC);


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
          <h5>Blank Page</h5>
          <p>This is a starter page</p>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    <!-- ########## END: MAIN PANEL ########## -->



<?php
require_once "./inc/partial/footer.php";
?>
