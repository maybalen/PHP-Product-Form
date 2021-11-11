
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/form-validation.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include 'db/dbcon.php';
$conn = OpenCon();

if(isset($_POST['submit_btn']))
  {

$name = $_POST["name"];
$desc = $_POST["desc"];
$price = $_POST["price"];

$sql = "INSERT INTO test_products (name, description, price) VALUES ('$name', '$desc', '$price');";
$conn->query($sql);

unset($_POST);
?>
       <script>
        alert('Product has been saved, successfully');
        
       </script>
<?php


}

$rowcount = 0;
$sql = "SELECT * FROM test_products";
if ($result = mysqli_query($conn,$sql)) {
  $rowcount = mysqli_num_rows($result);
}


?>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Product List</h2>
      </div>

      <div class="row">

        <div class="col-md-8 order-md-1">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Product List</span>
            <span class="badge badge-secondary badge-pill"><?php print $rowcount ?></span>
          </h4>
          <ul class="list-group mb-3">
<?php
$sql = "SELECT * FROM test_products ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php print $row["name"];?></h6>
                <small class="text-muted"><?php print $row["description"];?></small>
              </div>
              <span class="text-muted">$<?php print number_format($row["price"],2,",","."); ?></span>
            </li>
<?php
  }
}
CloseCon($conn);
?>
          </ul>
        </div>

        <div class="col-md-4 order-md-2 mb-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Product</h4>
              <form method="POST" action="index.php" class="needs-validation" novalidate>
    
                <div class="mb-3">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder=""  required>
                  <div class="invalid-feedback">
                    Please enter product name.
                  </div>
                </div>
    
                <div class="mb-3">
                  <label for="desc">Description <span class="text-muted">(Optional)</span></label>
                  <input type="text" class="form-control" id="desc" name="desc" placeholder="">
                </div>
    
                <div class="mb-3">
                  <label for="price">Price</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="number" class="form-control" id="price" name="price" placeholder=""  required>
                    <div class="invalid-feedback" style="width: 100%;">
                      Please enter price.
                    </div>
                  </div>
                </div>

                <button class="mt-4 btn btn-primary btn-lg btn-block" type="submit" name="submit_btn">Submit</button>
    
              </form>
            </div>
          </div>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 MayMeelek</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
