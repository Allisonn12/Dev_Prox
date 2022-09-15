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


    $path = fopen("../output/out.csv","a");


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
      "2002-10-13","2019-04-29","1964-10-07","1967-02-22"
    );




    $mi = new MultipleIterator();
    $mi->attachIterator(new ArrayIterator($first_names));
    $mi->attachIterator(new ArrayIterator($last_names));
    $mi->attachIterator(new ArrayIterator($dob));
    // $mi->attachIterator(new ArrayIterator($age));
    // $mi->attachIterator(new ArrayIterator($this->cal_age()));
    $c = array();
    foreach($mi as $row) {
       
        // Use substring to select the first letter of the name and store as initials
        $initials = substr($row[0],0,1);
        $data = array(
          array(
            "Name" => $row[0],
            "Surname" => $row[1],
            "Initials" => $initials,
            "Age" => $this->cal_age($dob),
            "Date of Birth" => $row[2]
          )
    
        );

        var_dump($data);
        fputcsv($path,$row);
    }
    var_dump($c);
    fclose($path);

  }


  function cal_age($age){

      $dob = array(
        "2009-09-09","1991-02-15","1960-04-11","1950-04-10",
        "1956-11-28","1947-07-01","1982-05-14","2019-01-29","1992-05-26",
        "1953-06-15","2015-01-17","1946-10-23","2008-06-26","1961-09-12",
        "2009-09-30","2007-11-30","2002-10-13","2019-04-29","1964-10-07",
        "1967-02-22"
      );
      $mi = new MultipleIterator();
      $mi->attachIterator(new ArrayIterator($dob));

      $cDate = Date("Y-m-d");
      foreach ($mi as $value){
        $decode = implode(" ", $value);
        $dob = date_diff(date_create($decode), date_create($cDate));
        return $dob->format("%Y years")."<br/>";
      }
  }



  }
