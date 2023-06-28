
<?php

/*

$servername = "localhost";
$username = "root";
$password = "Atback22";
$databasename = "disc";

// CREATE CONNECTION
$conn = new mysqli($servername,
	$username, $password, $databasename);

// GET CONNECTION ERRORS
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// SQL QUERY
$query = "SELECT * FROM `circledata`;";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

	if ($result->num_rows > 0)
	{
		// OUTPUT DATA OF EACH ROW
		while($row = $result->fetch_assoc())
		{
			echo "Roll No: " .
				$row["name"]. " - Name: " .
				$row["description"]. " | City: " .
				$row["speed"]. " | Age: " .
				$row["glide"]. "<br>";
		}
	}
	else {
		echo "0 results";
	}

$conn->close();


*/


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */




$mysqli = new mysqli("localhost", "root", "Atback22", "disc");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. ");
}

global $name, $description, $speed, $glide, $turn, $fade;

 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM circledata WHERE name LIKE ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            // Check number of rows in the result set
            if($result->num_rows > 0){

                
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){

                    global $name, $speed, $glide, $turn, $fade;

                    $datas[] = $row;

                    //print_r($datas[3]);
                    $name = $row["name"];
                    $speed = $row["speed"];
                    $glide = $row["glide"];
                    $turn = $row["turn"];
                    $fade = $row["fade"];

                    $click = "4";
                    $dick = "5";


                    echo "<p>" . $name . ": " . $speed . " - " . $glide . " - " . $turn . " - " . $fade . "</p>";
                    
                    $disc_link = "https://www.innovadiscs.com/disc/$row[name]";

                    
                    
                        
                }

            } 

            else{
                echo "<p>No matches found</p>";
            }
            
            
            
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    $stmt->close();
}

function name($name) {
  return $name;
}

?>
 

// Close connection
$mysqli->close();
?>

?>


