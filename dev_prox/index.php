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
        <h1>Insert data in CSV / Database</h1>
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
              <label for="">Insert CSV File in Database</label>
              <input type="file" name="csv_file">
              <input type="submit" name="insert" title="Send the whole CSV file to database" value="Insert ">
            </div>

            <input type="submit" title="Write the values and store inside the database" name="submit" value="Write">
            <input type="submit"  name="read" value="Read">
            <input type="submit" name="combine" value="Combine">
        </div>
      </div>
    </form>


    <!--
    https://github.com/Allisonn12/Dev_Prox.git
   -->

  </body>
</html>
