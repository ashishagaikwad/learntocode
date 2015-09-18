<?php
//This is an example of mysqli object oriented
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

$sql = "CREATE DATABASE learnphp";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    //echo "Error creating database: " . $conn->error;
    echo "Database already exists..<br>";
}

//For selecting database we have to Create connection object with required database name
$conn = new mysqli($servername, $username, $password, $dbname);

//Create Table in database learnphp
$sql = "create table userlogin (username varchar(10), password varchar(10), id int(6) auto_increment);";
if($conn -> query($sql)) {
  echo "New Table Created Successfully<br>";
} else {
  //echo "Error : ".$sql."<br>".$conn->error;
  echo "table already exists<br>";
}

//Insert Records in Table userlogin in database learnphp
$sql = "insert into userlogin (username,password,id) values ('pratiksha', 'pratiksha','');";
if($conn -> query($sql)) {
  echo "Record added Successfully<br>";
} else {
  echo "Error : ".$sql."<br>".$conn->error;
}

//Show results from database
//$sql = "select * from learnphp;";
$result=$conn->query("select * from learnphp.userlogin;");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " password:  " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}
/*
//update rows in the table
$sql = "update userlogin set username = 'ashish' where password = 'pratiksha'";
$result = $conn->query($sql);
$getaffectedrows = $conn->affected_rows; // wrote a separate var to contain affected rows..
if($conn->affected_rows <= 0) // you can also use if($getaffectedrows <= 0) to get same result
{
  echo "no rows updated...!!!<br>";
} 
else {
  echo $conn->affected_rows." rows Updated.....!!!<br>";
  echo "Number of  rows updated is ".$getaffectedrows."<br><br>";
}

//Show updated results from database
$result=$conn->query("select * from learnphp.userlogin;");
if ($result->num_rows > 0) {
    // output data of each row
    echo "The updated results are as follows:<br>";
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " password:  " . $row["password"]. "<br>";
    echo "<br>";    
    }
} else {
    echo "0 results";
}


//delete rows from table
/*
$sql = "delete from learnphp.userlogin";
$result = $conn->query($sql);
$getaffectedrows = $conn->affected_rows; // wrote a separate var to contain affected rows..
if($conn->affected_rows <= 0) // you can also use if($getaffectedrows <= 0) to get same result
{
  echo "no rows deleted";
} 
else {
  echo $conn->affected_rows." rows deleted!!!<br>";
  echo "Or you can say Number of deleted rows is ".$getaffectedrows;
}


//limit data from mysql table
/*
  The limit command is used to fetch limited data from the mysql table

echo "<br>Starting limit function to limit 4 rows from beginning<br>";
$sql = "select * from userlogin limit 4";
//select rows limited to 4
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "userlogin has rows to be limited to 4 <br>";
  while ($row = $result->fetch_assoc()) {
    echo $row["id"]." username: ".$row["username"]." password: ".$row["password"]."<br>";
  }
} 
else{
  echo "0 results...!!!";
}

/*
  Modification to the limit query to limit the rows from a specific index of the rows
  suppose we want to get rows from results starting from 3rd to 7th of result then we can use
  select * from userlogin limit 4 offset 4

echo "<br>Starting limit function to limit 4 rows from beginning<br>";
//$sql = "select * from userlogin limit 5 offset 4";
//the above query tells that we limit 5 rows and offset 4 which means starting 
//from 5th row onwards
//we can also write query in below shortcut way where we choose the offset first and then limit rows
$sql = "select * from userlogin limit 4,5";//here 4 is offset and 5 is row limit
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  echo "userlogin has rows to be limited from 5 to 9 <br>";
  while ($row = $result->fetch_assoc()) {
    echo $row["id"]." username: ".$row["username"]." password: ".$row["password"]."<br>";
  }
}
else{
  echo "0 results...!!!";
}

//USING MULTIPLE QUERIES
//NOTE: use semicolon after every statement
$sql = "insert into userlogin values ('simran','simran','');";
$sql .= "insert into userlogin values('akanksha','akanksha','');";
$sql .= "insert into userlogin values('nitesh','nitesh','');";
$result = $conn->multi_query($sql);
if ($result!= 0) {
  echo "Records added successfully...!!!";  
}
else {
  echo "error adding records...!!!";
}

*/

