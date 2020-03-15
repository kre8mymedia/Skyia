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
      <a class="navbar-brand" href="/skyia">Skyia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="/skyia/local-address-book.php">Local Addresses</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              File Types
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="skyia/jpg.php">JPG</a>
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
      <h2>Skyia Address Book</h2>
      <p>Your locally save addresses.</p>
        <!-- <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Repo Address</label>
            <a onClick="onClick()" href="#box-stuff">Box Fetch</a>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Everything remains on the client.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
      </div>
      
      <div class="col-sm-8">
        <div class="card border-dark mb-3">
          <div class="card-header">Use window to return PHP output</div>
          <div class="card-body text-dark">
            <h5 class="card-title">Local Addresses</h5>
            <?php 
            $address_book = file_get_contents('address_book.json');
            echo "<pre>". $address_book . "</pre>";
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