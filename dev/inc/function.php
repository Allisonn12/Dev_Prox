<?php

  // include 'object.php';
  // include 'append.php';
  include 'usecsv.php';
  include 'config.php';


// Create function to calculate age
function calculate_age(){
  $dob = $_POST['dob'];
  $user_age = date_diff(date_create($dob), date_create(date("Y/m/d")));
  return $user_age->format("%Y years");
}


//  Insert variables in csv file
if (isset($_POST['submit'])){
  $username = $_POST['username'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];

  $file = new get_objects();
  $file->wite_to_csv($username, $lname, calculate_age(), $dob);
}



// if (isset($_POST['insert'])){
//   $csv_file = $_POST['csv_file'];
//   $file = new get_objects();
//   try{
//     $file->csv_import($csv_file);
//   }catch (Exception $e){
//     $err = $e->getMessage();
//   }
// }
// if (isset($_POST['insert'])){
//   // $csv_file = $_POST['csv_file'];
//   $target = "../database_uploads/".basename($_FILES['csv_file']['name']);
//   $csv_file = $_FILES['csv_file']['name'];
//   if (move_uploaded_file($_FILES['csv_file']['tmp_name'],$target)){
//     $sql = $db->query("INSERT INTO inports(file) VALUE('$csv_file')");
//     if ($sql){
//       echo "Inserted";
//     }else{
//       echo "Propblem";
//     }
//   }
//
//
// }

if (isset($_POST['insert'])){
    $target = "../database_uploads/".basename($_FILES['csv_file']['name']);

    $csv_file = $_FILES['csv_file']['name'];

    $stmt->$db->prepare("INSERT INTO inports(file) VALUE(?)");
    $stmt->bind_param('s', $csv_file);

    if (move_uploaded_file($_FILES['csv_file']['tmp_name'],$target)){

      $sql = $stmt->execute();
      if ($sql){
        echo "Inserted";
      }else{
        echo "Propblem";
      }
  }


}



// if (isset($_POST[''])){
//
//   $username = $_POST['username'];
//   $lname = $_POST['lname'];
//   $dob = $_POST['dob'];
//   $file = new objects();
//
//   try{
//     if ($file->writeToCSVfile($username, $lname, $dob) === false){
//       echo 'Error opening the file ' . $filename;
//     }else{
//       echo "Successfully wrote to file";
//     }
//   }catch(Exception $e){
//     print($e);
//   }
// }
