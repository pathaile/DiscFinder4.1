<?php
require_once 'dbconnect.php';

	$sqlWhere = "";
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        if (is_numeric($search)) {
            $sqlWhere = " WHERE speed='".$search."' OR glide='".$search."' OR turn='".$search."' OR fade='".$search."'";
        } else {
            $sqlWhere = " WHERE name LIKE '".$search."%'";
        }
    }

    $sqlr = "SELECT * FROM circledata".$sqlWhere;
    $all_discs = $conn->query($sqlr);


    if($all_discs->num_rows > 0){
        while($row = mysqli_fetch_assoc($all_discs)){       
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