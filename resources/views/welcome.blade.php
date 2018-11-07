<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo-List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!--  CSRF Token -->        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="http://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://getbootstrap.com/docs/4.1/examples/album/album.css">
    </head>
    <body class="text-center">
        <div class="cover-container d-flex w-auto h-auto p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                <h3 class="masthead-brand">TODO-LIST</h3>                        
                </div>
            </header>
        
            <main role="main" class="inner cover">
                <div id="app">
                    <todo-list></todo-list>
                </div>
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
