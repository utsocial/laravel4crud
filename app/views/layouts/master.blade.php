<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>
            @section('title')
               Laravel Simple CRUDL
            @show
        </title>
        
        @section('styles')
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        @show
        
    </head>
    
    <body>
        
        <div class="container">
            
            @section('header1')
                <h1>Simple CRUDL - Laravel </h1>
            @show
            
            @include('layouts.navbar', array('viewProperties' => $viewProperties))
            
            @section('content')
                <div>Nothing to show in the content</div>
            @show

        </div>
    </body>
</html>