<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelena gradnja - Registracija</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 
    <link rel="icon" href="favicon.png" type="image/png">
    
</head>
<body>
    <?php
    include 'connect.php'; 

    $msg = '';
    $registriranKorisnik = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ime = $_POST['ime'] ?? ''; 
        $prezime = $_POST['prezime'] ?? ''; 
        $username = $_POST['username'] ?? ''; 
        $lozinka = $_POST['pass'] ?? ''; 
        $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT); 
        $razina = 0;

     
        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $msg = 'Korisničko ime već postoji!';
        } else {
            // Register new user
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
        mysqli_close($dbc);
    }
    ?>

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
        <div class="card">
            <h5 class="card-title1">Registracija</h5>
            <div class="card-body">
                <?php if ($registriranKorisnik): ?>
                    <p>Korisnik je uspješno registriran!</p>
                <?php else: ?>
                    <form enctype="multipart/form-data" action="registracija.php" method="POST">
                        <div class="form-item">
                            <span id="porukaIme" class="bojaPoruke"></span>
                            <label for="ime">Ime: </label>
                            <div class="form-field">
                                <input type="text" name="ime" id="ime" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPrezime" class="bojaPoruke"></span>
                            <label for="prezime">Prezime: </label>
                            <div class="form-field">
                                <input type="text" name="prezime" id="prezime" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaUsername" class="bojaPoruke"></span>
                            <label for="username">Korisničko ime:</label>
                            <?php echo '<br><span class="bojaPoruke">'.$msg.'</span>'; ?>
                            <div class="form-field">
                                <input type="text" name="username" id="username" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPass" class="bojaPoruke"></span>
                            <label for="pass">Lozinka: </label>
                            <div class="form-field">
                                <input type="password" name="pass" id="pass" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPassRep" class="bojaPoruke"></span>
                            <label for="passRep">Ponovite lozinku: </label>
                            <div class="form-field">
                                <input type="password" name="passRep" id="passRep" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <button type="submit" value="Prijava" id="slanje">Prijava</button>
                        </div>
                    </form>
                <?php endif; ?>
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
    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {
            var slanjeForme = true;

            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border = "1px dashed red";
                document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!<br>";
            } else {
                poljeIme.style.border = "1px solid green";
                document.getElementById("porukaIme").innerHTML = "";
            }

            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border = "1px dashed red";
                document.getElementById("porukaPrezime").innerHTML = "<br>Unesite prezime!<br>";
            } else {
                poljePrezime.style.border = "1px solid green";
                document.getElementById("porukaPrezime").innerHTML = "";
            }

            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border = "1px dashed red";
                document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!<br>";
            } else {
                poljeUsername.style.border = "1px solid green";
                document.getElementById("porukaUsername").innerHTML = "";
            }

            var poljePass = document.getElementById("pass");
            var pass = document.getElementById("pass").value;
            var poljePassRep = document.getElementById("passRep");
            var passRep = document.getElementById("passRep").value;
            if (pass.length == 0 || passRep.length == 0 || pass !== passRep) {
                slanjeForme = false;
                poljePass.style.border = "1px dashed red";
                poljePassRep.style.border = "1px dashed red";
                document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!<br>";
                document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
            } else {
                poljePass.style.border = "1px solid green";
                poljePassRep.style.border = "1px solid green";
                document.getElementById("porukaPass").innerHTML = "";
                document.getElementById("porukaPassRep").innerHTML = "";
            }

            if (!slanjeForme) {
                event.preventDefault();
            }
        };
    </script>
</body>
</html>
