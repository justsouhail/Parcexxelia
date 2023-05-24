@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/employe_info.css">
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
            <div class="users" style="min-height: 700px;" >
        
   <form action="/admin/SendEmail" method="post" >
    @csrf
        <input type="text" name="email">
        <button type="submit">bbb</button>
   </form>
            
   @push('scripts')
   <script src="{{ asset('/js/employes.js')}}"></script>
   

        @endpush
        </div></div>
    @endsection