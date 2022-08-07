<?php   
    include('conn.php');
    include("header.php");
    include("home.php");
    

    $errors = array('firstname'=> '', 'lastname'=> '', 'mobile'=>'', 'email'=>'', 'password'=>'' , 'con_password'=>'');
    

    $final_name = "";

if (isset($_POST['submit'])) {
    if (empty($_POST["firstname"])) {
        $errors['firstname']= 'Please Enter Your First Name';
    } else {
        $firstname = $_POST["firstname"];
        $final_name = $firstname;

    }
    if (empty($_POST["lastname"])) {
        $errors['lastname']= 'Please Enter Your Last Name ';
    } else {
        $lastname = $_POST["lastname"];
    }
    if (empty($_POST["mobile"])) {
        $errors['mobile']= 'Please Enter Your Mobile Number ';
    } else {
        $mobile = $_POST["mobile"];
    }
    if (empty($_POST["email"])) {
        $errors['email']= 'Please Enter Your email';
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email']= "Enter a Valid email address";
        }
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Please Enter a Password';
        $errors['con_password'] = 'Please Enter a Password';
    } else {
        if ($_POST['password'] !== $_POST['con_password']) {
            $errors['con_password'] = 'Password Not Match';
        } else {
            $password = $_POST['password'];
        }
    }


    if (array_filter($errors)) {
        // echo error in the form
    } else {
        // create sql
        $sql = "INSERT INTO register(firstname, lastname, mobile, email, password ) VALUES('$firstname', '$lastname', '$mobile', '$email', '$password' )";
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
        } else {
            echo 'query error: '.mysqli_error($conn);
        }
        header('Location: index.php');
    }

}

?>

<div class="login-form shadow-lg">
    <form action="" method="POST">
        <h1>CREATE AN ACCOUNT</h1>
        <div class="mt-3">
            <input type="text" name='firstname' class="form-control" placeholder="First name">
        </div>
        <div class="red-text"><?php echo $errors['firstname']; ?></div>

        <div class="mt-3">
            <input type="text" name='lastname' class="form-control" placeholder="Last Name">
        </div>
        <div class="red-text"><?php echo $errors['lastname']; ?></div>

        <div class="mt-3">
            <input type="tel" name="mobile" class="form-control" placeholder="Mobile & What's up Number">
        </div>
        <div class="red-text"><?php echo $errors['mobile']; ?></div>

        <div class="mt-3">
            <input type="email" name='email' class="form-control" placeholder="Your Email Adders">
        </div>
        <div class="red-text"> <?php echo $errors['email']; ?></div>

        <div class="mt-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <div class="mt-3">
            <input type="password" name="con_password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="red-text"><?php echo $errors['con_password']; ?></div>


        <div class="login-button">
            <button type="submit" name="submit" class="btn btn-dark mt-2">Register</button>
            <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a>
            </p>
        </div>
    </form>
</div>

<?php require("footer.php"); ?>