<?php

  class objects{
    private $name;
    private $surname;
    private $initials;
    private $age;
    private $dob;
    private $user_age;

    // Function to write to CSV file
    // Pass 3 variables
    public function writeToCSVfile($name, $surname, $dob){

      $this->name = $name;
      $this->surname = $surname;
      $this->dob = $dob;

      $first_name = array(
        ["Aiden"],
        ["Chuck"],
        ["Remy"],
        ["Britney"],
        ["Fred"],
        ["Rae"],
        ["Leslie"],
        ["Darlene"],
        ["Enoch"],
        ["Carter"],
        ["Lexi"],
        ["Bree"],
        ["Benjamin"],
        ["Alexander"],
        ["Bart"],
        ["Winnie"],
        ["Wade"],
        ["Liam"],
        ["Clint"],
        ["Brad"],
        [$name]
      );
      $last_name = array(
        ['Norburn'],
        ['Yang'],
        ['Glynn'],
        ['Knight'],
        ['Wilkinson'],
        ['Weasley'],
        ['Evans'],
        ['Parker'],
        ['Ianson'],
        ['Matthews'],
        ['Clifton'],
        ['Dempsey'],
        ['Hope'],
        ['Skinner'],
        ['Oakley'],
        ['Wilde'],
        ['Hepburn'],
        ['Norman'],
        ['Patel'],
        [$surname]
      );

      // Use substring to select the first letter of the name and store as initials
      $initials = substr($name,0, 1);
      // $user_age = date("Y/m/d") - $dob;
      $user_age = date_diff(date_create($dob), date_create(date("Y/m/d")));


      $filename = '../output/output.csv';

      // open csv file for writing
      $file = fopen($filename, 'a');

      if ($file === false) {
      	die('Error opening the file ' . $filename);
      }
      $names = implode(" ".$first_name).implode(" ".$last_name)." ".
      // $names = $initials." ".$user_age." ".implode(" ".$dob);
      print_r($names);

      // write each row at a time to a file
      foreach ($names as $row) {
      	fputcsv($file, $row);
      }

      // close the file
      fclose($file);
    }

    // public function calculate_age($user_age){
      // $this->user_age = $user_age;
      // $current_date = DateTime::createFromFormat("Y/m/d");
      // $user_age = $current_date - $dob;
      // return $user_age;
    // }




    public function read_csv(){
      $filename = '../output/output.csv';
      $data = [];

      // open the file
      $f = fopen($filename, 'r');

      if ($f === false) {
        die('Cannot open the file ' . $filename);
      }

      // read each line in CSV file at a time
      while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
      }


      // close the file
      fclose($f);
    }








    public function csv_import(){
      include 'config.php';
      $target = "../output/output.csv".basename($_FILES['name']['output.csv']);

      $stmt->$db->prepare("INSERT INTO csv_imports(file) VALUES('$target')");
      $stmt->bind_param('s', $target);

      $result = $stmt->execute();

      if ($result){
        echo "<script>alert('Inserted')</script>";
      }else{
        echo mysqli_error($db);
        exit();
      }

    }





    public function csv(){
      $num = 0;
      // $sql = "SELECT id, name, description FROM products";
      // if($result = $mysqli->query($sql)) {
      //      while($p = $result->fetch_array()) {
      //          $prod[$num]['id']          = $p['id'];
      //          $prod[$num]['name']        = $p['name'];
      //          $prod[$num]['description'] = $p['description'];
      //          $num++;
      //     }
      //  }
      $first_name = array(
        ["Aiden"],
        ["Chuck"],
        ["Remy"],
        ["Britney"],
        ["Fred"],
        ["Rae"],
        ["Leslie"],
        ["Darlene"],
        ["Enoch"],
        ["Carter"],
        ["Lexi"],
        ["Bree"],
        ["Benjamin"],
        ["Alexander"],
        ["Bart"],
        ["Winnie"],
        ["Wade"],
        ["Liam"],
        ["Clint"],
        ["Brad"],
        [$name]
      );
      $last_name = array(
        ['Norburn'],
        ['Yang'],
        ['Glynn'],
        ['Knight'],
        ['Wilkinson'],
        ['Weasley'],
        ['Evans'],
        ['Parker'],
        ['Ianson'],
        ['Matthews'],
        ['Clifton'],
        ['Dempsey'],
        ['Hope'],
        ['Skinner'],
        ['Oakley'],
        ['Wilde'],
        ['Hepburn'],
        ['Norman'],
        ['Patel'],
        [$surname]
      );

      $output = fopen("../output/output.csv",'a') or die("Can't open csv file");
      header("Content-Type:application/csv");
      header("Content-Disposition:attachment;filename=pressurecsv.csv");
      fputcsv($output, array($first_name,$last_name));
      foreach($name as $row) {
          fputcsv($output, $row);
      }
      fclose($output) or die("Can't close php://output");
    }


    // $csvFilePath = "../output/output.csv";
    // $file = fopen($csvFilePath, "r");
    // while (($row = fgetcsv($file)) !== FALSE) {
    //   $stmt = $db->prepare("INSERT INTO tbl_users (file, firstName, lastName)
    //   VALUES (?, ?, ?)");
    //   $stmt->bind_param("sss", $row[1], $row[2], $row[3]);
    //   $stmt->execute();
}
