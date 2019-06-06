<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GlicoCheck</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    </head>
    <body>
            <section class="hero is-small is-primary is-bold">
                    <div class="hero-body">
                      <div class="container">
                      <div class="columns"> 
                      <div class="column is-11"> 
                        <h1 class="title" onclick="location.href = '/'">
                          GlicoCheck
                        </h1>
                      </div>
                      <div class="column is-1"><a href="/users/create" style=" text-decoration: underline;">Cadastre-se</a></div> 
                      </div>
                      </div>
                    </div>
                  </section>
        <section class="section">
            <div class="container">
                <div class="columns is-mobile">
                        <div class="column">
                            @yield('content')
                        </div>
                    </div>
            </div>
            
        </section>
    </body>
</html>
