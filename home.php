<?php
// Include the necessary files
include 'session.php';
include 'database_connection.php';

if(!isset($_GET['fetch'])){
    if(!isset($_GET['query'])){
        $sql = "SELECT * FROM contacts";
    } else {
        $filter = $_GET['query'];
        $sql = "SELECT * FROM contacts WHERE type='$filter'";   
    }
    
    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);
    $row =  mysqli_fetch_all($result);
} else {
    $sql = "SELECT * FROM contacts WHERE assigned_to='$session_id'";
    $result = mysqli_query($conn, $sql);
    $row =  mysqli_fetch_all($result);
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
        <div class="home-title-box">
            <h1>Dashboard</h1>
            <button onclick="window.location.href='newcontact.php'">Add Contact</button>
        </div>
        <br />
        <br />
        <div class="table-box">
            <div class="options-box">
                <strong>Filter By:</strong>
                <span>
                    <a href="home.php" style="text-decoration: none; color: inherit;">All</a>
                </span>
                <span>
                    <a href="home.php?query=Sales Lead" style="text-decoration: none; color: inherit;">Sales Lead</a>
                </span>
                <span>
                    <a href="home.php?query=Support" style="text-decoration: none; color: inherit;">Support</a>
                </span>
                <span>
                <a href=<?= "home.php?fetch={$session_id}"?> style="text-decoration: none; color: inherit;">Assigned to me</a>
                </span>
            </div>
            <br/>
            <br />
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row as $user){ ?>
                        <tr>
                            <td><strong><?= "{$user['1']}. {$user['2']} {$user['3']}"  ?></strong></td>
                            <td class="table-email-text"><?= $user['4'] ?></td>
                            <td class="table-company-text"><?= $user['6'] ?></td>
                            <td class="table-type-text"><?= $user['7'] ?></td>
                            <td class="table-type-view"><a href=<?="viewcontact.php?id={$user['0']}"?> style="text-decoration: none;">View</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>