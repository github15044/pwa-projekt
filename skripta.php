<?php
include 'connect.php';

if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $picture = $_FILES['photo']['name'];
    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
} else {
    $picture = ''; 
}

$title = isset($_POST['title']) ? $_POST['title'] : '';
$about = isset($_POST['about']) ? $_POST['about'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$date = date('d.m.Y.');

if(isset($_POST['archive'])){
    $archive = 1;
} else {
    $archive = 0;
}

$query = "INSERT INTO `unos vijesti` (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
          VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

$result = mysqli_query($dbc, $query);

if ($result) {
    $message = "Uspješno ste unijeli vijest u bazu.";

    echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos vijesti</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 
    <link rel="icon" href="favicon.png" type="image/png">
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
        .category {
            margin-bottom: 10px;
        }
        .title {
            margin-bottom: 20px;
        }
        .slika img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .about, .sadrzaj {
            margin-bottom: 30px;
        }
        .container {
            background-color: #f8f9fa; /* Svijetlo siva pozadina */
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header class="bg-light py-3">
    </header>

    <div class="container mt-4">
        <section class="form-section">
            <h2>Unos vijesti</h2>
            <div class="alert alert-success" role="alert">
                ' . $message . '
            </div>
            <section role="main">
                <div class="mb-4">
                    <p class="category">' . $category . '</p>
                    <h1 class="title">' . $title . '</h1>
                    <p>AUTOR:</p>
                    <p>OBJAVLJENO: ' . $date . '</p>
                </div>';

                if (!empty($picture)) {
                    echo '
                    <section class="slika mb-4">
                        <img src="' . $target_dir . '" alt="Slika vijesti">
                    </section>';
                }

                echo '
                <section class="about mb-4">
                    <p>' . $about . '</p>
                </section>
                <section class="sadrzaj mb-4">
                    <p>' . $content . '</p>
                </section>
            </section>
        </section>
    </div>

    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p>Zelena gradnja &copy; 2024</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Vaš JavaScript kod za validaciju forme
    </script>
</body>
</html>
';

} else {
    $error = "Greška prilikom unosa u bazu: " . mysqli_error($dbc);
    echo "Greška prilikom unosa u bazu: " . mysqli_error($dbc);
}

mysqli_close($dbc);
?>
