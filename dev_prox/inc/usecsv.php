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

      $fnames = array(
        "0" => array(
          "Name" => "Names"
        ),
        "1" => array(
          "Name" => "Aiden"
        ),
        "2" => array(
          "Name" => "Chuck"
        ),
        "3" => array(
          "Name" => "Remy"
        ),
        "4" => array(
          "Name" => "Britney"
        ),
        "5" => array(
          "Name" => "Fred"
        ),
        "6" => array(
          "Name" => "Rae"
        ),
        "7" => array(
          "Name" => "Leslie"
        ),
        "8" => array(
          "Name" => "Darlene"
        ),
        "9" => array(
          "Name" => "Enoch"
        ),
        "10" => array(
          "Name" => "Carter"
        ),
        "11" => array(
          "Name" => "Lexi"
        ),
        "12" => array(
          "Name" => "Bree"
        ),
        "13" => array(
          "Name" => "Benjamin"
        ),
        "14" => array(
          "Name" => "Alexander"
        ),
        "15" => array(
          "Name" => "Bart"
        ),
        "16" => array(
          "Name" => "Winnie"
        ),
        "17" => array(
          "Name" => "Wade"
        ),
        "18" => array(
          "Name" => "Liam"
        ),
        "19" => array(
          "Name" => "Clint"
        ),
        "20" => array(
          "Name" => "Hlabi"
        )
      );
      $lname = array(
        "20" => array(
          "Surname" => "Surname"
        ),
        "1" => array(
          "Surname" => "Yang"
        ),
        "2" => array(
          "Surname" => "Glynn"
        ),
        "3" => array(
          "Surname" => "Knight"
        ),
        "4" => array(
          "Surname" => "Wilkinson"
        ),
        "5" => array(
          "Surname" => "Weasley"
        ),
        "6" => array(
          "Surname" => "Evans"
        ),
        "7" => array(
          "Surname" => "Parker"
        ),
        "8" => array(
          "Surname" => "Ianson"
        ),
        "9" => array(
          "Surname" => "Matthews"
        ),
        "10" => array(
          "Surname" => "Clifton"
        ),
        "11" => array(
          "Surname" => "Dempsey"
        ),
        "12" => array(
          "Surname" => "Hope"
        ),
        "13" => array(
          "Surname" => "Skinner"
        ),
        "14" => array(
          "Surname" => "Oakley"
        ),
        "15" => array(
          "Surname" => "Wilde"
        ),
        "16" => array(
          "Surname" => "Hepburn"
        ),
        "17" => array(
          "Surname" => "Norman"
        ),
        "18" => array(
          "Surname" => "Patel"
        ),
        "19" => array(
          "Surname" => "Jameson"
        ),
        "20" => array(
          "Surname" => "Norburn"
        )
      );

      $error = '';
      $this->names = $names;
      $this->surnames = $surnames;
      $this->dob = $dob;
      $this->age = $age;


      // Use substring to select the first letter of the name and store as initials
      $initials = substr($names,0, 1);
      // $merged_array = array_combine((array)$fnames, (array)$lname); // Merge the 2 arrays

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
          // array(
          //   "Name" => $merged_array
          // ),
          array(
            "ID" => $no_rows,
            "Name" => $names,
            "Surname" => $surnames,
            "Initials" => $initials,
            "Age" => $age,
            "Date of Birth" => $dob
          )
        );


        foreach ($data as $row){
          fputcsv($file_open, $row);
        }


        $error = "<p>Successfully wrote data to CSV</p>";
      }
    }


    public function csv_import($csv){
      include 'config.php';
      $this->csv = $csv;
      $target = "../database_uploads/".basename($_FILES['csv_file']['name']);

      $filename = $_FILES["csv_file"]["name"];

      $stmt->$db->prepare("INSERT INTO csv_imports(file) VALUES('?')");
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


    public function read_csv(){
      include 'config.php';
      $csvFilePath = "../output/output.csv";

      $file = fopen($csvFilePath, "r");
      while (($row = fgetcsv($file)) !== FALSE) {

          $stmt = $db->prepare("INSERT INTO csv_imports(id,name,surname,initials,age,birthdate)
          VALUES (?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("isssis", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
          if($stmt->execute()){
            print_r($row);
          }else{
            echo "Error";
        }
    }
}

  public function arrayCom(){


    $path = fopen("../output/out.csv","w");


    $first_names = array("Aiden","Chuck", "Remy", "Britney","Britney","Fred","Rae","Leslie",
        "Darlene","Enoch","Carter","Lexi","Bree","Benjamin","Alexander","Bart",
        "Winnie","Wade","Liam","Clint");
    $last_names = array("Norman","Patel", "Jameson", "Norburn","Yang","Glynn","Knight",
        "Wilkinson","Weasley","Evans","Parker","Ianson","Matthews","Clifton",
        "Dempsey","Hope","Skinner","Oakley","Wilde","Hepburn");

    $dob = array(
      "2009-09-09","1991-02-15","1960-04-11","1950-04-10",
      "1956-11-28","1947-07-01","1982-05-14","2019-01-29","1992-05-26","1953-06-15",
      "2015-01-17","1946-10-23","2008-06-26","1961-09-12","2009-09-30","2007-11-30",
      "2002-10-13","2019-04-29","1964-10-07","1967-02-22","1967-06-14","1987-04-22"
    );


    // $age = array(calculate_age($dob));
    $age = array(calculate_age($dob));
    // $initials = substr($first_names,0, 1);
    $mi = new MultipleIterator();
    $mi->attachIterator(new ArrayIterator($first_names));
    $mi->attachIterator(new ArrayIterator($last_names));
    $mi->attachIterator(new ArrayIterator($dob));
    $mi->attachIterator(new ArrayIterator($age));
    // $mi->attachIterator(new ArrayIterator($initials));
    $c = array();
    foreach($mi as $row) {
        $c[] = $row[0] . "','" . $row[1] ."','".$row[2]."','".$row[3];
        fputcsv($path,$row);
    }

    var_dump($c);
    fclose($path);

  }


  function calculate_age($age){
   $dob = array(
     "2009-09-09","1991-02-15","1960-04-11","1950-04-10",
     "1956-11-28","1947-07-01","1982-05-14","2019-01-29","1992-05-26","1953-06-15",
     "2015-01-17","1946-10-23","2008-06-26","1961-09-12","2009-09-30","2007-11-30",
     "2002-10-13","2019-04-29","1964-10-07","1967-02-22","1967-06-14","1987-04-22"
   );
   $arrObject = new ArrayObject($dob);
   $arrayIterator = $arrObject->getIterator();

   $cDate = Date("Y-m-d");
   foreach ($arrayIterator as $value){
     $diff = date_diff(date_create($value), date_create($cDate));
     // $arr = array();
     echo $diff->format("%Y years");
   }

  }



  }
