<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Navbar with Search Box | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            DiscBible.com
         </div>
         <div class="nav-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="advancedsearch.php">Search</a></li>
            <li><a href="compare.php">Compare</a></li>
            <li><a href="compare.php">My Bag</a></li>
            <li><a href="compare.php">Aces</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
<?php
if (isset($_SESSION['username'])) {
?>
            <li><a href="logout.php">Logout</a></li>
<?php
} else {
?>
            <li><a href="login.php">Login</a></li>
<?php
}
?>
            
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         
         <form action="index.php" method="post">
            <input type="search" class="search-data" placeholder="Search for a disc" name="search" value="" onKeyUp="onchangesearch(this.value)">
            <button type="submit" class="fas fa-search" disabled></button>
         </form>
         
      </nav>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>