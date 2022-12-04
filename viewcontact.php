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

// Construct the INSERT SQL statement
$assignedsql = "SELECT * FROM users WHERE id={$row['8']}";

// Execute the SQL statement
$assignedresult = mysqli_query($conn, $assignedsql);
$assignedrow = mysqli_fetch_row($assignedresult);

// Construct the INSERT SQL statement
$notessql = "SELECT * FROM notes WHERE contact_id='$id'";

// Execute the SQL statement
$notesresult = mysqli_query($conn, $notessql);
$notesrow = mysqli_fetch_all($notesresult);
foreach($notesrow as &$note){
    $userquerysql = "SELECT * FROM users WHERE id={$note['3']}";

    // Execute the SQL statement
    $noteuserresult = mysqli_query($conn, $userquerysql);
    $noteeuserrow = mysqli_fetch_row($noteuserresult);

    $note['3'] = "{$noteeuserrow['1']} {$noteeuserrow['2']}";
}

if (isset($_POST['Save'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $contact_id = $id;
    $created_by = $session_id;

    $sql = "INSERT INTO Notes (contact_id, comment, created_by, created_at) 
    VALUES ('$contact_id', '$comment', '$created_by', CURRENT_TIMESTAMP)";


    $result = $conn->query($sql);
    if (!$result) {
        echo "<script>alert('Contact failed to add!')</script>";
    }
    header("Location: viewcontact.php?id={$id}");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
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
                <p><?= "{$assignedrow['1']} {$assignedrow['2']}"?></p>
            </div>
        </div>
        <br />
        <div class="table-box-vcn">
            <h3>Notes</h3>
            <br/>
            <hr />
            <?php foreach($notesrow as $note){ ?>
                <div class="note-box">
                    <h4><?= $note['3'] ?></h4>
                    <p class="txt-grey"><?= $note['2'] ?></p>
                    <p class="txt-grey"><?= $note['4'] ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="table-box-vcni">
            <form action=<?= "viewcontact.php?id={$id}" ?> method="POST">
                <h3>Add a note about <?= $row['2'] ?></h3>
                <br/>
                <input id="comment" name="comment" placeholder="Enter details here" required/>
                <button type="submit" name="Save">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>