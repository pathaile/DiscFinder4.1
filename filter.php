<?php
require_once 'dbconnect.php';

$sqlWhere = "";
if (isset($_POST['speed'])) {
    $speed = $_POST['speed'];
    $speedvalue = "";
    foreach($speed as $value) {
	    $speedvalue .= $value.',';
	}
	$sqlWhere .= " WHERE speed IN (".rtrim($speedvalue, ",").")";
}

if (isset($_POST['glide'])) {
    $glide = $_POST['glide'];
    $glidevalue = "";
    foreach($glide as $value) {
	    $glidevalue .= $value.',';
	}
	if ($sqlWhere == "") {
		$sqlWhere .= " WHERE glide IN (".rtrim($glidevalue, ",").")";
	} else {
		$sqlWhere .= " AND glide IN (".rtrim($glidevalue, ",").")";
	}
}

if (isset($_POST['turn'])) {
    $turn = $_POST['turn'];
    $turnvalue = "";
    foreach($turn as $value) {
	    $turnvalue .= $value.',';
	}
	if ($sqlWhere == "") {
		$sqlWhere .= " WHERE turn IN (".rtrim($turnvalue, ",").")";
	} else {
		$sqlWhere .= " AND turn IN (".rtrim($turnvalue, ",").")";
	}
}

if (isset($_POST['fade'])) {
    $fade = $_POST['fade'];
    $fadevalue = "";
    foreach($fade as $value) {
	    $fadevalue .= $value.',';
	}
	if ($sqlWhere == "") {
		$sqlWhere .= " WHERE fade IN (".rtrim($fadevalue, ",").")";
	} else {
		$sqlWhere .= " AND fade IN (".rtrim($fadevalue, ",").")";
	}
}
$sqlfilter = "SELECT * FROM circledata".$sqlWhere;
$result = $conn->query($sqlfilter);

		if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){                
?>        
                <div class="card">
                    <div class="image">  
                        <img src="images/<?php echo $row["name"];?>.jpg">                 
                    </div>        
                    <div class="caption">    
                        <p class="rate"> </p>      
                        <p class="product name"><?php echo $row["name"]; ?></p>
                        <p class="price"><b><?php echo $row["speed"] . " | " . $row["glide"] . " | " . $row["turn"] . " | " . $row["fade"]; ?></b></p>
                    </div>
                    <a class="primary" href="viewdisc.php?id=<?php echo $row["id"]; ?>">VIEW</a>
                </div> 
<?php 
            }
        }           
?>