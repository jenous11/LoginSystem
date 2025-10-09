<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body >
  <div class=" d-grid justify-content-center">
  <form action="includes/insert.php" method="post" class="d-grid justify-content-center">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <br><br>
      username:
      <input type="text" name="username" placeholder="enter your name">
      <br><br>
      email:
      <input type="email" name="email" placeholder="enter your email">
      <br><br>
      password:
      <input type="password" name="password" placeholder="enter your password">
      <br><br>
      <input type="submit" placeholder="signup">
      or
      <br>
    </form>
    <a href="login.php"><button>login</button> </a>
    </div>
</body>

</html>