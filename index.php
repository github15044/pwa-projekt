<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelena gradnja</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 
    <link rel="icon" href="favicon.png" type="image/png">

</head>
<body>

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

    <?php include 'connect.php';?>

    
    <div class="container mt-4">
   <!-- Prvi red kartica -->
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika1.jpg" class="card-img-top" alt="Opis slike 1">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Gradnja kuće</a></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika2.jpg" class="card-img-top" alt="Opis slike 2">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Prirodna rješenja</a></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika3.jpg" class="card-img-top" alt="Opis slike 3">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Energetski certifikati</a></h5>
            </div>
        </div>
    </div>
</div>

<!-- Drugi red kartica -->
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika4.jpg" class="card-img-top" alt="Opis slike 4">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Kako graditi zeleno</a></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika5.png" class="card-img-top" alt="Opis slike 5">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Važnost zelene gradnje</a></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="slike/slika6.jpg" class="card-img-top" alt="Opis slike 6">
            <div class="card-body">
                <h5 class="card-title"><a href="#">Energetska obnova</a></h5>
            </div>
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
