<?php


  class get_objects{

    private $names;
    private $surnames;
    private $age;
    private $initials;
    private $dob;
    private $error;
    private $csv;




    public function wite_to_csv($names, $surnames, $age, $dob){
      $error = '';
      $this->names = $names;
      $this->surnames = $surnames;
      $this->dob = $dob;
      $this->age = $age;


      // Use substring to select the first letter of the name and store as initials
      $initials = substr($names,0, 1);
      if (empty($names)){
        $error .= "<p>Please enter a name!!!</p>";
      }else{
        $names;
      }
      if (empty($surnames)){
        $error .= "<p>Please enter surname</p>";
      }else{
        $surname;
      }

      if ($error == ''){
        $file_open = fopen("../output/output.csv", "a");
        // Count number of rows in csv file
        $no_rows = count(file("../output/output.csv"));
        // Check to see duplicate ID numbers
        if ($no_rows > 1){
          // If duplicate values, increment number
          $no_rows = ($no_rows - 1) + 1;
        }
        // Create an array to appendd all data
        $data = array(
          "ID" => $no_rows,
          "Name" => $names,
          "Surname" => $surnames,
          "Initials" => $initials,
          "Age" => $age,
          "Date of Birth" => $dob
        );

        fputcsv($file_open, $data);
        $error = "<p>Successfully wrote data to CSV</p>";
        $names = '';
        $surnamesname = '';
        $dob = '';
      }
    }

    function clean_text($string){
      $string = trim($string);
      $string = stripslashes($string);
      $string = htmlspecialchars($string);
      return $string;
    }


    public function csv_import($csv){
      include 'config.php';
      $this->csv = $csv;
      $target = "../database_uploads/".basename($_FILES['csv_file']['name']);


      $filename = $_FILES["csv_file"]["name"];

      $stmt->$db->prepare("INSERT INTO csv_imports(file) VALUES('$filename')");
      $stmt->bind_param('s', $target);

      if (move_uploaded_file($_FILES["csv_file"]['tmp_name'], $target)){
        $result = $stmt->execute();

        if ($result){
          echo "<script>alert('Inserted')</script>";
        }else{
          echo mysqli_error($db);
          exit();
        }
      }
    }













  }
