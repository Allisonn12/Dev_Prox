# Dev_Prox
Assignment

Included in the above projects are 4 main folders, namely:
1: css/
2: database_uploads/
3: inc/
4: output/

1. The css folder consists of a css file

2. The database_uploads folder:
   Is meant for upload. So when the user uploads the CSV file to the database, the file is moved and stored inside the database_uploads folder

3. The inc folder:
   This folder includes 3 main files, namely:
   1. Config.php 
      Connection to the database.
   2. Function.php
      This file inherits values from the usercsv.php 
   3. Usercsv.php
      This file handles the processing of the task than the the processing is called in the functions file.
      This file contains:
      
      1. read_csv() function / method, which reads the CSV file and imports to database
      2. csv_imports() which imports the entire CSV file to the database
    
    
In order to use the system a local server is required (Xampp / Wamp),
You can import the file in your cpanel on your localhost using a file called "Connection.sql" found inside the inc/ folder
