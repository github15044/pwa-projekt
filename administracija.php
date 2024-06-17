<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelena gradnja - Novosti</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 
    <link rel="icon" href="favicon.png" type="image/png">
</head>

<body>
<?php 
session_start(); 
include 'connect.php'; 

define('UPLPATH', 'img/'); 

$uspjesnaPrijava = false;
$admin = false;

if (isset($_POST['prijava'])) { 
    $prijavaImeKorisnika = $_POST['username']; 
    $prijavaLozinkaKorisnika = $_POST['lozinka'];
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
    $stmt = mysqli_stmt_init($dbc); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
        mysqli_stmt_fetch($stmt); 
        
        // Provjera lozinke 
        if (password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;

            // Provjera da li je admin 
            if ($levelKorisnika == 1) { 
                $admin = true;
            }

            // postavljanje session varijabli
            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['level'] = $levelKorisnika; 
        } 
    } 
}

?>

    <!-- Header s navigacijom -->
    <header class="bg-light py-3">
        <div class="container">
            <div class="title text-center">Zelena gradnja</div> <!-- Dodano 'text-center' -->
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

    <!-- Glavni sadržaj -->
    <div class="container mt-4">
        <!-- Kartica za novosti -->
        <div class="card">
            <h5 class="card-title1">Administracija</h5>
            <div class="card-body">
                <?php
                if (isset($_SESSION['username']) && $_SESSION['level'] == 1) {
                    $query = "SELECT * FROM vijesti"; 
                    $result = mysqli_query($dbc, $query); 
                    while($row = mysqli_fetch_array($result)) { 
                        // forma za administraciju 
                    } 
                } else if (isset($_POST['prijava'])) {
                    if ($uspjesnaPrijava == true && $admin == false) { 
                        echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
                    } else if (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
                        echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
                    } else if ($uspjesnaPrijava == false) { ?>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="username">Korisničko ime:</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lozinka">Lozinka:</label>
                                        <input type="password" class="form-control" id="lozinka" name="lozinka" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="prijava">Prijava</button>
                                </form>
                            </div>
                        </div>
                    <?php 
                    }
                } else { ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="username">Korisničko ime:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="lozinka">Lozinka:</label>
                                    <input type="password" class="form-control" id="lozinka" name="lozinka" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="prijava">Prijava</button>
                            </form>
                        </div>
                    </div>
                <?php } 
                ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>Zelena gradnja &copy; 2024</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
