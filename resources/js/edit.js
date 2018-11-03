var editables = Array.from(document.getElementsByClassName('editable'));



function edit(x, y){
  x.classList.toggle('d-none');
  y.classList.toggle('d-none');
}

editables.forEach(element => {
  element.addEventListener('dblclick',() =>{
    edit(element, element.nextElementSibling);
  })
  
});
