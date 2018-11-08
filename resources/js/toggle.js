var toggle = document.getElementById('container');
var toggleContainer = document.getElementById('toggle-container');
var toggleNumber;
var input = document.getElementById('on-off');

toggle.addEventListener('click', function() {
	toggleNumber = !toggleNumber;
	if (toggleNumber) {
    
		toggleContainer.style.clipPath = 'inset(0 50% 0 0)';
		toggleContainer.style.backgroundColor = 'dodgerblue';
	} else {
		toggleContainer.style.clipPath = 'inset(0 0 0 50%)';
    toggleContainer.style.backgroundColor = '#D74046';
  }
  input.value = toggleNumber;
	console.log(toggleNumber);
});