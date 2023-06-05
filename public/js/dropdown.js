document.addEventListener('DOMContentLoaded', function() {
    console.log('ddd');


  var dropdown = document.getElementById("dropdown");
  dropdown.addEventListener("click", function() {
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
  });