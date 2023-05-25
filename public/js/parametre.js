


function add(){
  var newField = document.createElement('input');
  newField.setAttribute('type','text');
  newField.setAttribute('name','text');
  newField.setAttribute('class','text');
  newField.setAttribute('siz',50);
  newField.setAttribute('placeholder','Optional Field');
  var formfield = document.getElementById('formfield');
  formfield.appendChild(newField);
}




