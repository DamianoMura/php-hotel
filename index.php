<?php
$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];
$filtered_hotels = [];
//lets see what parameters we got from GET
// foreach ($_GET as $key => $value) {
//   echo "$key : $value<br>";
// }
//filters loaded at runtime from GET params
$parking = false;
$vote = 0;
if (isset($_GET['parking'])) {
  $parking = $_GET['parking'] === 'true' ? true : false;
}
if (isset($_GET['vote'])) {
  $vote = $_GET['vote'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotels</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12 p-3">
        <h1 class=" text-center">Hotel list</h1>
        <form action=" ./index.php" method="get">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="parking" value="true" name="parking" <?php if ($parking) echo 'checked' ?>>
                  <label class="form-check-label" for="parking">
                    Private Parking
                  </label>
                </div>
              </div>
              <div class="col-4">
                <label for="vote" class="form-label">Vote</label>
                <input type="range" class="form-range" min="1" max="5" id="vote" value=<?php echo $vote ?> name="vote">
              </div>
              <div class="col-4">
                <button class="btn text-center" type="submit">set filters</button>
              </div>
            </div>
          </div>




        </form>

      </div>
      <div class=" col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Parking</th>
              <th scope="col">Vote</th>
              <th scope="col">Distance to center</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($filtered_hotels as $hotel) {
            ?>
              <tr>
                <td><?php echo $hotel['name'] ?></td>
                <td><?php echo $hotel['description'] ?></td>
                <td><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
                <td><?php
                    for ($x = 0; $x < $hotel['vote']; $x++) {
                      echo "<i class='fa-solid fa-star'></i>";
                    }
                    ?></td>
                <td><?php echo $hotel['distance_to_center'] ?> km</td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script>
      const handleChange = (e) => {
        e.preventDefault();


      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  </div>



</body>

</html>