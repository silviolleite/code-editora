<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <?php
    if(Auth::check()){
        $navbar = Navbar::withBrand(config('app.name', 'Editora'), url('/'))->inverse();

        $links = Navigation::links([
            [
                'link' => route('categories.index'),
                'title' => 'Categoria'
            ],
            [
                'link' => route('books.index'),
                'title' => 'Livros'
            ]
        ]);

        $logout = Navigation::links([
            [
                Auth::user()->name,
                [
                    [
                        'link' => url('/logout'),
                        'title' => 'Logout',
                        'linkAttributes' => [
                            'onclick' => "event.preventDefault();document.getElementById(\"logout-form\").submit();"
                        ]
                    ]
                ]
            ]
        ])->right();
        $navbar->withContent($links)->withContent($logout);
    }
    ?>
    @if(Auth::check())
        {!! $navbar !!}
        {!! Form::open(['url' => url('/logout'), 'id' => 'logout-form', 'style' => 'display:none']) !!}
        {!! Form::close() !!}
    @endif
    @if(Session::has('message'))
        {!! Alert::success(Session::get('message'))->close() !!}
    @endif
    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
