<?php
// Include the necessary files
include 'session.php';
include 'database_connection.php';
$id = $_GET["id"];

// Construct the INSERT SQL statement
$sql = "SELECT * FROM contacts WHERE id={$id}";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

// Construct the INSERT SQL statement
$usersql = "SELECT * FROM users WHERE id={$row['9']}";

// Execute the SQL statement
$userresult = mysqli_query($conn, $usersql);
$userrow = mysqli_fetch_row($userresult);
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
    <div class="main-content-vc">
        <div class="contact-header-box">
            <div class="contact-title-block">
                <h1><?= "{$row['1']}. {$row['2']} {$row['3']}"  ?></h1>
                <p class="txt-grey"><?= "Created on {$row['10']} by {$userrow['1']} {$userrow['2']}" ?></p>
                <p class="txt-grey"><?= "Updated on {$row['11']} by {$userrow['1']} {$userrow['2']}" ?></p>
            </div>

            <div class="contact-action-box">
                <button id="assign-btn">Assign To Me</button>
                <button id="switch-btn">Switch to Sales Lead</button>
            </div>
        </div>

        <div class="table-box-vc">
            <div class="contact-info-box">
                <p class="txt-grey">Email</p>
                <p><?= $row['4'] ?></p>
            </div>
            <div class="contact-info-box">
                <p class="txt-grey">Telephone</p>
                <p><?= $row['5'] ?></p>
            </div>
            <div class="contact-info-box">
                <p class="txt-grey">Company</p>
                <p><?= $row['6'] ?></p>
            </div>
            <div class="contact-info-box">
                <p class="txt-grey">Assigned To</p>
                <p>John Doe</p>
            </div>
        </div>
        <br />
        <div class="table-box-vcn">
            <h3>Notes</h3>
            <br/>
            <hr />

            <div class="note-box">
                <h4>John Doe</h4>
                <p class="txt-grey">Lorem ipsum dolor sit amet. Aut nisi pariatur et officiis velit sit laborum ullam aut maxime neque eos eius ipsam qui internos autem. Ea voluptas quae qui facere voluptatem est soluta deleniti aut quidem adipisci.</p>
                <p class="txt-grey">November 10, 2022</p>
            </div>
            <div class="note-box">
                <h4>John Doe</h4>
                <p class="txt-grey">Lorem ipsum dolor sit amet. Aut nisi pariatur et officiis velit sit laborum ullam aut maxime neque eos eius ipsam qui internos autem. Ea voluptas quae qui facere voluptatem est soluta deleniti aut quidem adipisci.</p>
                <p class="txt-grey">November 10, 2022</p>
            </div>
            <div class="note-box">
                <h4>John Doe</h4>
                <p class="txt-grey">Lorem ipsum dolor sit amet. Aut nisi pariatur et officiis velit sit laborum ullam aut maxime neque eos eius ipsam qui internos autem. Ea voluptas quae qui facere voluptatem est soluta deleniti aut quidem adipisci.</p>
                <p class="txt-grey">November 10, 2022</p>
            </div>
        </div>
    </div>
</body>

</html>