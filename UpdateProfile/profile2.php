<?php

  include 'connection.php';
  include 'updateProfile.php';

  $userId = $_SESSION['id'];
    
?>

<!DOCTYPE html>
<html>
    <head> 
      <meta charset="UTF-8">
        <title> Update Profile </title>
        <link rel="stylesheet" type="text/css" href="profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

``  <style>
    body {
        margin: 30px;
        margin-top: 80px;
        padding: 10px;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .account-settings{
        margin: 10px;
        padding: 10px;
        text-align: center;
    }
    .account-settings .user-profile img {
        border: 2px solid black;
        border-radius: 5px;
        padding: 5px;
        margin: 5px;
        background-color: #301b44;

    }

    #profileForm {
        margin: 5px;
        padding: 10px;
        border: 2px solid black;
        font-family: "Times New Roman", Times, serif;
        font-size: 18px;
        font-weight: 600px;
        margin-top: -100px;
    }

    .card {
        width: 400px;
        margin: 15px auto;
        background-color: #b38add;
        justify-content: center;
        align-items: center;
        border-radius: 0px;
    }

    .card-body {
        width: 100%;
        margin: 20px;
        background-color: #b38add;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .account-settings .user-profile .user-name {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        font-family: "Times New Roman", Times, serif;
        color: white;
    }

    .account-settings .user-profile .user-info {
        margin: 0;
        font-size: 20px;
        font-weight: 400;
        font-family: "Times New Roman", Times, serif;
        color: #301b44;
    }

    #profilePhoto{
          width: 180px;
          height: 180px; 
          -webkit-border-radius: 100px;
          -moz-border-radius: 100px;
           border-radius: 100px; 
          
    }
    .form-control {
        border: 1px solid #cfd1d8;
        border-radius: 2px;
        font-size: 18px;
        background-color: #ffffff;
        color: black;
    }

    /* Make the first button purple */
    .button1, #submitPhoto {
        background-color: #301b44;
        color: white;
        padding: 10px;
    }

    /* Make the second button grey */
    .button2, #updatePhoto {
        background-color: grey;
        color: white;
        padding: 10px;
    }
      </style>
    </head>
    <body>
        <div class="container">
        
            <div class="row gutters">
              <div class="col-sl-6">

                    <div class="card h-50">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <img id="profilePhoto"  src=" <?php echo $image_src; ?> ">   
                                    <p class="user-name" id="user-name"> <?php echo "Hello " . $userName; ?> </p>
                                    <p class="user-info"> Wanna Update Your Profile? </p>  
                                </div>
                              
                                <form method="POST" action="uploadPhoto.php" enctype="multipart/form-data">
                                <label for="updatePhoto"> Choose Photo </label>
                                <input type="file" name="updatePhoto" id="updatePhoto" accept="image/jpeg, image/png" hidden>
                                <!--<i class="fa fa-upload fa-4x" aria-hidden="false"></i>-->
                                <input type="submit" id="submitPhoto" name="submitPhoto" value="Update Photo">
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            
            <form class="row g-4" method="POST" id="profileForm" enctype="multipart/form-data" action="updateProfile.php">
                <div class="col-md-12">
                    <label for="userName" class="form-label"> Username </label>
                    <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $userName; ?>">
                </div>
                <div class="col-md-5">
                  <label for="firstName" class="form-label"> First Name </label>
                  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                </div>
                <div class="col-md-5">
                  <label for="lastName" class="form-label"> Last Name </label>
                  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                </div>
                <div class="col-md-5">
                  <label for="dob" class="form-label"> Date Of Birth </label>
                  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                </div>
                <div class="col-md-5">
                    <label for="gender" class="form-label"> Gender </label>
                    <select id="gender" name="gender" class="form-select">
                      <option> Male </option>
                      <option> Female </option>
                      <option> Other </option>
                    </select>
                </div>
                <div class="col-md-4">
                  <label for="profession" class="form-label"> Profession </label>
                  <input type="text" class="form-control" name="profession" id="profession" value="<?php echo $profession; ?>">
                </div>
            
                <div class="col-sl-6">
                  <button type="submit" class="button1" name="saveChanges" id="saveChanges"> Save Changes </button>
                  <button type="submit" class="button2" name="discardChanges" id="discardChanges"> Discard Changes </button>
                </div>
              </form>
            <div class="alert-box" id="alertBox">

            </div>
        </div>
    </body>

    <script src="profilescript.js">

    </script>
    
</html>