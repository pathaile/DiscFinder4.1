<?php
	include 'header.php';
    require_once 'connect.php';
    
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
    
    global $name, $description, $speed, $glide, $turn, $fade, $pic;  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style>
    body
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
function onchangesearch(search) {
    $.ajax({
        url: "getfilterdiscs.php",
        type: "post",
        data: {'search':search} ,
        success: function (response) {
            $("#discarea").html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}
</script>
</head>
<body>
    <main id="discarea">
        <?php
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
                </div> 
        <?php 
            }
        }                        
        ?>  
    </main>                                                            
</body>
</html>