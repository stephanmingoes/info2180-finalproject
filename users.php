<?php
include 'session.php';
include 'database_connection.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

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
            <div class="table-box">

                <br />
                <br />
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                                <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
                                <td><?php echo $row['email']  ?></td>
                                <td><?php echo $row['role']  ?></td>
                                <td><?php echo $row['created_at']  ?></td>
                            </tr>

                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>