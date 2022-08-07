<?php   
    include("conn.php");
    include("header.php");
    include("home.php");
    
    $errors = array('username'=> "", 'password'=>"");

if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = "Enter a Username";
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $errors['password'] = "Enter a Password";
    } else {
        $password = $_POST['password'];
    }
    if (array_filter($errors)) {
        // echo error in the form
    } else {
        $sql = "SELECT * FROM register WHERE email='$username' AND password ='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo 'Quere error'.mysqli_error($conn);
        }
        // header('Location: index.php');
    }
        
    $sql = 'SELECT firstname FROM register';
    // make the query and get the result
    $result = mysqli_query($conn, $sql);
    // fetch the resulting rows as an array
    $firstname = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $final_name = "";
    if (isset($_POST['submit'])) {
        $fname = $_POST['username'];
        echo $fname;
        foreach ($firstname as $name) {
            if ($name['firstname'] == $fname) {
                print_r($final_name);
                echo 'FOUND YOUR NAME IS '.$fname;
                $final_name = $fname;
                break;
            }
        }
    }
} 
?>

<div class="login-form shadow-lg">
    <form method="POST">
        <h1>LOGIN IN</h1>
        <div class="mb-2">
            <label class="form-label">Email address</label>
            <input type="email" name='username' class="form-control">
            <div class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="red-text"><?php echo $errors['username']; ?></div>

        <div class="mb-2">
            <label  class="form-label">Password</label>
            <input type="password" name='password' class="form-control">
        </div>
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <div class="mt-2 login-button">
            <button type="submit" name="submit" class="btn btn-dark mb-3">Login</button><br>
            <p class="login-register-text">Don't have an account <a href="register.php">Register Here!!!</a></p>
        </div>
        
    </form>

</div>

<?php include("footer.php"); ?>