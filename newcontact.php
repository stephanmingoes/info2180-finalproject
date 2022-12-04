<?php


include 'session.php';
include 'database_connection.php';

$query = "SELECT * FROM users";
$u_result = mysqli_query($conn, $query);


if (isset($_POST['Save'])) {

    $title = htmlspecialchars($_POST['title']);
    $firstname = htmlspecialchars($_POST['fname']);
    $lastname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['address']);
    $telephone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $type = htmlspecialchars($_POST['type']);
    $assigned_to = htmlspecialchars($_POST['assigned_to']);
    $created_by = $session_id;



    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) 
    VALUES ('$title', '$firstname', '$lastname', '$email', '$telephone', '$company', '$type', '$assigned_to', '$created_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";


    $result = $conn->query($sql);


     if ($result) {


    ?> <script>alert("Contact was added successfully!");</script> <?php 
    
  } else {

     ?> <script>alert("Error Adding Contact!");</script> <?php 
  }
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
    <aside class="main-aside">

        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="newcontact.php">New Contact</a></li>
            <li><a href="newuser.php">New User</a></li>
            <hr>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </aside>

    <div class="main-content">

        <div class="page-title">
            <h1>New Contact</h1>
        </div>

        <br>
        <br>
        <div class="white-box">
            <form action="newcontact.php" method="POST">


                <div class="field-wrap">
                    <label>Title</label><br>
                    <select name="title" id="title">
                        <option value="Ms">Ms</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Mr" selected>Mr</option>
                    </select>

                </div>

                <div class="colums">
                    <div class="item">
                        <label for="fname">First Name</label>
                        <input id="fname" type="text" name="fname" required />
                    </div>
                    <div class="item">
                        <label for="lname"> Last Name</label>
                        <input id="lname" type="text" name="lname" required />
                    </div>
                    <div class="item">
                        <label for="address">Email Address</label>
                        <input id="address" type="text" name="address" required />
                    </div>
                    <div class="item">
                        <label for="phone">Telephone</label>
                        <input id="phone" type="tel" name="phone" required />
                    </div>
                    <div class="item">
                        <label for="company">Company</label>
                        <input id="company" type="text" name="company" required />
                    </div>
                    <div class="item">
                        <label for="type">Type</label>
                        <select id="type" name="type">
                            <option value="Sales Lead">Sales Lead</option>
                            <option value="Support">Support</option>
                        </select>

                    </div>

                    <div class="item">
                        <label for="assigned_to">Assigned To</label>
                        <select id="assigned_to" name="assigned_to" required>
                            <?php while ($row = mysqli_fetch_assoc($u_result)) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>


                </div>

                <div class="submit-btn-div">
                    <input type="submit" value="Save" name="Save" />
                </div>
            </form>

        </div>

    </div>




</body>

</html>