<?php
include('db.php');
error_reporting(E_ALL ^ E_WARNING); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<br>
<br>
<br>
<form method="post" enctype= "multipart/form-data">
    <input type="file" name="uplFile" id="uplFile">
    <button type="submit" name="submit" id="submit">Submit</button>
    </form>

    <br>
<form method="POST">
    <input type="search" name="SearchName" id="SearchName">
    <button type="submit" name="SearchSubm" id="SearchSubm">Submit</button>
    </form>
<hr>
<hr>
    <table class="table table-striped" id="emp_table">
            <thead>
              <tr>
                <th id="emp_name">Participantion Id</th>
                <th>Emlpoyee Name</th>
                <th>Emlpoyee Email</th>
                <th>Event Id</th>
                <th>Event Name</th>
                <th>Participation Fee</th>
                <th>Event Date</th>
              </tr>
            </thead>
            <tbody id="tdata">

            </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/sweet_alert/sweet_alert.js"></script>
<script src="js/index.js"></script>
</body>
</html>