<?php
require('header.php');
if (isset($_GET['id'])) {
    $selectdiscsql = "SELECT * FROM circledata WHERE id = '".$_GET['id']."'";
    $resultdisc = $conn->query($selectdiscsql);

    $rowdisc = $resultdisc->fetch_array(MYSQLI_ASSOC);
    $image = "images/".$rowdisc['name'].".jpg";
    $name = $rowdisc['name'];
    $description = $rowdisc['description'];
    $speed = $rowdisc['speed'];
    $glide = $rowdisc['glide'];
    $turn = $rowdisc['turn'];
    $fade = $rowdisc['fade'];
    $link = $rowdisc['link'];
}

if (isset($_REQUEST['send'])) {
    $comment = stripslashes($_REQUEST['comment']);
    $comment = mysqli_real_escape_string($conn, $comment);
    $userid = $_SESSION['userid'];
    $discid = $_REQUEST['discid'];
    $query    = "INSERT INTO `comments` (userid, discid, comment)
                     VALUES ('".$userid."', '".$discid."', '".$comment."')";
    $result   = mysqli_query($conn, $query);
    if (!$result) {
        echo("Error description: " . $conn -> error);
    }
}
?>
<body>
    <main>
    
                    <div class="card-view">
                        <div class="image">
                        <img src="<?php echo $image ?>" style="width:40%">
                        </div>
                        <h2><?php echo $name; ?></h2>
                        <p><?php echo $description; ?></p>
                        <h4>Speed: <?php echo $speed; ?></h4>
                        <h4>Glide: <?php echo $glide; ?></h4>
                        <h4>Turn: <?php echo $turn; ?></h4>
                        <h4>Fade: <?php echo $fade; ?></h4>
                        <h4>Link: <a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></h4>
                    </div>
                <div class="bg-image">
                    <img src="backgrounds/<?php echo $name;?>.jpg"> 
                </div>  
              
    </main>

    <main>
<?php
    $sqlSelectComment = "SELECT * FROM comments INNER JOIN users ON comments.userid = users.id WHERE comments.discid = '".$_GET['id']."' ORDER BY createddt DESC";
    $resultComment = $conn->query($sqlSelectComment);

    if(mysqli_num_rows($resultComment) > 0){
      while($rowComment = mysqli_fetch_array($resultComment)){
?>
        <div class="comments">
          <p><?php echo $rowComment['comment'] ?></p>
          <span><?php echo $rowComment['createddt'] ?>:<?php echo $rowComment['username'] ?></span>
        </div>
<?php
      }
    }         
?>
    </main>
<?php
if (isset($_SESSION['userid'])) {
?>
    <main>
      <form action="" method="post" class="commentform">
        <textarea class="comment" name="comment" placeholder="Type your comment here" required></textarea>
        <br>
        <input type="submit" name="send" class="comment-button" value="Send">
        <input type="hidden" name="discid" value="<?php echo $_GET['id']; ?>">
      </form>
    </main>
<?php
}
?>
</body>
</html>
