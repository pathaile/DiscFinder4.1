<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    global $conn;
        $conn=mysqli_connect('localhost', 'root', 'Atback22', 'maindata') or die("Connect Failed:" .mysqli_connect_error());
        if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['speed']) && isset($_POST['glide']) && isset($_POST['turn']) && isset($_POST['fade']) && isset($_POST['pic']) && isset($_POST['flightpic']) && isset($_POST['link'])) {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $speed = $_POST['speed'];
            $glide = $_POST['glide'];
            $turn = $_POST['turn'];
            $fade = $_POST['fade'];
            $pic = $_POST['pic'];
            $flightpic = $_POST['flightpic'];
            $link = $_POST['link'];

        $thing = "44444444444444444";

            $sql= "INSERT INTO circledata (name, description, speed, glide, turn, fade, pic, flightpic, link) 
            VALUES ('$name', '$description', '$speed', '$glide', '$turn', '$fade', '$pic', '$flightpic', '$link')";

            $query = mysqli_query($conn,$sql);
            if($query) {
                echo 'Entry Successful';
            }
            else {
                echo 'Error Occurred';
            }
        }
    }

?>