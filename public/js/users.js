document.addEventListener('DOMContentLoaded', function() {


    const input =  document.querySelector('.bar-recherche input');
    var table_rows = document.querySelectorAll('tbody tr');
    var table_head = document.querySelectorAll('thead td');
            // search

            console.log(input);
    input.addEventListener('input' , function (e){
        table_rows.forEach((row , i)=>{
            let row_data = row.textContent;
            let input_data =  input.value;

            row.classList.toggle('hide' , row_data.indexOf(input_data)<0);
            row.style.setProperty('--delay' ,i/25 +'s');
          })
    });

    // filter

    table_head.forEach((head ,  i)=>{
        let sort_ascendant = true;
        head.onclick = ()=>{
            table_head.forEach(head =>head.classList.remove('active'));
         head.classList.add('active')   ;
                document.querySelectorAll('tbody td').forEach(td=>td.classList.remove('active'));
            table_rows.forEach(row =>{
            row.querySelectorAll('td')[i].classList.add('active');
            })
            head.classList.toggle('asc' ,sort_ascendant);
            sort_ascendant = head.classList.contains('asc') ? false : true;
            
            
            sorttable(i , sort_ascendant);

        }
    })
 

    function sorttable(i , sort_ascendant){
    [...table_rows].sort((a,b)=>{
        let first_row = a.querySelectorAll('tbody td')[i].textContent.toLowerCase();
        let second_row = b.querySelectorAll('tbody td')[i].textContent.toLowerCase();

       return sort_ascendant ? (first_row < second_row ? 1 : -1) :  (first_row > second_row ? 1 : -1);
     
    }).map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
    }

 

})




document.addEventListener('DOMContentLoaded', function() {
    var data = document.querySelector('#data');
    var nav = document.createElement('div');
    nav.setAttribute('id', 'nav');
    data.parentNode.insertBefore(nav, data.nextSibling);
  
    var rowsShown = 20;
    var rowsTotal = data.getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
    var numPages = Math.ceil(rowsTotal/rowsShown);
  
    for (var i = 0; i < numPages; i++) {
      var pageNum = i + 1;
      var link = document.createElement('a');
      link.setAttribute('href', '#');
      link.setAttribute('rel', i);
      
      link.textContent = pageNum + ' ';
      nav.appendChild(link);
    }
  
    var tableRows = data.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (var j = 0; j < tableRows.length; j++) {
      if (j >= rowsShown) {
        tableRows[j].style.display = 'none';
      }
    }
  
    nav.querySelector('a:first-child').classList.add('active');
  
    var navLinks = nav.getElementsByTagName('a');
    for (var k = 0; k < navLinks.length; k++) {
      navLinks[k].addEventListener('click', function(event) {
        event.preventDefault();
  
        for (var l = 0; l < navLinks.length; l++) {
          navLinks[l].classList.remove('active');
        }
        this.classList.add('active');
  
        var currPage = parseInt(this.getAttribute('rel'));
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
  
        for (var m = 0; m < tableRows.length; m++) {
          if (m < startItem || m >= endItem) {
            tableRows[m].style.opacity = '0';
            tableRows[m].style.display = 'none';
          } else {
            tableRows[m].style.display = 'table-row';
            tableRows[m].style.opacity = '1';
          }
        }
      });
    }
    navLinks[0].click();
  });
  



  

