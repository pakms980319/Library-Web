const selectElement = document.getElementById('graph_menu');
const divElements = document.querySelectorAll('.graphSelect');

selectElement.addEventListener('change', function() {
  const selectedValue = selectElement.value;

  divElements.forEach(function(divElement) {
    divElement.style.display = 'none';
  });

  const matchingDiv = document.getElementById(selectedValue);
  matchingDiv.style.display = 'block';
});