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
          <form class="form-horizontal" role="form" id="guest-form" method="post" action="form.php" enctype="multipart/form-data">
            <div class="form-group form-group-lg">
              <label class="col-sm-2 control-label" for="lg">Nama Lengkap</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="lg" id="nama" name="nama">
              </div>
            </div>
            <div class="form-group form-group-sm">
              <label class="col-sm-2 control-label" for="sm">Email</label>
              <div class="col-sm-10">
                <input class="form-control" type="email" id="sm" id="email" name="email">
              </div>
            </div>
            <div class="form-group form-group-sm">
              <label class="col-sm-2 control-label" for="sm">Tanggal Datang</label>
              <div class="col-sm-10">
                <input class="form-control" type="date" id="sm" id="tanggal" name="tanggal">
              </div>
            </div>
            <div class="form-group form-group-sm">
              <label class="col-sm-2 control-label" for="sm">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="comment" id="alamat" name="alamat"></textarea>
              </div>
            </div>
            <div class="form-group form-group-sm">
              <label class="col-sm-2 control-label" for="sm">Jenis Kelamin</label>
              <div class="col-sm-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki"> Laki-Laki
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan"> Perempuan
                  </label>
                </div>
              </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary"/>
          </form>
          <?php
            $host = "lclocuddb.database.windows.net";
            $user = "forderation";
            $pass = "321Aripmuzaki";
            $db = "LCloudDB";
            try {
              $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
              $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch(Exception $e) {
                echo "Failed: " . $e;
            }
      
            if (isset($_POST['submit'])) {
              try {
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $job = $_POST['job'];
                  $date = date("Y-m-d");
                  // Insert data
                  $sql_insert = "INSERT INTO Registration (name, email, job, date) 
                              VALUES (?,?,?,?)";
                  $stmt = $conn->prepare($sql_insert);
                  $stmt->bindValue(1, $name);
                  $stmt->bindValue(2, $email);
                  $stmt->bindValue(3, $job);
                  $stmt->bindValue(4, $date);
                  $stmt->execute();
              } catch(Exception $e) {
                  echo "Failed: " . $e;
              }
              echo "<h3>Your're registered!</h3>";
            }
          ?>
        </article>
      </div>
    </div>
  </div>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>