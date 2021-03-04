<!DOCTYPE html>
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
<html>
    <head>
        <title>Cities</title>
    </head>
    <body>
    <div class="bg-dark">
        <h1>Cities App</h1>
    </div>
    @if(session()->get('success'))
    <div class="toast toast-succcess">
        {{session()->get('success')}}
    </div>
    @endif
        <!--<div class="s-rounded">-->
         @yield('content') 
    <div class="bg-dark">
         <br>
         <br>
    </div> 
    </body>
</html>