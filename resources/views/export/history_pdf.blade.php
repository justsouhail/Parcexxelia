@extends('layouts.app')


    @section('content')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/history.css">

    @push('css')
    <style>

table {
 
    
    border-collapse: collapse;
    width: 800px;
    height: 200px;
    border: 1px solid #bdc3c7;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}



th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#header {
    background-color: #1816a0;
    color: #fff;
}

.bl{
    background: rgb(0,21,36);
    background: linear-gradient(90deg, rgba(0,21,36,1) 0%, rgba(24,22,160,1) 46%);
}
.table-container{
    background-color: #ddd;
}
</style>
   


     @endpush
     <body>

<div style="display: flex; justify-content: space-between; align-items: center;">
<div class="logo" >
<h1>
    <div style="display: flex; align-items: center;">
        <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px;" id="img-logo"></span>
        <span style="color: black;">ParcInfo</span> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;    <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/Exxelia.png'))) }}" alt="" style="width: 120px;"></span>
    </div>

</h1>

            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Historique d'utilisation</u></h2>
  </div>
  <div>
  <div class="card-body  bl " >
        <div class="table-container">
            <table style="    background-color: #ddd;">
                <tr id="header">
                    <th>Date d'affectation</th>
                    <th>Utilisateur</th>
                </tr>
                @foreach($history as $hs) 
                <tr>
                    <td>{{$hs->date_affectation}}</td>
                    <td>{{$hs->employes->Nom}} {{$hs->employes->Prenom}}</td>
                </tr>
                @endforeach
              
             
            </table>
        </div>
    </div>
  

  </div>
  <div style="padding-left: 20px; margin-top: 3rem;"> <strong>Le {{ now()->format('Y-m-d H:i:s') }}</strong>

</div>

</body>
    @endsection