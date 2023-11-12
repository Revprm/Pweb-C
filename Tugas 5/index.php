<?php
include("sqlcon.php");

$conn = dbconn();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tugas 5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</head>
<body>
  <section id="About">
      <div class="container-fluid text-center">
        <h1>Revy Pramana</h1>
        <figcaption class="blockquote-footer mt-2 text-light">
          <em>A keyboard enthusiast</em>
        </figcaption>
        <p class="fs-5"><em>5025221252</em></p>
      </div>
  </section>

  <div class="container rounded-5 p-5">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-responsive table-hover" id="tabel">
      <thead>
        <tr>
          <th scope="col" class="text-center">Artikel</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo '<tr>';
                  echo '<th scope="col" id="desc">';
                  echo '<a href="artikel.php?id=' . $row['id'] . '" target="_blank" style="text-decoration: none;">';
                  echo '<img class="img-responsive mw-100 mh-100 col-xl-6 col-md-12 p-2" width="475px" src="' . $row['image_url'] . '" alt="' . $row['judul'] . '">';
                  echo '<div class="col-xl-6 col-md-12 float-end ps-5 pt-4 pe-5 flex-column">';
                  echo '<h4>' . $row['judul'] . '</h4>';
                  echo '<p>' . $row['subjudul'] . '</p>';
                  echo '</div>';
                  echo '</a>';
                  echo '</th>';
                  echo '</tr>';
              }
          } else {
              echo '<tr><th scope="col" id="desc">No articles found</th></tr>';
          }
          $conn->close();
        ?>
      </tbody>
    </table>

    <div class="pagination float-end pt-1">
      <button id="prevPage" class="btn">Previous</button>
      <span id="pageInfo" class="pt-1 me-2 ms-2">Page 1</span>
      <button id="nextPage" class="btn">Next</button>
    </div>
  </div>

  <footer class="text-center pt-5">
    <figcaption class="blockquote-footer">
      <p>Tugas Pemrograman Web Jurusan Teknik Informatika ITS 2023</p>
      <p>5025221252, Revy Pramana, Dosen: Imam Kuswardayan, S.Kom, M.T</p>
    </figcaption>
  </footer>

</body>
</html>
