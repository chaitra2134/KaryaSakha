<?php
        include 'navBar.php';
        include 'connection.php';
        session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Notes </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        form
        {
            border: 1px solid;
            padding: 1rem;
            border-radius: 8px;
        }
    </style>
  </head>
  <body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-ig-10">
            <form method="POST" id="addForm" class="add">
                <div class="mb-3">
                    <label for="title" class="form-label"> Title </label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"> Description </label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" id="addNote"> Add Note </button>                
            </form>
            <div class="alertBox" id="alertBox">

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-left">
        <h2> Your Notes </h2>
        <!-- Nav pills 
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="pill" href="#home"> All Notes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#menu1"> Favourites</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#menu2"> Hidden </a>
  </li>
</ul>

 Tab panes 
<div class="tab-content">
  <div class="tab-pane container active" id="allNotes"> </div>
  <div class="tab-pane container fade" id="favourites"> </div>
  <div class="tab-pane container fade" id="hidden"> </div>
</div> -->
        <div class="content" id="content">
            <div class="card my-6" style="width: 100%;">
                           
            </div>
        </div>   
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
<script src="js/bootstrap.js"> </script>
    <script src="js/popper.js"> </script>
    <script src="js/ajaxscript.js"> </script>
</html>