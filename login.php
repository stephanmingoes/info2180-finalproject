<?php
include 'database_connection.php';
session_start();

if (isset($_SESSION['userID'])) {

    header('location:home.php');
}

if (isset($_POST['Login'])) {

    $email = $_POST['email'];
    $password =  $_POST['password'];

    $sql = "SELECT * FROM Users where email = '$email'";

    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if (!password_verify($password, $row['password'])) { 

             

              ?> 
              <script>alert('User logged in fail');</script>
              <?php
               header('Refresh: 2; URL = login.php');
              return;
                
            }

            $_SESSION['userID'] = $row['id'];
            $_SESSION['userEmail'] = $row['email'];
        }
        ?>
        <script>
            alert('Welcome <?php echo $_SESSION['userEmail'] ?>');
        </script>
        <script>
            window.location = 'home.php';
        </script>
<?php


    } else {
        echo "<center><p style=color:red;>Invalid username or password</p></center>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">Dolphin CRM</div>
    </nav>
    <div class="main-login">
        <div class="login">
            <form action="login.php" method="POST">
                <h1>Login</h1>
                <input type="email" name="email" id="email" placeholder="Email" required />
                <input type="password" name="password" id="password" placeholder="Password" required />
                <input type="submit" value="Login" class="login-btn" name="Login" />
            </form>
        </div>
    </div>

</body>

</html>