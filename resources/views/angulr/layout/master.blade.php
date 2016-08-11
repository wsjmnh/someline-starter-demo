<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Someline Starter</title>
    <meta name="keywords" content="laravel,restful,api,vue.js,vuejs"/>
    <meta name="description"
          content="Someline Starter is a framework for quick building Web Apps or APIs, with modern PHP design pattern foundation, which is built on top of popular Laravel 5 framework, Vue.js, Restful API, Repository Design, OAuth2, JWT, Unit Tests, isolated front-end and back-end layer."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="{{url(elixir("css/app.src.css"))}}" type="text/css"/>
    @stack('stylesheets')
    <script type="text/javascript">
        <?php
                $user = \Auth::user();
                if ($user) {
                    $user->setVisible([
                            'user_id',
                            'name',
                    ]);
                    $user = $user->toArray();
                } else {
                    $user = new ArrayObject();
                }
                echo 'window.Someline = ' . json_encode([
                                'csrfToken' => csrf_token(),
                                'jwtToken' => jwt_token(),
                                'state' => [
                                        'user' => $user,
                                ]
                        ]); ?>;
    </script>
</head>
<body>
<div id="app" class="app app-header-fixed @yield('div.app.class')">

    @yield('app')

</div>

<script src="{{url(elixir("js/app.src.js"))}}"></script>
@stack('scripts')
</body>
</html>
