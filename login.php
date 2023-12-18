<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
   <link rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script <link rel="stylesheet" href="./bootstrap-5.1.3-dist/js/bootstrap.bundle.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        body {
    background-image: url('./images/black.jpg.jpg');
    background-size: cover;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5); /* Background overlay */
}

        h1{
            font-family: 'Poppins', sans-serif;
            font-size: 60px;
        }
        .caption{
            font-weight: 600;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="padding-left: 30px; padding-right: 30px;">
    <div class="container-fluid row">
        <a class="navbar-brand col-sm-12 col-lg-10 caption" href="#" style="color: black;">Accident Claim System</a>
    </div>
</nav>

    <div class="container">
    <<div class="col-lg-6 text-light mx-auto pt-5 pb-2 shadow-lg" style="margin-top: 8%; background-color: rgba(184, 134, 11, 0.7); border-radius: 25px;">
            <form action="./controllers/handle-login.php" method="post" name="login-form" onsubmit="return validateForm();">
                <div class="col-10 mx-auto">
                    <div class="row text-center mb-5 mt-5">
                        <h1>Log In</h1>
                    </div>
                    <div class="mb-4">
    <label for="email" class="form-label caption">Email address</label>
    <input type="email" class="form-control" placeholder="example@email.com" name="email">
</div>

<div class="mb-4">
    <label for="pwd" class="form-label caption">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="pwd">
</div>

                        <div class="form-group">
    <button type="submit" class="form-control btn btn-primary submit">Log In</button>
</div>

	           <div class="form-group text-center">
    <div class="w-100">
        <p>Don't have an account? <a href="signup.php" style="color: black;">Register here!</a></p>
    </div>
</div>

    </div>
                </div>
            </form>
            <div class="row justify-content-end mb-4">
    <i class="fa-solid fa-car-burst col-lg-8 col-sm-12" style="font-size: 150px; color: #5632D9;"></i>
</div>

        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.forms["login-form"]["email"].value;
            var pwd = document.forms["login-form"]["pwd"].value;
            if (email == "" || pwd == "") {
                alert("Please fill all the fields");
                return false;
            }
        }
    </script>
</body>

</html>
