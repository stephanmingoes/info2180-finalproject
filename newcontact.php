<?php
include 'session.php';
include 'database_connection.php';
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
   

    <h2 class="testbox-n" >New Contact</h2>
    <div class="testbox">

    
    <form action="database_connection.php" method="POST">
    
    
    <div class="field-wrap">
            <label>Title</label><br>
            <select class = " ">
            <option value="title" selected></option>
            <option value="ms">Ms</option>
            <option value="miss">Miss</option>
            <option value="mrs">Mrs</option>
            <option value="mr">Mr</option>
          </select>

          </div>
          
        <div class="colums">
          <div class="item">
            <label for="fname">First Name</label>
            <input id="fname" type="text" name="fname" />
          </div>
          <div class="item">
            <label for="lname"> Last Name</label>
            <input id="lname" type="text" name="lname" />
          </div>
          <div class="item">
            <label for="address">Email Address</label>
            <input id="address" type="text"   name="address" />
          </div>
          <div class="item">
            <label for="phone">Telephone</label>
            <input id="phone" type="tel"   name="phone"/>
          </div>
          <div class="item">
            <label for="company">Company</label>
            <input id="company" type="text"   name="company" />
          </div>
          <div class="item">
            <label for="Type">Type</label>
            <select>
            <option value="title" selected></option>
            <option value="ms">#</option>
            <option value="miss">#</option>
            <option value="mrs">#</option>
            <option value="mr">#</option>
          </select>

          </div>
     
          <div class="item">
            <label for="assign">Assigned To</label>
            <select>
            <option value="title" selected></option>
            <option value="ms">#</option>
            <option value="miss">#</option>
            <option value="mrs">#</option>
            <option value="mr">#</option>
          </select>
          </div>
          

          </div>

          <div class="btn-block">
      <button type="save" class="d-block ml-auto" >Save</button>
      </div>
    </div>
 
    </div>
    </form>


</body>

</html>