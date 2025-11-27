<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Főoldal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/KCS_202507/F29_2025_11_13_Belsős_Vizsga/20251113/soron_monika_KCS2025/view/styles.css">

</head>

<body>

<?php include_once("base/navbar.html"); ?>

<div class="container my-4">
<h1 class="mb-4 title-anim">Szervíz összesítő lap</h1>

  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>Szériaszám</th>
        <th>Gyártó</th>
        <th>Típus</th>
        <th>Név</th>
        <th>Telefon</th>
        <th>Email</th>
        <th>Státusz</th>
        <th>Utolsó frissítés</th>
      </tr>
    </thead>

    <tbody>


<?php
$bscolors = [
    'Beérkezett' => "table-info",
    'Hibafeltárás' => "table-danger",
    'Alkatrész beszerzés alatt' => "table-warning",
    'Javítás' => "table-primary",
    'Kész' => "table-success"
];
?>

<?php foreach ($adatok as $item): ?>

<?php
$status = trim($item["Status"]);
$colorClass = $bscolors[$status] ?? "";
?>

<tr class="<?php echo $colorClass; ?>">
    <td><?php echo $item["SEID"]; ?></td>
    <td><?php echo $item["Manufacturer"]; ?></td>
    <td><?php echo $item["Model"]; ?></td>
    <td><?php echo $item["Name"]; ?></td>
    <td><?php echo $item["Phone"]; ?></td>
    <td><?php echo $item["Email"]; ?></td>
    <td><?php echo $item["Status"]; ?></td>
    <td><?php echo $item["lastupdate"]; ?></td>
</tr>

<?php endforeach; ?>
</tbody>
    </tbody>
  </table>
</div>

<?php include_once("base/footer.html"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
