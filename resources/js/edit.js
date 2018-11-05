var editables = Array.from(document.getElementsByClassName('editable'));
var addables = Array.from(document.getElementsByClassName('addable'));
var togglables = Array.from(document.getElementsByClassName('togglable'));

function edit(x, y){
  x.classList.toggle('d-none');
  y.classList.toggle('d-none');
}

function add(x,y){
   var input = document.createElement('input');
   input.type="text";
   input.name="new"+y;
   input.placeholder="New "+y;
   input.classList.add('form-control');
   x.after(input);
}

function toggle(x){
x.classList.toggle('d-none');
}

editables.forEach(element => {
  element.addEventListener('dblclick',() =>{
    edit(element, element.nextElementSibling);
  })
  
});

addables.forEach(element => {
  element.addEventListener('click',()=>{
    add(element,element.parentElement.className)
  })
});

togglables.forEach(element => {
  element.addEventListener('click',()=>{
    toggle(element.nextElementSibling);
  })
});