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
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nama Lengkap</th>
                <th>Nama Email</th>
                <th>Alamat</th>
                <th>Tanggal Datang</th>
                <th>Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Andi Purnomo</td>
                <td>andy@umm.ac.id</td>
                <td>Teknik Informatika</td>
                <td>
                  <button type="button" class="btn btn-info">Edit</button>
                  <button type="button" class="btn btn-success">Detail</button>
                  <button type="button" class="btn btn-danger">Hapus</button>
                </td>
              </tr>
              <tr>
                <td>Bagus Wardana</td>
                <td>bagus@umm.ac.id</td>
                <td>Teknik Informatika</td>
                <td>
                  <button type="button" class="btn btn-info">Edit</button>
                  <button type="button" class="btn btn-success">Detail</button>
                  <button type="button" class="btn btn-danger">Hapus</button>
                </td>
              </tr>
              <tr>
                <td>Mabadi'ul Hasan</td>
                <td>hasan@umm.ac.id</td>
                <td>Teknik Informatika</td>
                <td>
                  <button type="button" class="btn btn-info">Edit</button>
                  <button type="button" class="btn btn-success">Detail</button>
                  <button type="button" class="btn btn-danger">Hapus</button>
                </td>
              </tr>
            </tbody>
          </table>
          <?php
          $host = "<Nama server database Anda>";
          $user = "<Nama admin database Anda>";
          $pass = "<Password admin database Anda>";
          $db = "<Nama database Anda>";
          try {
            $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (Exception $e) {
            echo "Failed: " . $e;
          }
          try {
            $sql_select = "SELECT * FROM Registration";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll();
            if (count($registrants) > 0) {
              echo "<table class=\"table table-striped\">";
              echo "<thead><tr><th>Name</th>";
              echo "<th>Email</th>";
              echo "<th>Job</th>";
              echo "<th>Date</th></tr></thead>";
              echo "<tbody>";
              foreach ($registrants as $registrant) {
                echo "<tr><td>" . $registrant['name'] . "</td>";
                echo "<td>" . $registrant['email'] . "</td>";
                echo "<td>" . $registrant['job'] . "</td>";
                echo "<td>" . $registrant['date'] . "</td></tr>";
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