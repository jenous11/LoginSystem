<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <form action="includes/insert.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <br>
            <br>
            username:
            <input type="text"  name="username" placeholder="enter your name">
            <br>
            <br>
            email:
            <input type="email"  name="email" placeholder="enter your email">
            <br>
            <br>
            password:
            <input type="password" name="password"placeholder="enter your password">
            <br>
            <br>
            <input type="submit" placeholder="signup">
            or 
          </div>
        </form>
        <a href="login.php"><button>login</button> </a>

    <!-- form action  -->
<!-- bootstrap hanna parxa ramro banauna  esma!! -->
    <!-- <form>
  <div class="mb-3">
    <input type="username" class="form-control" id=" usernameInput ">
  </div>
  <div class="mb-3">
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

 -->



</body>
</html>