document.addEventListener("DOMContentLoaded", function () {
const quizContainer = document.getElementById("quiz-container");
const questionText = document.getElementById("question-text");
const optionsContainer = document.getElementById("options-container");
const timerElement = document.getElementById("time");
const scoreElement = document.getElementById("score-value");

let currentQuestionIndex = 0;
let score = 0;
let timer;

const questions = [
    {
        question: "¿Cuál es una marca de coches conocida por su lujo y elegancia?",
        options: ["Toyota", "Mercedes-Benz", "Honda", "Ford"],
        correctAnswer: "Mercedes-Benz"
    },
    {
        question: "¿Cuál de los siguientes no es un fabricante de automóviles?",
        options: ["Tesla", "Boeing", "Ferrari", "Chevrolet"],
        correctAnswer: "Boeing"
    },
    {
        question: "¿Qué significa SUV en el contexto de los automóviles?",
        options: ["Super Utility Vehicle", "Sports Utility Vehicle", "Small Utility Vehicle", "Speed Utility Vehicle"],
        correctAnswer: "Sports Utility Vehicle"
    },
    {
        question: "En el mundo de los coches, ¿qué significa el término 'híbrido'?",
        options: ["Un coche con dos motores", "Un coche con motor eléctrico", "Un coche con motor de gasolina y eléctrico", "Un coche de dos plazas"],
        correctAnswer: "Un coche con motor de gasolina y eléctrico"
    },
    {
        question: "¿Cuál es una característica común en los coches deportivos?",
        options: ["Gran capacidad de carga", "Alto consumo de combustible", "Diseño aerodinámico", "Tracción en las cuatro ruedas"],
        correctAnswer: "Diseño aerodinámico"
    },
    {
        question: "¿Cuál de los siguientes es un lenguaje de programación utilizado en el desarrollo web?",
        options: ["Java", "Python", "C++", "Swift"],
        correctAnswer: "Java"
    },
    {
        question: "¿En qué parte del documento HTML se enlaza generalmente un archivo de hoja de estilo CSS?",
        options: ["En el encabezado (head)", "Antes de la etiqueta body", "Después de la etiqueta body", "En el pie de página (footer)"],
        correctAnswer: "En el encabezado (head)"
    },
    {
        question: "¿Cuál de las siguientes es una propiedad de estilo CSS que se utiliza para cambiar el color del texto?",
        options: ["font-size", "margin", "color", "padding"],
        correctAnswer: "color"
    },
    {
        question: "En JavaScript, ¿cómo se declara una variable?",
        options: ["variable x;", "let x;", "var x;", "const x;"],
        correctAnswer: "let x;"
    },
    {
        question: "¿Cuál de las siguientes NO es una función de arreglo en JavaScript?",
        options: ["map()", "fold()", "filter()", "reduce()"],
        correctAnswer: "fold()"
    }
];


function startQuiz() {
    showQuestion();
    startTimer();

    // Event listener para el botón "Siguiente Pregunta"
    document.querySelector("button").addEventListener("click", nextQuestion);
}

function showQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    questionText.textContent = currentQuestion.question;

    // Limpiar opciones anteriores
    optionsContainer.innerHTML = "";

    // Mostrar opciones
    currentQuestion.options.forEach(function (option) {
    const button = document.createElement("button");
    button.textContent = option;
    button.addEventListener("click", function () {
        checkAnswer(option);
    });
    optionsContainer.appendChild(button);
    });
}

function startTimer() {
    let time = 10; // segundos
    timer = setInterval(function () {
    timerElement.textContent = time;
    time--;

    if (time < 0) {
        // Cuando se agota el tiempo, pasar a la siguiente pregunta
        clearInterval(timer);
        nextQuestion();
    }
    }, 1000);
}

function stopTimer() {
    clearInterval(timer);
}

function checkAnswer(selectedOption) {
    const currentQuestion = questions[currentQuestionIndex];
    if (selectedOption === currentQuestion.correctAnswer) {
    score++;
    scoreElement.textContent = score;
    }
    nextQuestion();
}

function nextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
    showQuestion();
    stopTimer();
    startTimer();
    } else {
    endQuiz();
    }
}

function endQuiz() {
    clearInterval(timer);
    quizContainer.innerHTML = `<h2>Fin del juego</h2>
    <p>Puntos Finales: ${score} de ${questions.length}</p>
    <p>Volver a la <a href="./PHP/Contacto.php">Pagina anterior</a></p>`;
    document.querySelector("button").style.display = "none";
}

startQuiz();
});
