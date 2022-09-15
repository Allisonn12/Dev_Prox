<?php

  include 'objects.php';
  include 'config.php';


// Create function to calculate age
function calculate_age(){
  $dob = $_POST['dob'];
  $user_age = date_diff(date_create($dob), date_create(date("Y/m/d")));
  return $user_age->format("%Y years");
}


//  Insert variables in csv file
if (isset($_POST['write'])){
  $username = $_POST['username'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];
  $file = new get_objects();
  try{
    if (!$file->write_form_to_csv($username, $lname, calculate_age(), $dob)){
      echo "<script>alert('Successfully wrote to CSV file')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }else{
      echo "Not inserted";
    }
  }catch(Exception $e){
    $err = $e->getMessage();
  }
}

// Call values from array and insert them inside the CSV file
if (isset($_POST['array'])){
  $username = $_POST['username'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];
  $file = new get_objects();
  $file->Write_array_to_csv();

}

// Open CSV file and insert open data into database table
if (isset($_POST['read'])){
  $file = new get_objects();
  if ($file->read_csv()){
     echo "<script>alert('Successfully wrote to CSV file')</script>";
     echo "<script>window.open('../index.php','_self')</script>";
  }else{
     echo mysqli_error($db);
  }
}



// Insert the entire csv file into database, Then move it to a folder called
// datbase_uploads
if (isset($_POST['insert'])){
  $target = "../database_uploads/".basename($_FILES['csv_file']['name']);
  $csv_file = $_FILES['csv_file']['name'];
  if (move_uploaded_file($_FILES['csv_file']['tmp_name'],$target)){
    $sql = $db->query("INSERT INTO file_imports(file) VALUE('$csv_file')");
    if ($sql){
      echo "<script>alert('Successfully Submitted file to database')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }else{
      echo "Error: ".$db;
    }
  }


}

