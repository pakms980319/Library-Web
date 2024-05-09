const divIds = ['recommendBook1', 'recommendBook2', 'recommendBook3'];

let currentIndex = 0;
let timerId;

function rotateDiv() {
  const currentDivId = divIds[currentIndex];

  divIds.forEach((divId) => {
    const div = document.getElementById(divId);
    div.style.display = 'none';
  });

  const currentDiv = document.getElementById(currentDivId);
  currentDiv.style.display = 'block';

  currentIndex = (currentIndex + 1) % divIds.length;

  timerId = setTimeout(rotateDiv, 3000);
}

function init() {
  rotateDiv();
}

init();
