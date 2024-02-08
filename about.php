<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: small;
        }
    nav {
            background-color: gray;
            padding: 0.2em;
            text-align: center;
            font-size: x-large;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
        }
        
</style>
    <title> About Page </title>
  </head>
  <body>
  <div class="container vh-100 mb-5">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Home</a>
                 <a class="navbar-brand" href="about.php">About Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    if (isset($_SESSION['Register'])) {
                        $userID = $_SESSION['u_id'];

                        $getUser = $conn->prepare("SELECT user_fname FROM users WHERE user_id = ?");
                        $getUser->execute([$userID]);

                        foreach ($getUser as $user) { ?>
                            <a class="nav-link me-3" href="process.php?logout">Welcome <b><?= $users['user_fname'] ?></b>, Logout</a>
                        <?php } ?>
                    <?php } else { ?>
                        <a class="nav-link me-3" href="register.php">Register</a>
                    <?php } ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['logged_in'])) {
                        $userID = $_SESSION['u_id'];

                        $getUser = $conn->prepare("SELECT user_fname FROM users WHERE user_id = ?");
                        $getUser->execute([$userID]);

                        foreach ($getUser as $user) { ?>
                            <a class="nav-link me-3" href="process.php?logout">Welcome <b><?= $users['user_fname'] ?></b>, Logout</a>
                        <?php } ?>
                    <?php } else { ?>
                        <a class="nav-link me-3" href="login.php">Login</a>
                    <?php } ?>

                </div>
            </div>
        </nav>
        <!-- navbar end -->
      <body style="background-color: aquamarine;">

    <h1>About the Jojetodolist App</h1>

    <p>This simple to-do list application helps you organize your tasks and stay productive. It provides a user-friendly interface to add, edit, and delete tasks, ensuring you can manage your daily activities efficiently.</p>

    <h2>Features:</h2>
    <ul>
        <li>Add tasks with due dates.</li>
        <li>Edit or mark tasks as completed.</li>
        <li>Delete tasks you no longer need.</li>
        <li>User-friendly interface for easy task management.</li>
    </ul>

    <h2>How to Use:</h2>
    <ol>
        <li>Click on "Add Task" to create a new task.</li>
        <li>Edit or mark tasks as completed as needed.</li>
        <li>Delete tasks by selecting the delete option.</li>
    </ol>

    <p>Thank you for using our Jojetodolist App!</p>

    <footer>
        <center>
        <p>&copy; <?php echo date("Y"); ?> jojetodolistApp. All rights reserved.</p>
        </center>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>