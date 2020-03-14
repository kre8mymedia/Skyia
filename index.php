<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Skyia</title>
</head>
<body>
  <div class="px-0 container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Skyia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="/local-address-book.php">Local Addresses</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              File Types
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">JPG</a>
              <a class="dropdown-item" href="#">PNG</a>
              <a class="dropdown-item" href="#">PDF</a>
              <a class="dropdown-item" href="#">JSON</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div style="margin-top: 80px;" class="container">
    <div class="row">
      
      <div class="col-sm-4">
        <h1>Welcome to Skyia!</h1>
        <p>What would you like to do?</p>

        <form action="index.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Repo Address</label>
            <input name="skyia_address" type="url" class="form-control" id="exampleInputUrl" placeholder="https://siasky.net/..." aria-describedby="urlHelp">
            <small id="urlHelp" class="form-text text-muted">Everything remains on the client.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="form-group">
            <label for="exampleInputFileType">File Type</label>
            <input name="file_type" type="text" class="form-control" id="exampleInputFileType">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      
      <div class="col-sm-8">
        <div class="card border-dark mb-3">
          <div class="card-header">Use window to return PHP output</div>
          <div class="card-body text-dark">
            <h5 class="card-title">Get Decrypted Files</h5>
            <?php 
            require_once('json/download/decrypt.php');

            if(!isset($_POST['skyia_address'])) {
              echo "<p><b>Enter an address!</b></p><br>";
              echo null;
            } else {
              $url = $_POST['skyia_address'];
              echo "<p><b>Successfully Pulled Repo Address: </b>" . $url . "</p>";
            }
            
            if(!isset($_POST['password'])) {
              echo "<p><b>Enter a password!</b></p><br>";
            } else {
              $decryption_key = $_POST['password'];
              echo "<p><b>Password Used: </b><br>" . $decryption_key . "</p>";
            }

            if(!isset($_POST['file_type'])) {
              echo "<p><b>Enter a file type!</b></p><br>";
            } else {
              $file_type = $_POST['file_type'];
              echo "<p><b>File Type Used: </b><br>" . $file_type . "</p>";
            }

            $encryted_str = "";
            $encrypt_arr = [];

            // Get encrypted string contents
            if(isset($url)) {
              $encryted_str = file_get_contents($url);

              // Explode string to an array at commas
              $encrypt_arr = explode(",", $encryted_str);

              // Remove extra from end (created by last comma)
              array_pop($encrypt_arr);
            }

            $i = 0;
            $ciphering = "AES-128-CTR";
            $decryption_iv = "1234567891011121";
            $options = 0;
            foreach ($encrypt_arr as $key => $encryption) {
            
              $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

              // echo "Decrypted string: " . $decryption . "\n";
              $file = base64_decode($decryption);
              $i++;
              $my_time = time() + $i;
              echo "<b>". $file_type . "/download/files/". $my_time . "_data." . $file_type . "</b><br>";
              echo "File String Length: " . file_put_contents($file_type . "/download/files/". $my_time . "_data." . $file_type, $file) . "<br>";
            }
            ?>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>