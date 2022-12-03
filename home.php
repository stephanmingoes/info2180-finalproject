<?php
include 'session.php';
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
            <button>Add Contact</button>
        </div>
        <br />
        <br />
        <div class="table-box">
            <div class="options-box">
                <strong>Filter By:</strong>
                <span>
                    All
                </span>
                <span>
                    Sales Lead
                </span>
                <span>
                    Support
                </span>
                <span>
                    Assigned to me
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
                    <tr>
                        <td><strong>Mr. Tashyn Wallace</strong></td>
                        <td class="table-email-text">text1.2</td>
                        <td class="table-company-text">text1.3</td>
                        <td class="table-type-text">text1.4</td>
                        <td class="table-type-view">View</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. Stephan Mingoes</strong></td>
                        <td class="table-email-text">text1.2</td>
                        <td class="table-company-text">text1.3</td>
                        <td class="table-type-text">text1.4</td>
                        <td class="table-type-view">View</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Gizelle Paisley</strong></td>
                        <td class="table-email-text">text1.2</td>
                        <td class="table-company-text">text1.3</td>
                        <td class="table-type-text">text1.4</td>
                        <td class="table-type-view">View</td>
                    </tr>
                    <tr>
                        <td><strong>Mr. John Doe</strong></td>
                        <td class="table-email-text">text1.2</td>
                        <td class="table-company-text">text1.3</td>
                        <td class="table-type-text">text1.4</td>
                        <td class="table-type-view">View</td>
                    </tr>
                    <tr>
                        <td><strong>Ms. Jane Doe</strong></td>
                        <td class="table-email-text">text1.2</td>
                        <td class="table-company-text">text1.3</td>
                        <td class="table-type-text">text1.4</td>
                        <td class="table-type-view">View</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>