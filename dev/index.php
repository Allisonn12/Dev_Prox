<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DEV PROX</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <form class="" action="inc/function.php" method="post" enctype="multipart/form-data">
      <div class="main">
        <h1>Please fill out the form</h1>
        <p>
          <?php
            if (isset($_POST['error'])){
              echo $error;
            }
           ?>
        </p>
        <div class="input-field">
          <label for="">First Name</label>
          <input type="text" name="username" placeholder="Name">
        </div>
        <div class="input-field">
          <label for="">Last Name</label>
          <input type="text" name="lname" placeholder="Surname">
        </div>
        <div class="input-field">
          <label for="">Date of Birth</label>
          <input type="date" name="dob">
        </div>
        <div class="input-field">
          <label for="">Choose CSV File To Send To Table</label>
          <input type="file" name="csv_file">
        </div>

        <input type="submit" name="submit" value="Write">
        <input type="submit" name="insert" value="Insert">
      </div>
    </form>

  </body>
</html>
