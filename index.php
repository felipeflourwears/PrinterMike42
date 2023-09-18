<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game CocaCola</title>
    <link rel="icon" href="img/coca.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .btn-red {
        background-color: rgba(214,36,60,1) !important;
        color: white !important;
        font-size: 30px !important;
        padding: 10px !important;
        width: 100px;
        height: 50px;
        border: transparent !important;
        transition: background-color 0.3s ease; /* Agregar transición para suavizar el efecto de cambio de color */
        }

        /* Estilo de hover */
        .btn-red:hover {
            background-color: rgb(214, 36, 60) !important; /* Cambiar el color de fondo en hover */
        }
    </style>
</head>
<body><br>
    <h1 class="coca">
        <img src="img/logo.png" class="imgcoca" alt="Coca Cola" width="650" height="160">
    </h1>
    <main>
     <section class="section1">
        <h1>Memory Game</h1>
        <table>
            <tr>
                <td><button id="0" onclick="destapar(0)"></button></td>
                <td><button id="1" onclick="destapar(1)"></button></td>
                <td><button id="2" onclick="destapar(2)"></button></td>
                <td><button id="3" onclick="destapar(3)"></button></td>
            </tr>
            <tr>
                <td><button id="4" onclick="destapar(4)"></button></td>
                <td><button id="5" onclick="destapar(5)"></button></td>
                <td><button id="6" onclick="destapar(6)"></button></td>
                <td><button id="7" onclick="destapar(7)"></button></td>
            </tr>
            <tr>
                <td><button id="8" onclick="destapar(8)"></button></td>
                <td><button id="9" onclick="destapar(9)"></button></td>
                <td><button id="10" onclick="destapar(10)"></button></td>
                <td><button id="11" onclick="destapar(11)"></button></td>
            </tr>
            <tr>
                <td><button id="12" onclick="destapar(12)"></button></td>
                <td><button id="13" onclick="destapar(13)"></button></td>
                <td><button id="14" onclick="destapar(14)"></button></td>
                <td><button id="15" onclick="destapar(15)"></button></td>
            </tr>
        </table>
     </section>
     <section class="section2">
        <div class="horizontal-container">
            <h2 id="aciertos" class="estadisticas">Correct: 0</h2>
            <h2 id="t-restante" class="estadisticas">Time: 80 seconds</h2>
            <h2 id="movimientos" class="estadisticas">Moves: 0</h2>
            <button class="reloadButton" id="reloadButton">Try Again</button>
        </div>
        <!-- <div class="horizontal-container">
            <h2 id="movimientos" class="estadisticas">Moves: 0</h2>
            <button class="reloadButton" id="reloadButton">Try Again</button>
        </div> -->
     </section>
    

    <footer>
        
         <p>Game by Popatelier </p>
    </footer>
     
    </main>
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/script.js"></script>
</body>
</html>
