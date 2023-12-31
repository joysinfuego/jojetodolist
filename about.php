<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container vh-100 mb-5">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <?php
                    if (isset($_SESSION['logged_in'])) {
                        $userID = $_SESSION['u_id'];

                        $getUser = $conn->prepare("SELECT user_fname FROM users WHERE user_id = ?");
                        $getUser->execute([$userID]);

                        foreach ($getUser as $user) { ?>
                            <a class="nav-link me-3" href="process.php?logout">Welcome <b><?= $user['user_fname'] ?></b>, Logout</a>
                        <?php } ?>
                    <?php } else { ?>
                        <a class="nav-link me-3" href="login.php">Login</a>
                    <?php } ?>

                </div>
            </div>
        </nav>
        <!-- navbar end -->
        <h1>ABOUT</h1>
    <p>To Do List</p>
    <p>a list of the tasks that you have to do, or things that you want to do: Each day I try to mark off as many items on my to-do list as possible.</p>
</body>
</html>
