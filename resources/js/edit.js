var editables = Array.from(document.getElementsByClassName('editable'));
var addables = Array.from(document.getElementsByClassName('addable'));

function edit(x, y){
  x.classList.toggle('d-none');
  y.classList.toggle('d-none');
}

function add(x){
   var input = document.createElement('input');
   input.type="text";
   input.name="newtag"
   input.placeholder="New Tag"
   input.classList.add('form-control');
   x.after(input);





}
editables.forEach(element => {
  element.addEventListener('dblclick',() =>{
    edit(element, element.nextElementSibling);
  })
  
});

addables.forEach(element => {
  element.addEventListener('click',()=>{
    add(element)
  })
});