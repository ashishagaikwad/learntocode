<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

//connecting to mysql database
$conn=new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo "conn successfull..!!";
}

//checking existing database or creating new one 
$sql = "CREATE DATABASE learnphp";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    //echo "Error creating database: " . $conn->error;
    echo "Database already exists..<br>";
}

//selecting database 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo "conn successfull..!!\n database successfully selected...";
}

//searching table userlogin and showing its results
$sql = "select * from userlogin;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  # code...
  echo "has folln result: <br>";
  while ($row=$result->fetch_assoc()) {
    # code...
    echo $row["id"]." username: ".$row["username"]." password: ".$row["password"]."<br>";
  }
}


$user = "akanksha";

/* prepare statement */
if ($stmt = $conn->prepare("select * from userlogin where username=?")) {
  
  /* bind variables to prepared statement */
  $stmt->bind_param("s",$user);
  
  /*Execute the prepare statement*/
  $stmt->execute();
  
  /*bind the result to new variables*/
  $stmt->bind_result($un, $up, $id);

    /* fetch values */
    while ($stmt->fetch()) {
        printf("Username :%s Password:%s Id: %d<br>", $un, $up, $id);
    }
}

if ($stmt = $conn->prepare("insert into userlogin values (?,?,?)")) {
  
  /* bind variables to prepared statement */  
  $stmt->bind_param("ssi",$un,$up,$uid);
  $un = "amruta";
  $up = "amruta";
  $uid = '';
  /*Execute the prepare statement*/
  $stmt->execute();

  $un = "kajol";
  $up = "kajol";
  $uid = '';
  /*Execute the prepare statement*/
  $stmt->execute();
  
  /*bind the result to new variables*/
  echo "rows affected: ".$conn->affected_rows;




    /* fetch values 
    while ($stmt->fetch()) {
        printf("Inserted rows is %s %s %d<br>", $n,$p,$uid);
    }*/
}




$stmt->close();
$conn->close();
?>