<?php
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
  try{
    $file->wite_to_csv($username, $lname, calculate_age(), $dob);
  }catch(Exception $e){
    $err = $e->getMessage();
  }
}



// Open CSV file and insert open data into database table
if (isset($_POST['read'])){
  $file = new get_objects();
  $file->read_csv();
}



// Insert the entire csv file into database, Then move it to a folder called
// datbase_uploads
if (isset($_POST['insert'])){
  $target = "../database_uploads/".basename($_FILES['csv_file']['name']);
  $csv_file = $_FILES['csv_file']['name'];
  if (move_uploaded_file($_FILES['csv_file']['tmp_name'],$target)){
    $sql = $db->query("INSERT INTO inports(file) VALUE('$csv_file')");
    if ($sql){
      echo "Inserted";
    }else{
      echo "Propblem";
    }
  }


}
// if (isset($_POST['combine'])){
//   $file = new get_objects();
//   $file->arrayCom();
// }
