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
?>
        <div style="width: 100%; display: table;">
            <div style="display: table-row">
                <div style="display: table-cell;" id="filter">
                    <form method="post" action="">
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
                    <label class="form-control">
                        <input type="checkbox" class="checkbox" name="selectcmp[]" value="<?php echo $row['id']; ?>" />
                        Select
                    </label>
                </div> 
        <?php 
            }
        }                        
        ?> 
                        <input type="submit" name="filter" class="primary" value="Compare">
                    </form>
                </div>
            </div>
        </div>
<?php
}
?>
         
    </main>                                                            
</body>
</html>

<script type="text/javascript">  
    $(function(){
        

        $('input[type=checkbox]').on('change', function (e) {
            if ($('input[type=checkbox]:checked').length > 2) {
                $(this).prop('checked', false);
                alert("Allowed only 2 for comparing");
            }
        });
    });
</script>

