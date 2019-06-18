<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUKU TAMU</title>
  <link type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="vendor/twbs/bootstrap/dist/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 header" id="site-header">
        <header>
          <h1 class="title-site">Buku Tamu</h1>
          <p class="description">Microsoft Cloud Azure Web & Database Implementation</p>
        </header>
        <nav class="menus">
          <ul>
            <li><a href="index.php">Rumah</a></li>
            <li><a href="form.php">Masukkan Data</a></li>
            <li><a href="tampilData.php">Tampilkan Data</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 articles" id="site-content">
        <article class="posts">
          <?php
          $host = "lclocuddb.database.windows.net";
          $user = "forderation";
          $pass = "321Aripmuzaki";
          $db = "LCloudDB";
          try {
            $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (Exception $e) {
            echo "Failed: " . $e;
          }
          try {
            $sql_select = "SELECT * FROM Guest";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll();
            if (count($registrants) > 0) {
              echo "<table class=\"table table-striped\">";
              echo "<thead><tr><th>Nama</th>";
              echo "<th>Email</th>";
              echo "<th>Alamat</th>";
              echo "<th>Jenis Kelamin</th>";
              echo "<th>Tanggal</th></tr></thead>";
              echo "<tbody>";
              foreach ($registrants as $registrant) {
                echo "<tr><td>" . $registrant['nama'] . "</td>";
                echo "<td>" . $registrant['email'] . "</td>";
                echo "<td>" . $registrant['alamat'] . "</td>";
                echo "<td>" . $registrant['jk'] . "</td>";
                echo "<td>" . $registrant['tanggal'] . "</td></tr>";
              }
              echo "</tbody>";
              echo "</table>";
            } else {
              echo "<h3>No one is currently registered.</h3>";
            }
          } catch (Exception $e) {
            echo "Failed: " . $e;
          }
          ?>
        </article>
      </div>
    </div>
  </div>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>