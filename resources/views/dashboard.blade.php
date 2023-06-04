@extends('layouts.app')


    @section('content')

    @push('css')
    <link rel="stylesheet" href="/css/style.css">
    
     @endpush
    <body style="margin-top: 0;">
        <input type="checkbox" id="menu-toogle">

        <!-- sidebar -->

       @include('sidebar')
            <!-- navbar -->
            @include('nav', ['route' => $route])

            <!-- main -->
            <div class="main-content" >
                <!-- cartes section -->
                    <div class="cartes">
                        <a href="/Employes">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>{{$user_num}}</h1>
                                <span>Utilisateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-conference-96.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/Materiel">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>{{$cate}}</h1>
                                <span>Categories</span>
                            </div>
                            <div>
      
                            <span><img src="/images/icons8-categorize-96.png"/></span>                            </div>
                        </div>
                        </a>
                      
                        <a href="/Materiel">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>{{$total}}</h1>
                                <span>Composantes</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-technology-96.png"/></span>                            </div>
                        </div>
                        </a>        
                                                  
                                                                        
                    </div>
                    <!-- tables users -->
                    <div class="users">
                    <div class="chart-container">
    <div id="piechart1" class="chart"></div>
    <div id="piechart2" class="chart"></div>
    <div id="piechart3" class="chart"></div>
    <div id="piechart4" class="chart"></div>

</div>

</div>

                    </div>
                    <footer class="foot">
                <div class="footercontent">
                <h3><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="ex" ></span> <span>ParcInfo</span></h3>
                    <p>À propos de l'application ParcInfo développée par souhail AROUD pour Exxelia,
                         cette solution permet à la société de surveiller de manière proactive son parc informatique.
                         Avec une interface conviviale et des fonctionnalités avancées,
                          cette application offre une expérience utilisateur optimale pour assurer une surveillance efficace des systèmes informatiques de l'entreprise.  </p>
                          
               
                <ul class="list">
                    <li><a href="mailto:souhailaroud09@gmail.com us">Contact</a></li>
                    <li><a href="https://exxelia.com/en/" target="_blank">Exxelia</a></li>
                </ul>
                </div>
                <div class="footer-bottom">
                   <div>
                   <p>Copyright &copy;2023 ParcInfo . Developped by <span>Souhail AROUD</span> </p>
                   </div>
                </div>
</footer>
        
    </div>
            <!-- footer -->
  
       
    </body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
     if (navigator.onLine) {
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawCharts);
    } else {
        console.log('off');
        document.getElementById('noInternetMessage').style.display = 'block';
        document.getElementById('chartContainer').style.display = 'none';
    }


    function drawCharts() {
      

        var data1 = google.visualization.arrayToDataTable([
            ['Task', 'Count'],
            ['Ordinateur', <?php echo $count_ord; ?>],
            ['Imprimante', <?php echo $count_imprimante; ?>],
            ['Moniteur', <?php echo $count_moniteurs; ?>],
            ['Mobile', <?php echo $count_mobile; ?>],
            ['Reseau', <?php echo $count_reseau; ?>],
            ['Telephone fixe', <?php echo $count_fixe; ?>],
            ['Distibuteur de tickets', <?php echo $count_ticket; ?>],


           
        ]);
                
        var options1 = {    
            title: 'Les categories du materiel' ,
            is3D: true,

             width: 500,
    height: 400
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data1, options1);

        var data2 = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
          <?php echo $services; ?>
        ]);

        var options2 = {
            title: 'Les Services ' ,
            is3D: true,

            width: 500,
    height: 400
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart2.draw(data2, options2);



        var data3 = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
          <?php echo $models; ?>
        ]);

        var options3 = {
            title: 'Les Models les plus répondus' ,
            is3D: true,

            width: 500,
    height: 400
        };

        var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart3.draw(data3, options3);



        var data4 = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
          <?php echo $marques; ?>
        ]);

        var options4 = {
            title: 'Les marques les plus répondus' ,
            is3D: true,

            width: 500,
    height: 400
        };

        var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart4.draw(data4, options4);
    }
 

</script>







    
    @endsection