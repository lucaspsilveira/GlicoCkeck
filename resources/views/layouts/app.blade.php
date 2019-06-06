<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'GlicoCheck') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>
    <body>
            
              <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                  <a class="navbar-item" href="/">
                    <p>GlicoCheck</p>
                  </a>
              
                  <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                  </a>
                </div>
              
                <div id="navbarBasicExample" class="navbar-menu">
                  <div class="navbar-start">
                    {{-- <a class="navbar-item">
                      Inicial
                    </a>
                    <a class="navbar-item">
                      Documentation
                    </a> --}}
              
                    
                  </div>
              
                  <div class="navbar-end">
                    <div class="navbar-item">
                      <div class="buttons">
                        @guest
                            <a class="button is-primary" href="{{ route('register') }}">
                              <strong>Cadastrar-se</strong>
                            </a>
                            @if (Route::has('register'))
                              <a class="button is-light"  href="{{ route('login') }}">
                                Log in
                              </a>
                            @endif
                          @else
                          <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }}
                            </a>
                    
                            <div class="navbar-dropdown">
                             
                              <hr class="navbar-divider">
                              <a class="navbar-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Sair
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                          </div>
                        @endguest
                        
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
                
        <section class="section">
            <div class="container">
                <div class="columns is-mobile">
                        <div class="column">
                            @yield('content')
                        </div>
                    </div>
            </div>
            
        </section>
      <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

              // Add a click event on each of them
              $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                  // Get the target from the "data-target" attribute
                  const target = el.dataset.target;
                  const $target = document.getElementById(target);

                  // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                  el.classList.toggle('is-active');
                  $target.classList.toggle('is-active');

                });
              });
            }

            });
      </script>
    </body>
</html>
