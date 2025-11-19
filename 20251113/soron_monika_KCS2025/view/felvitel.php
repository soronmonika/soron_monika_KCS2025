<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Felvitel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>
<body>

<?php
  include_once("base/navbar.html")
?>

<div class="container my-4">
  <div class="row">
    <div class="col-12">
      <h1>Termék leadási lap</h1>

            <form action="../controller/controller.php" method="post">
              <input type="hidden" name="felvitel" id="felvitel">

                      <div class="form-group my-2">
                        <label class="form-label" for="seid">Szériaszám</label>
                        <input class="form-control" require type="text" name="seid" id="seid">
                      </div>

                      <div class="form-gruop my-2">
                        <label class="form-label" for="manufacturer">Gyártó</label>
                        <input class="form-control" type="text" require name="manufacturer" id="manufacturer">
                      </div>

                      <div class="form-group my-2">
                        <label class="form-label" for="model">Típus</label>
                        <input class="form-control" type="text" name="model" id="model">
                      </div>

                      <div class="form-group my-2">
                        <label class="form-label" for="name">Kapcsolati Név</label>
                        <input class="form-control" type="text" name="name" id="name">
                      </div>

                      <div class="form-group my-2">
                        <label class="form-label" for="phone">Telefon</label>
                        <input class="form-control" type="number" name="phone" id="phone">
                      </div>

                      <div class="form-group my-2">
                        <label class="form-label" for="email">E-mail cím</label>
                        <input class="form-control" type="email" name="email" id="email">
                      </div>

                      <div class="form-group my-2">
                        <input type="submit" name="Felvitel" class="btn btn-success w-100 my-2">
                      </div>
                  </form>
              </div>
          </div>
      </div>

<?php
  include_once("base/footer.html")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
