<?php
$lunghezzaPsw = $_GET['lunghezzaPsw'];
echo $lunghezzaPsw;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <span id="warning-text">Nessun parametro valido inserito</span>
        </div>
        <div id="input-div" class="d-flex flex-column">
            <form action="" method="get" id="form">
                <label for="lunghezzaPsw">Lunghezza Password:</label>
                <input type="text" name="lunghezzaPsw"> <br>
                <label for="ripetizioneCaratteri">Consenti ripetizioni di uno o piu caratteri:</label>
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