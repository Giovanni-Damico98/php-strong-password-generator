<?php
// Recupero i valori dal form e controllo se sono vuoti
$lunghezzaPsw = isset($_GET['lunghezzaPsw']) ? $_GET['lunghezzaPsw'] : '';
$lettere = isset($_GET['lettere']) ? 'lettere' : '';
$numeri = isset($_GET['numeri']) ? 'numeri' : '';
$simboli = isset($_GET['simboli']) ? 'caratteri_speciali' : '';
// Filtra i valori non selezionati
$caratteri = array_filter([$lettere, $numeri, $simboli]);
// Trasforma l'array in stringa
$caratteri = implode(',', $caratteri);
$passwordGenerata = 'Inserisci una lunghezza da 0 a 30 e seleziona almeno un tipo di carattere';

// Verifica che sia stata impostata una lunghezza valida e che ci siano caratteri selezionati
if (!empty($lunghezzaPsw) && $lunghezzaPsw < 31 && $lunghezzaPsw > 0 && !empty($caratteri)) {
    // Chiama la funzione per generare la password
    $passwordGenerata = generaPassword($lunghezzaPsw, $caratteri);
} else {
    // Oppure genero un avviso attraverso una stringa
    $passwordGenerata = 'Inserisci una lunghezza da 0 a 30 e seleziona almeno un tipo di carattere';
}

// Funzione per generare la password
function generaPassword($lunghezzaPsw, $caratteri)
{
    $simboli = array();
    $simboli_utilizzati = '';
    $pass = '';

    $simboli["lettere"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $simboli["numeri"] = '1234567890';
    $simboli["caratteri_speciali"] = '!?~@#-_+<>[]{}';

    // Ottengo il tipo di caratteri da utilizzare nella password
    $caratteri = mb_split(",", $caratteri);
    foreach ($caratteri as $value) {
        // Costruisco la stringa con tutti i caratteri selezionati
        $simboli_utilizzati .= $simboli[$value];
    }

    $simboli_lunghezza = strlen($simboli_utilizzati) - 1;
    for ($i = 0; $i < $lunghezzaPsw; $i++) {
        // Seleziona un carattere casuale
        $n = rand(0, $simboli_lunghezza);
        // Lo aggiunge alla stringa %pass ad ogni ciclo
        $pass .= $simboli_utilizzati[$n];
    }

    return $pass; // Restituisce la password generata quando $i arriva a $lunghezzaPsw
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
    <link rel="stylesheet" href="style.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>

<body>
    <div id="main-container" class="container-fluid d-flex flex-column align-item-center text-center">
        <div id="title-div">
            <h1 class="mt-3">Strong Password Generator</h1>
            <h3>Genera una password sicura</h3>
        </div>
        <div id="warning-div">
            <span id="warning-text">
                <!-- Se la $passwordGenerata è popolata allora la stampo sennò "Nessun parametro valido..." -->
                <!-- Aggiungo un if per aggiungere la classe fw-bold solo quando la password è generata -->
                <?php
                if (isset($passwordGenerata)) {
                    echo '<span class="fw-bold">' . $passwordGenerata . '</span>';
                } else {
                    echo '<span>Nessun parametro valido inserito</span>';
                }
                ?>
            </span>
        </div>
        <div id="input-div" class="d-flex flex-column">
            <form action="" method="get" id="form">
                <label for="">Lunghezza Password:</label>
                <input type="text" name="lunghezzaPsw"> <br>
                <!-- Da implementare -->
                <label for="">Consenti ripetizioni di uno o piu caratteri:</label>
                <span>Si</span> <input type="radio" name="ripetizioneCaratteri" value="si" />
                <span>No</span> <input type="radio" name="ripetizioneCaratteri" value="no" />
                <br>
                <input type="checkbox" name="lettere" value="lettere" /> Lettere
                <br />
                <input type="checkbox" name="numeri" value="numeri" /> Numeri
                <br />
                <input type="checkbox" name="simboli" value="simboli" /> Simboli
                <br>
                <button type="submit" class="btn btn-primary">Invia</button>
                <button type="reset" class="btn btn-danger">Annulla</button>
            </form>
        </div>
    </div>
</body>

</html>