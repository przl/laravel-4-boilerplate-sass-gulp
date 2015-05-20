<!-- views/layouts/master.blade.php -->
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'default title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">

        @yield('meta')

        <!-- stylesheets -->
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css') }}
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css') }}

        	@yield('styles')

        {{ HTML::style('css/style.min.css') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js') }}

        <script>
            var URL = {
            'base' : '{{ URL::to('/') }}',
            'current' : '{{ URL::current() }}',
            'full' : '{{ URL::full() }}'
            };
        </script>

    </head>

    <body>

        @include('templates.header')

        @include('templates.navbar')

        <main role="main" id="main">

        	@yield('content')

        </main>

        @include('templates.footer')

        <!-- scripts -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js') }}

        	@yield('scripts')

        {{ HTML::script('app/app.min.js') }}

    </body>

</html>