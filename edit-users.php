<?php
session_start();

if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'super_admin') {
    $u_id = $_GET['id'];

    if ($u_id == '') {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../super-admin-home.php';</script>";
    }

    
    require_once('./config/connection.php');

    $query = "SELECT * FROM Users WHERE id='$u_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $dob = $row['dob'];
        $nic = $row['nic'];
        $role = $row['role'];
    } else {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../super-admin-home.php';</script>";
    }
}
else {
    header("Location: ./login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:wght@700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/9bc19d88e4.js" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #F8F8F8;
        }
        .caption{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body style="background-image: url('./images/incident.jpg'); background-size: cover; background-position: center;">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left: 30px; padding-right: 30px; background-color: #5632D9 !important;">
    <div class="container-fluid row">
        <a class="navbar-brand col-sm-12 col-lg-10 caption" href="super-admin-home.php" style="color: #F8F8F8 !important;">Accident Claim System</a>
        <ul class="desktop navbar-nav ml-auto" style="max-width: fit-content">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="super-admin-home.php"  style="color: #F8F8F8 !important;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add-users.php"  style="color: #F8F8F8 !important;font-weight: bold;">Edit</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="col-lg-11 col-sm-10 text-light mx-auto pt-5 pb-2 shadow-lg" style="margin-top: 8%; background-color: #5632D9; border-radius: 25px">
        <form action="./controllers/handle-edit-users.php" method="post" name="signup-form" onsubmit="validateForm();">
            <div class="col-10 mx-auto">
                <div class="row text-center mb-5 mt-3">
                    <h1 class="mt-4 mb-4">Edit User</h1>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="fname" class="form-label  caption">First Name</label>
                        <input type="text" class="form-control" placeholder="eg: John" name="fname" value="<?php echo $fname ?>">
                    </div>
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="lname" class="form-label caption">Last Name</label>
                        <input type="text" class="form-control" placeholder="eg: Doe" name="lname" value="<?php echo $lname ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="email" class="form-label  caption">Email</label>
                        <input type="email" class="form-control" placeholder="eg: contact@email.com" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="mobile" class="form-label caption">Mobile No</label>
                        <input type="text" class="form-control" placeholder="eg: 0777123456" name="mobile" value="<?php echo $mobile ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="dob" class="form-label  caption">Birthday</label>
                        <input type="date" class="form-control" name="dob"  value="<?php echo $dob ?>">
                    </div>
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="nic" class="form-label caption">NIC</label>
                        <input type="text" class="form-control" placeholder="eg: 200012345678" name="nic" value="<?php echo $nic ?>">
                    </div>
                </div>
                <div class="row">
                    <label for="pwd_notice" class="form-label  caption">Do not enter characters in the password area unless you intend to change the password!</label>
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="pwd" class="form-label  caption">Password</label>
                        <input type="password" class="form-control" placeholder="enter your password" name="pwd" value="">
                    </div>
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="con_pwd" class="form-label caption">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="re-enter your password" name="con_pwd" value="">
                    </div>
                </div>
                <div class="row" style="display: none !important;">
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="u_id" class="form-label  caption">UID</label>
                        <input type="text" class="form-control" placeholder=" id " name="u_id" value="<?php echo $u_id?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-10 mb-4">
                        <label for="pwd" class="form-label  caption">Role</label>
                        <select name="role" class="form-control">
                            <option value="" selected disabled>--select--</option>
                            <option value="insurance_admin" <?php if($role=="insurance_admin") echo 'selected="selected"'; ?>>Insurance Admin</option>
                            <option value="police_admin" <?php if($role=="police_admin") echo 'selected="selected"'; ?>>Police Admin</option>
                            <option value="rda_admin" <?php if($role=="rda_admin") echo 'selected="selected"'; ?>>RDA Admin</option>
                            <option value="user" <?php if($role=="user") echo 'selected="selected"'; ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <button type="submit" class="btn btn-outline-light col-11 mx-auto caption fs-4 mt-5"><i class="fa fa-pen-to-square me-2"></i>Edit User</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-end mb-4">
            <i class="fa-solid fa-car-burst col-lg-3 col-sm-12" style="font-size: 150px"></i>
        </div>
    </div>
</div>
<script>
    function validateForm(){
        var fname = document.forms["signup-form"]["fname"].value;
        var lname = document.forms["signup-form"]["lname"].value;
        var email = document.forms["signup-form"]["email"].value;
        var mobile = document.forms["signup-form"]["mobile"].value;
        var dob = document.forms["signup-form"]["dob"].value;
        var nic = document.forms["signup-form"]["nic"].value;
        var pwd = document.forms["signup-form"]["pwd"].value;
        var con_pwd = document.forms["signup-form"]["con_pwd"].value;
        var role = document.forms["signup-form"]["role"].value;

        if(fname == ""){
            alert("Please enter your first name");
            return false;
        }
        else if(lname == ""){
            alert("Please enter your last name");
            return false;
        }
        else if(email == ""){
            alert("Please enter your email");
            return false;
        }
        else if(mobile == ""){
            alert("Please enter your mobile number");
            return false;
        }
        else if (mobile.length != 10) {
            alert("Please enter a valid mobile number");
            return false;
        }
        else if(dob == ""){
            alert("Please enter your date of birth");
            return false;
        }
        else if(nic == ""){
            alert("Please enter your nic number");
            return false;
        }
        else if (nic.length < 10 || nic.length > 12) {
            alert("Please enter a valid nic number");
            return false;
        }
        else if(pwd.length < 8){
            alert("Please enter a secure password");
            return false;
        }
        else if (pwd != con_pwd){
            alert("Passwords do not match");
            return false;
        }
        else if(role == ""){
            alert("Please select a role");
            return false;
        }
        return true;
    }
</script>
</body>
</html>
