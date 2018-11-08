var editables = Array.from(document.getElementsByClassName('editable'));
var addables = Array.from(document.getElementsByClassName('addable'));
var togglables = Array.from(document.getElementsByClassName('togglable'));
var count= 0;
var arrowables = Array.from(document.getElementsByClassName('arrowable'));

function edit(x, y){
  x.classList.toggle('d-none');
  y.classList.toggle('d-none');
}

function add(x,y){
   var input = document.createElement('input');
   input.type="text";
   input.name="new"+y+count;
   input.placeholder="New "+y;
   input.classList.add('form-control');
   x.after(input);
   count++
}

function toggle(x){
x.classList.toggle('d-none');
}

function demiTour(x) {
  x.classList.toggle('demitour');
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

arrowables.forEach(element => {
  element.addEventListener('click',()=>{
    demiTour(element.firstElementChild);
  })
});