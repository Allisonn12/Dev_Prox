<?php

  class obj{
    private $name;
    private $lname;
    private $dob;

    public function write(){

      $names = array(
        "0" => array(
          "Name" => "Hlabi"
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
        "20" => array(
          "Name" => "Clint"
        )
      );
      $surname = array(
        "0" => array(
          "Name" => "Norburn"
        ),
        "1" => array(
          "Name" => "Yang"
        ),
        "2" => array(
          "Name" => "Glynn"
        ),
        "3" => array(
          "Name" => "Knight"
        ),
        "4" => array(
          "Name" => "Wilkinson"
        ),
        "5" => array(
          "Name" => "Weasley"
        ),
        "6" => array(
          "Name" => "Evans"
        ),
        "7" => array(
          "Name" => "Parker"
        ),
        "8" => array(
          "Name" => "Ianson"
        ),
        "9" => array(
          "Name" => "Matthews"
        ),
        "10" => array(
          "Name" => "Clifton"
        ),
        "11" => array(
          "Name" => "Dempsey"
        ),
        "12" => array(
          "Name" => "Hope"
        ),
        "13" => array(
          "Name" => "Skinner"
        ),
        "14" => array(
          "Name" => "Oakley"
        ),
        "15" => array(
          "Name" => "Wilde"
        ),
        "16" => array(
          "Name" => "Hepburn"
        ),
        "17" => array(
          "Name" => "Norman"
        ),
        "18" => array(
          "Name" => "Patel"
        ),
        "19" => array(
          "Name" => "Jameson"
        )
      );


      $filename = '../output/output.csv';
      $merged_array = array_merge($names, $surname);
      header("Content-type: text/csv");
      header("Content-Disposition: attachment; filename=$filename");

      $output = fopen("php://output", "w");
      // $header = array_keys($names[0]);
      // fputcsv($output, $header);
      foreach($merged_array as $row){
        // if (move_uploaded_file())
        fputcsv($output, $row);
      }

      fclose($output);



    }


    public function calculate_age(){
      $user_age = date_diff(date_create($dob), date_create(date("Y/m/d")));
      echo $user_age->format("%Y years");
    }





    public function make_csv(){




    }










  }
