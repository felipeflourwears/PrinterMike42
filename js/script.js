let tarjetasDestapadas = 0;
let tarjeta1 = null;
let tarjeta2 = null;
let primerResultado = null;
let segundoResultado = null;
let movimientos = 0;
let aciertos = 0;
let temporizador = false;
let timer = 80;
let timerInicial = 80;
let tiempoRegresivoId = null;

let mostrarMovimientos = document.getElementById("movimientos");
let mostrarAciertos= document.getElementById("aciertos");
let mostrarTiempo= document.getElementById("t-restante");

const reloadButton = document.getElementById("reloadButton");


//let numbers = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
let numbers = ["pop.png","pop.png","ades.png","ades.png","clara.png","clara.png","coca.png","coca.png","power.png","power.png","powerade.png","powerade.png","santaclara.png","santaclara.png","valle.png","valle.png"]
numbers = numbers.sort(()=>{return Math.random()-0.5});
console.log(numbers)



//FUNCIONES

function contarTiempo(){
    tiempoRegresivoId = setInterval(()=>{
        timer --;
        mostrarTiempo.innerHTML = `Time: ${timer} seconds`;
        if(timer==0){
            clearInterval(tiempoRegresivoId);
            bloquearTarjetas();
            console.log("LOST")
            Swal.fire({
                title: 'You Lost!',
                text: 'Try Again!',
                icon: 'error',
                html: `
                    <div style="color: red; font-size: 24px;">
                        Better luck next time! 😢🥤
                    </div>
                    <div style="font-size: 24px;">
                        Correct: ${aciertos} 😢💪
                    </div>
                    <div style="font-size: 24px;">
                        Time: ⏱️😢${timerInicial - timer} seconds
                    </div>
                    <div style="font-size: 24px;">
                        Moves: ${movimientos} 😢👎
                    </div>
                `,
                confirmButtonText: 'Close', // Cambio del texto del botón de confirmación
                customClass: {
                    confirmButton: 'btn-red',
                },
                buttonsStyling: false,
                allowOutsideClick: false,
            });
            
            //
        }
    },1000)
}

function bloquearTarjetas(){
    for(let i = 0; i<=15; i++){
        let tarjetaBloqueada = document.getElementById(i);
       /*  tarjetaBloqueada.innerHTML = numbers[i]; */
       tarjetaBloqueada.innerHTML = `<img src="./img/${numbers[i]}" alt="Imagen" style="width: 170px; height: 170px;">`;
        tarjetaBloqueada.disabled = true;
    }
}

function destapar(id){

    if(temporizador == false){
        contarTiempo();
        temporizador = true;
    }
    tarjetasDestapadas++;
    console.log(tarjetasDestapadas);
    if(tarjetasDestapadas == 1){
        //Mostrar primerResultado
        tarjeta1 = document.getElementById(id);
        primerResultado = numbers[id];
        /* tarjeta1.innerHTML = primerResultado; */
        tarjeta1.innerHTML = `<img src="./img/${primerResultado}" alt="Imagen" style="width: 170px; height: 170px;">`;

        //Deshabilitar primer boton
        tarjeta1.disabled = true;
    }else if(tarjetasDestapadas == 2){
        //Mostrar Segundo Numero
        tarjeta2 = document.getElementById(id);
        segundoResultado = numbers[id];
        /* tarjeta2.innerHTML = segundoResultado; */
        tarjeta2.innerHTML = `<img src="./img/${segundoResultado}" alt="Imagen" style="width: 170px; height: 170px;">`;

        //Deshabilitar Segundo Boton
        tarjeta2.disabled = true;
        movimientos++;
        mostrarMovimientos.innerHTML = `Moves: ${movimientos}`;

        if(primerResultado == segundoResultado){
            //Encerrar contador tarjetas encerradas
            tarjetasDestapadas = 0;

            //Aumentar aciertos
            aciertos ++;
            mostrarAciertos.innerHTML = `Correct: ${aciertos}`;

            if(aciertos == 8){
               // Llama al script PHP para imprimir el ticket utilizando Fetch
                fetch('./imprimir_ticket.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud');
                    }
                    return response.text();
                })
                .then(data => {
                    console.log(data); // Esto muestra la respuesta del servidor (puede ser un mensaje de éxito o error)
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                clearInterval(tiempoRegresivoId);
                mostrarAciertos.innerHTML =  `Correct: ${aciertos} 🥳​💪​`;
                mostrarTiempo.innerHTML = `Awesome! Only🔥​🥳​${timerInicial - timer} seconds`;
                mostrarMovimientos.innerHTML = `Moves: ${movimientos} 👍​😎​`;

               
                Swal.fire({
                    title: 'Congratulations!',
                    text: 'You Won!',
                    icon: 'success',
                    html: `
                        <div style="color: red; font-size: 24px;">
                            You're a <strong>Coca-Cola</strong> champion! 🏆🥤
                        </div>
                        <div style="font-size: 24px;">
                            Correct: ${aciertos} 🥳💪
                        </div>
                        <div style="font-size: 24px;">
                            Awesome! Only 🔥🥳${timerInicial - timer} seconds
                        </div>
                        <div style="font-size: 24px;">
                            Moves: ${movimientos} 👍😎
                        </div>
                    `,
                    confirmButtonText: 'Close', // Cambio del texto del botón de confirmación
                    customClass: {
                        confirmButton: 'btn-red', // Clase CSS personalizada para el botón de confirmación
                    },
                    buttonsStyling: false, // Desactivar los estilos predeterminados de SweetAlert2 para personalizar el botón
                    allowOutsideClick: false,
                });

                
                
            }

        }else{
            //Momentaneamente tarjetas
            setTimeout(()=>{
                tarjeta1.innerHTML = ' ';
                tarjeta2.innerHTML = ' ';
                tarjeta1.disabled = false;
                tarjeta2.disabled = false;
                tarjetasDestapadas = 0;

            },800);
        }
    }
}


// Función para ocultar todas las cartas
function ocultarTodasLasCartas() {
    for (let i = 0; i <= 15; i++) {
        let tarjeta = document.getElementById(i);
        tarjeta.innerHTML = '';
        tarjeta.disabled = false;
    }
}

// Función para barajar las cartas sin perder la correspondencia
function barajarCartas() {
    numbers = numbers.sort(() => Math.random() - 0.5);
    ocultarTodasLasCartas(); // Oculta todas las cartas al barajar
}

// Función para resetear el juego
function resetearJuego() {
    // Baraja las cartas sin perder la correspondencia
    barajarCartas();

    // Reiniciar variables
    tarjetasDestapadas = 0;
    tarjeta1 = null;
    tarjeta2 = null;
    primerResultado = null;
    segundoResultado = null;
    movimientos = 0;
    aciertos = 0;
    temporizador = false;
    timer = timerInicial;

    // Detener y reiniciar el temporizador
    clearInterval(tiempoRegresivoId);
    mostrarTiempo.innerHTML = `Time: ${timer} seconds`;

    // Restablecer las estadísticas
    mostrarMovimientos.innerHTML = `Moves: ${movimientos}`;
    mostrarAciertos.innerHTML = `Correct: ${aciertos}`;
}

// Agrega el event listener para recargar la página
reloadButton.addEventListener("click", function () {
    resetearJuego();
});
/*   document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
}); */




