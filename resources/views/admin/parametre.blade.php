@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/parametre.css">

     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav')
            <!-- main -->
            
            <div class="main-content">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="con" style="min-height: 500px;" >

   <div class="container_form">
   
    <div class="container">
      <form action="/admin/param/add?Param={{$tag}}" method="POST">
        @csrf
        <div style="display: flex; justify-content: center;">
        <h3 style="color: white;" >{{$tag }}</h3>
        </div>
      <div id="formfield">
      @foreach($data as $index => $serv)
    <input type="text" name="services[{{ $serv['id'] }}]" class="text" size="50" placeholder="Name" value="{{ $serv['name'] }}">
@endforeach

      </div>
      <input name="submit" type="Submit" value="Envoyer">
    </form>
      <div class="controls">
        <button class="add" onclick="add()">Ajouter</button>
      </div>
    </div>

   </div>
            </div>


            
   @push('scripts')
   
   <script src="{{ asset('/js/parametre.js')}}"></script>

        @endpush
        </div>
   
    @endsection