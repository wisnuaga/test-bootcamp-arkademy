<?php
$server = "localhost";
$username = "root";
$database = "bootcamp_arkademy";
$password = "";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Koneksi Gagal " . $e->getMessage();
}

$getUsers = $conn->prepare("SELECT * FROM users");
$getUsers->execute();
$users = $getUsers->fetchAll();

$getSkills = $conn->prepare("SELECT * FROM skills");
$getSkills->execute();
$skills = $getSkills->fetchAll();

if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $insert = $conn->prepare("INSERT INTO users (name) values (:name)");
    $insert->BindParam(':name', $name);
    $insert->execute();

    header("Refresh:0");
}

if (isset($_POST['skill-name'])) {
    $users_id = $_POST['btn_user'];
    $skill = $_POST['skill_name'];

    $insert = $conn->prepare("INSERT INTO skills (name, users_id) values (:skill_name, users_id)");
    $insert->BindParam(':skill_name', $skill);
    $insert->BindParam(':users_id', $users_id);
    $insert->execute();

    header("Refresh:0");
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white">Programmers Data</a>
        </div>
    </nav>

    <!-- content -->
    <div class="container">
        <form action="" method="post">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Input Nama Programmer">
                            </div>
                        </div>
                        <div class="col md-5">
                            <button type="submit" class="btn btn-primary" id="btn-input">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php foreach ($users as $user) : ?>
        <div class="container">
            <form action="" method="post">
                <div class="row pt-4 mb-4">
                    <div class="col md-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name'] ?></h5>
                                <p class="card-text">
                                    <?php
                                    foreach ($skills as $skill) {
                                        if ($skill['users_id'] == $user['id']) {
                                            echo $skill['name'] . ", ";
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col md-5">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="skill_name" name="skill_name" placeholder="Input skill baru">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary" id="btn_user" name="btn_user" value="<?= $user['id'] ?>">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
    <!-- end of content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>