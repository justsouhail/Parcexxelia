


function add(){
  var newField = document.createElement('input');
  newField.setAttribute('type','text');
  newField.setAttribute('name','newservices[]');
  newField.setAttribute('class','text');
  newField.setAttribute('siz',50);

  var formfield = document.getElementById('formfield');
  formfield.appendChild(newField);
}




