<?php
    include 'header.php';
?>
    
    <main id="compdiscarea">
<?php
if (isset($_POST['selectcmp']) && count($_POST['selectcmp']) == 2) {
?>
        <div style="width: 100%; display: table;">
            <div style="display: table-row">
<?php
    $disc = $_POST['selectcmp'];
    $discvalue = "";
    foreach($disc as $value) {
        $discvalue .= $value.',';
    }
    $sqlselectdisc = "SELECT * FROM circledata WHERE id IN (".rtrim($discvalue, ',').")";
    $resultdisc = $conn->query($sqlselectdisc);

    if($resultdisc->num_rows > 0){
        while($rowdisc = mysqli_fetch_assoc($resultdisc)){ 
            $image = "images/".$rowdisc['name'].".jpg";
            $name = $rowdisc['name'];
            $description = $rowdisc['description'];
            $speed = $rowdisc['speed'];
            $glide = $rowdisc['glide'];
            $turn = $rowdisc['turn'];
            $fade = $rowdisc['fade'];
            $link = $rowdisc['link'];
?>
        <div style="display: table-cell; width: 50%;">
            <div class="compare-view">
                <div class="image">
                  <img src="<?php echo $image ?>" style="width:80%">
                </div>
                <h2><?php echo $name; ?></h2>
                <p><?php echo $description; ?></p>
                <h4>Speed: <?php echo $speed; ?></h4>
                <h4>Glide: <?php echo $glide; ?></h4>
                <h4>Turn: <?php echo $turn; ?></h4>
                <h4>Fade: <?php echo $fade; ?></h4>
                <h4>Link: <a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></h4>
            </div>
        </div>
<?php
        }
    }               
?> 
            </div>
        </div>

<?php
} else {
    echo "<h2>Please select two discs for comparering</h2>";
}
?>
         
    </main>                                                            
</body>
</html>