//USING PREPARE STATEMENTS TO ADD VALUES DYNAMICALLY
//$stmt = $conn->prepare("INSERT INTO userlogin ('username','password','id') VALUES (?,?,?);");
//mysqli::prepare ( string $query )
//if ($stmt = $conn->prepare("INSERT INTO userlogin ('username','password','id') VALUES (?, ?, ?)")) {
echo "results before prepare stmt<br>";
$sql = "select * from userlogin;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  # code...
  echo "Prepare stmts has following result: <br>";
  while ($row=$result->fetch_assoc()) {
    # code...
    echo $row["id"]." username: ".$row["username"]." password: ".$row["password"]."<br>";
  }
}


if ($stmt = $conn->prepare("insert into userlogin values(?,?,?)")) {
  # code...
$stmt->bind_param('ssi',$username,$password,$id);
$countupdate=0;
//now set parameters and execute
$id = "";

$username = 'bunty';
$password = 'bunty';
$stmt->execute();
$countupdate += $conn->affected_rows;

$username = 'aunty';
$password = 'aunty';
$stmt->execute();
$countupdate += $conn->affected_rows;

echo "<br>".$countupdate." new records added successfully by prepare statements!!!<br>";
//$stmt->close();
}
else{
  echo "<br>error adding records";
}

echo "After Using Prepare Statement<br>";
$sql = "select * from userlogin;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  # code...
  echo "Prepare stmts has following result: <br>";
  while ($row=$result->fetch_assoc()) {
    # code...
    echo $row["id"]." username: ".$row["username"]." password: ".$row["password"]."<br>";
  }
}

$conn->close();
?>

<?php
/*
$servername = "localhost";
$username = "root";
$password = "";

try
  { 
    //Create Db Connection
    //For selecting Db at time of connection uncomment below if db available
    //$conn = new PDO("mysql:host=$servername;dbname=learnphp", $username, $password);
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully by pdo<br>"; 

    //Connection created to select database
    $sql="show databases like 'learnphp'";
    if ($conn -> query($sql)) {
      echo "database already exists<br>";
    }
    else 
    {
      echo "database does not exists";
      $sql = "CREATE DATABASE learnphp";
      // use exec() because no results are returned
      if ($conn->exec($sql)) {
        echo "Database created successfully<br>";
      }
      else {
        echo "Database creation Failed<br>"; 
      }
    } 
    
    
    //Create a table
    $sql = "create table userlogin (username varchar(10), password varchar(10));";
    // use exec() because no results are returned
    
    try{
      $conn->query($sql);
      echo "table created successfully";   
    }
    catch(PDOException $e)  
    {      
      echo $conn->errorInfo()."table userlogin already exists...<br>";
    }

    //Insert Records in userlogin table
    $sql = "insert into userlogin values ('pratiksha', 'pratiksha');";
    if($conn -> query($sql)) {
      echo "Record added Successfully<br>";
    } else {
      echo "Error : ".$sql."<br>".$conn->error;
    }
    
  }
catch(PDOException $e)
  {
    echo $sql."<br> Connection failed: <br>" . $e->getMessage();
  }
  $conn = null;
  /*
    Notice that in the PDO example above we have also specified a database (myDB). 
    PDO require  a valid database to connect to. If no database is specified, an exception is thrown.
    Tip: A great benefit of PDO is that it has an exception class to handle any problems 
    that may occur in our database queries. 
    If an exception is thrown within the try{ } block,the script stops executing and flows 
    directly to the first catch(){ } block.  
  */

?>