
  <?php
  /*
    Dated: 17 / 07 /2015
    Author : Ashish Gaikwad
    This code is written to connect and select a database by using a 
    MSQLi Pracedural approach
  */

    //Connecting to mysql database using procedural mysqli
    $conn = mysqli_connect("localhost:3306","root","");
    if ($conn) {
      echo "MySql Connection successful <br>";
    }else {
      die("MySql Connection Not Successful".mysqli_connect_error()."<br>");
    }

    //function for creating table
    function createTable($conn)
    {
      $checktable=mysqli_query($conn,"select * from userlogin;");
      if ($checktable) {
        echo "userlogin table already created";
      }
      else {
        echo "userlogin table not created before..so creating new Table<br>"; 
        $sqlnew = "create table userlogin(name varchar(10),pass varchar(10));";
        $check = mysqli_query($conn,$sqlnew);
        if ($check === TRUE) {
            echo "Table created successfully";
        } 
        else {            
          echo "Error creating Table: " . mysqli_error($conn);
        }
      }
    }

    function insertValues($conn){
      $sql = "Insert into userlogin values ('ashish','ashish');";
      if (mysqli_query($conn, $sql)) {
        echo "One Row Inserted Successfully...";
      } else {
        echo "Error: ".$sql."failed to Insert Row<br>".mysqli_error($conn);
      }
    }    
    
    //select database and if not found create new database and create table in it...
    $selectdb=mysqli_select_db($conn,"learnphp");//this is procedural way and returns boolean value
    if ($selectdb)
    { //database is present 
      createTable($conn);//check table if exists or create new table
      insertValues($conn);//Adding values to database
    }
    else
    { //database is  not present so create one
      $sql = "CREATE DATABASE learnphp";
      $check = mysqli_query($conn,$sql);
      if ($check == TRUE) 
      { //database created
        echo "Database created successfully<br/>";
        $selectdb=mysqli_select_db($conn,"learnphp");//Select database query imp to set default database for operations
        if ($selectdb)
        { //database selected
          createTable($conn);//check table if exists or create new table
          insertValues($conn);//Adding values to database
        }
        else {
          echo "error selecting database..error is : ".mysqli_error($conn);
        }
      } 
      else {
        echo "Error creating database: " . mysqli_error($conn);
      }      
    }
  mysqli_close($conn);
  ?>