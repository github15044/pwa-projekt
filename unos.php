
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
    </style>
</head>

<?php
include 'connect.php';


if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $picture = $_FILES['photo']['name'];
    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
} else {
   
    $picture = ''; 
}

// Podaci iz forme
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

// SQL upit za umetanje podataka
$query = "INSERT INTO `unos vijesti` (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
          VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

// Izvršavanje upita
$result = mysqli_query($dbc, $query) or die('Error querying database: ' . mysqli_error($dbc));

// Zatvaranje veze s bazom podataka
mysqli_close($dbc);
?>



<body>
    <!-- Header s navigacijom -->
    <header class="bg-light py-3">
        <div class="container">
            <div class="title text-center">Zelena gradnja</div> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Novosti.php">Novosti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Onama.php">O nama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Kontakt.php">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="unos.php">Unos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategorija.php">Gradnja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategorija.php">Certifikati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administracija.php">Administracija</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registracija.php">Registracija</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container mt-4">
        <!-- Kartica za novosti -->
        <section class="form-section">
            <h2>Unos vijesti</h2>
            <form id="newsForm" action="skripta.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-item">
                    <label for="title">Naslov vijesti</label> </br>
                    <input type="text" id="title" name="title" class="form-field-textual">
                    <div id="titleError" class="error-message"></div>
                </div>
                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label> </br>
                    <textarea id="about" name="about" cols="30" rows="10" class="form-field-textual"></textarea>
                    <div id="aboutError" class="error-message"></div>
                </div>
                <div class="form-item">
                    <label for="content">Sadržaj vijesti</label> </br>
                    <textarea id="content" name="content" cols="30" rows="10" class="form-field-textual"></textarea>
                    <div id="contentError" class="error-message"></div>
                </div>
                <div class="form-item">
                    <label for="category">Kategorija vijesti</label> </br>
                    <select id="category" name="category" class="form-field-textual">
                        <option value="">Odaberi kategoriju...</option>
                        <option value="sport">Arhitektura</option>
                        <option value="kultura">Gradnja</option>
                        <option value="kultura">Certifikati</option>
                    </select>
                    <div id="categoryError" class="error-message"></div>
                </div>
                <div class="form-item">
                    <label for="photo">Slika:</label> </br>
                    <input type="file" id="photo" accept="image/jpeg,image/jpg,image/gif,image/png" name="photo"/>
                    <div id="photoError" class="error-message"></div>
                </div>
                <div class="form-item">
                    <label>Spremiti u arhivu:</label> </br>
                    <input type="checkbox" name="archive">
                </div>
                <div class="form-item">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" value="Prihvati">Prihvati</button>
                </div>
            </form>
            
        </section>
    </div>

    <footer>
        <div class="container">
            <p>Zelena gradnja &copy; 2024</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            
            resetErrors();

            let isValid = true;

            
            let title = document.getElementById('title').value.trim();
            if (title.length < 5 || title.length > 30) {
                document.getElementById('title').style.borderColor = 'red';
                document.getElementById('titleError').innerText = 'Naslov mora imati između 5 i 30 znakova';
                isValid = false;
            }

           
            let about = document.getElementById('about').value.trim();
            if (about.length > 50) {
                document.getElementById('about').style.borderColor = 'red';
                document.getElementById('aboutError').innerText = 'Kratki sadržaj mora imati između do 50 znakova';
                isValid = false;
            }

            
            let content = document.getElementById('content').value.trim();
            if (content === '') {
                document.getElementById('content').style.borderColor = 'red';
                document.getElementById('contentError').innerText = 'Sadržaj vijesti ne smije biti prazan';
                isValid = false;
            }

            
            let category = document.getElementById('category').value;
            if (category === '') {
                document.getElementById('category').style.borderColor = 'red';
                document.getElementById('categoryError').innerText = 'Odaberi kategoriju!';
                isValid = false;
            }

           
            let photo = document.getElementById('photo').value;
            if (!photo) {
                document.getElementById('photoError').innerText = 'Odaberi sliku!';
                isValid = false;
            }

            return isValid;
        }

        function resetErrors() {
            document.getElementById('title').style.borderColor = '';
            document.getElementById('about').style.borderColor = '';
            document.getElementById('content').style.borderColor = '';
            document.getElementById('category').style.borderColor = '';
            document.getElementById('photo').style.borderColor = '';

            document.getElementById('titleError').innerText = '';
            document.getElementById('aboutError').innerText = '';
            document.getElementById('contentError').innerText = '';
            document.getElementById('categoryError').innerText = '';
            document.getElementById('photoError').innerText = '';
        }
    </script>
</body>
</html>
