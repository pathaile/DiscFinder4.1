<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<h1> Discionary</h1>
<body bgcolor="5EE8E6">
    <div><h2>Add Disc Form</h2></div>
    <form action='connect.php' method="POST">

        <label for="name">Name:</label><br>
        <input type='text' name='name' id="name" required/> <br> <br>

        <label for="description">Description:</label><br>
        <input type='text' name='description' id="description" required/> <br> <br>

        <label for="speed">Speed:</label><br>
        <input type='number' name='speed' id="speed" required/> <br> <br>

        <label for="glide">Glide:</label><br>
        <input type='number' name='glide' id="glide" required/> <br> <br>

        <label for="turn">Turn:</label><br>
        <input type='number' name='turn' id="turn" required/> <br> <br>

        <label for="fade">Fade:</label><br>
        <input type='number' name='fade' id="fade" required/> <br> <br>

        <label for="pic">Picture:</label><br>
        <input type="file" id="pic" name="pic"><input type="submit"> <br> <br>
        
        <label for="flightpic">Flight Path:</label><br>
        <input type="file" id="flightpic" name="flightpic"><input type="submit"> <br> <br>

        <!--<label for="pic">Picture:</label><br>
        <input type="file" id="myFile" name="filename">
        <input type='blob' name='pic' id="pic" required/> <br> <br>
        <input type="submit">

        <label for="flightpic">Flight:</label><br>
        <input type='blob' name='flightpic' id="flightpic" required/> <br> <br>-->

        <label for="link">ShopLink:</label><br>
        <input type='url' name='link' id="link" required/> <br> <br>

        <input type='submit' name='submit' id='submit' />
    </form>

</body>
</h2>

