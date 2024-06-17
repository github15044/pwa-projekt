<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zelena gradnja - Novosti</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> <!-- Link na vanjsku CSS datoteku -->
    <link rel="icon" href="favicon.png" type="image/png">
    <!-- Link na favicon -->
</head>
<body>
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
           

            <!-- <div class="card-header">
                Novosti Naziv kartice 
            </div> -->
            <h5 class="card-title1">Prirodna rješenja</h5>
            <p class="card-datum">07/06/2024</p> <!-- Datum pisanja -->
            <img src="slike/slika2.jpg" class="card-img-novosti" alt="Opis slike Novosti">
            <div class="card-body">
                <p class="card-text">Ne možemo sa sigurnošću reći koliko će velik utjecaj imati klimatske promjene na naš život, već neizvjesno čekamo znanstvene procjene najvjerojatnijih ishoda. Svaka promjena klime tijekom nekog razdoblja, bila ona uvjetovana prirodnim promjenama ili je nastala kao rezultat ljudskog djelovanja, ostavila je vidljive učinke na naš životni prostor. Ledenjaci su se smanjili, ledeni pokrov se otapa rekordnom brzinom, toplinski valovi su sve jači, a promjene u staništima i među vrstama koje ih nastanjuju narušavaju prirodnu ravnotežu ekosustava. Sve promjene u okolišu, uz klimatske promjene, ugrožavaju kvalitetu naših života prijeteći na globalnoj razini proizvodnji i zalihama hrane te sigurnosti i zdravlju živih bića. Pod ublažavanjem klimatskih promjena podrazumijevaju se mehanizmi smanjenja emisija stakleničkih plinova koji bi nam trebali omogućiti lakši život u budućnosti. S obzirom na to da je ublažavanje klimatskih promjena dugotrajan proces, potrebno je istovremeno učiti živjeti s posljedicama klimatskih promjena i prilagođavati se na novonastale uvjete. 
                    Prema Međuvladinom panelu o klimatskim promjenama (eng. Intergovernmental Panel on Climate Change, IPCC), adaptacija je definirana kao prilagodba na već promijenjenu ili očekivanu novu klimu. Za ljude, ona se temelji na procesima kojima se ublažava šteta ili iskorištavaju mogućnosti koje donose korist. Prema tome, bitno je raditi na pronalasku rješenja za ublažavanje nastale štete te iskoristiti svaku priliku za lakše nošenje s posljedicama kroz nadogradnju vlastite otpornosti i kapaciteta prilagodljivosti. Neka od rješenja, nadahnuta i podržana prirodom, izravno utječu na dobrobit biološke raznolikosti. Prirodna rješenja (eng. Nature-based solutions, NbS) relativno su nov i inovativan koncept strateškog korištenja prirode u svrhu odgovora na nove ekološke i društvene izazove.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
