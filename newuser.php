<?php
// Include the necessary files
include 'session.php';
include 'database_connection.php';

// Check if the form has been submitted
if (isset($_POST['Save'])) {
  // Get the form data
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $role = $_POST["role"];

  // Sanitize the input
  $firstName = htmlspecialchars($firstName);
  $lastName = htmlspecialchars($lastName);
  $email = htmlspecialchars($email);
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Sanitize the role input using a whitelist
  $valid_roles = ["Admin", "Member"];
  if (!in_array($role, $valid_roles)) {
    // Invalid role value, set it to "Member"
    $role = "Member";
  }

  // Construct the INSERT SQL statement
  $sql = "INSERT INTO Users(firstname, lastname, password, email, role, created_at)
          VALUES('$firstName', '$lastName', '$hashed_password', '$email', '$role', NOW())";

  // Execute the SQL statement
  $result = $conn->query($sql);

  // Check if the SQL statement was successful
  if ($result) {
    // SQL statement was successful

    ?> <script>alert("User was added successfully!");</script> <?php 
    
  } else {
    // SQL statement failed
     ?> <script>alert("Error Adding User!");</script> <?php 
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
            <h1>New User</h1>

        </div>

        <br>
        <br>
        <div class="white-box">
            <form action="newuser.php" class="add-something" method="POST">
                <div class="input">
                    <div>
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required placeholder="First Name">
                    </div>
                    <div>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required placeholder="Last Name">
                    </div>
                </div>
                <div class="input">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must have at least one letter, one number, and one capital letter, and must be at least 8 characters long." required>
                    </div>
                </div>
                <div class="input">
                    <div><label>Role</label>
                        <select id="role" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>
                    <div></div>

                </div>
                <div class="submit-btn-div">
                    <input type="submit" value="Save" name="Save">
                </div>
            </form>
        </div>
    </div>
</body>

</html>