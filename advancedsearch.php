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
?>
    
    <main>
        <div style="width: 100%; display: table;">
            <div style="display: table-row">
                <div style="width: 20%; display: table-cell; vertical-align: top;">
                    <form id="filterform">
<?php
    $sqlselect1 = "SELECT speed FROM circledata GROUP BY speed";
    $result1 = $conn->query($sqlselect1);

    if($result1->num_rows > 0){
        echo "<div class='card-filter'><div class='caption'>";
        echo "<h3>Speed</h3><hr>";
        while($row1 = mysqli_fetch_assoc($result1)){ 
?>
            <label class="form-control">
              <input type="checkbox" class="checkbox" name="speed[]" value="<?php echo $row1['speed']; ?>" />
              <span class="checkbox-value"><?php echo $row1['speed']; ?></span>
            </label>
<?php
        }
        echo "</div></div>";
    }               
?> 

<?php
    $sqlselect2 = "SELECT glide FROM circledata GROUP BY glide";
    $result2 = $conn->query($sqlselect2);

    if($result2->num_rows > 0){
        echo "<div class='card-filter'><div class='caption'>";
        echo "<h3>Guide</h3><hr>";
        while($row2 = mysqli_fetch_assoc($result2)){ 
?>
            <label class="form-control">
              <input type="checkbox" class="checkbox" name="glide[]" value="<?php echo $row2['glide']; ?>" />
              <span class="checkbox-value"><?php echo $row2['glide']; ?></span>
            </label>
<?php
        }
        echo "</div></div>";
    }               
?>

<?php
    $sqlselect3 = "SELECT turn FROM circledata GROUP BY turn";
    $result3 = $conn->query($sqlselect3);

    if($result3->num_rows > 0){
        echo "<div class='card-filter'><div class='caption'>";
        echo "<h3>Speed</h3><hr>";
        while($row3 = mysqli_fetch_assoc($result3)){ 
?>
            <label class="form-control">
              <input type="checkbox" class="checkbox" name="turn[]" value="<?php echo $row3['turn']; ?>" />
              <span class="checkbox-value"><?php echo $row3['turn']; ?></span>
            </label>
<?php
        }
        echo "</div></div>";
    }               
?>

<?php
    $sqlselect4 = "SELECT fade FROM circledata GROUP BY fade";
    $result4 = $conn->query($sqlselect4);

    if($result4->num_rows > 0){
        echo "<div class='card-filter'><div class='caption'>";
        echo "<h3>Speed</h3><hr>";
        while($row4 = mysqli_fetch_assoc($result4)){ 
?>
            <label class="form-control">
              <input type="checkbox" class="checkbox" name="fade[]" value="<?php echo $row4['fade']; ?>" />
              <span class="checkbox-value"><?php echo $row4['fade']; ?></span>
            </label>
<?php
        }
        echo "</div></div>";
    }               
?> 
                    </form>
                </div>
                <div style="display: table-cell;" id="filter">
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
        <?php 
            }
        }                        
        ?> 
                </div>
            </div>
        </div>
         
    </main>                                                            
</body>
</html>

<script type="text/javascript">  
    $(function(){
        $('.checkbox').on('change',function(){
            $.ajax({
                type: 'post',
                url: 'filter.php',
                data: $('#filterform').serialize(),
                success: function (data) {
                  $("#filter").html(data);
                }
            });
        });
    });

    


</script>