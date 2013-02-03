{{ render('partials.header') }}
<body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="pull-right">
            @if(!Auth::check())
            {{ HTML::link('login', 'Login') }}
            || {{ HTML::link('newuser', 'Create User') }}
            @else
            howdy
            @endif
            @if(Auth::check()) || 
            {{ HTML::link('logout', 'Logout') }} 
            @endif
            @if ( !Auth::guest() )
            
            @endif
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="{{ URL::base() }}">Home</a></li>
              @if ( !Auth::guest() )   
              <li>{{ HTML::link('../expenses/new', 'Create New') }}</li>
              <li>{{ HTML::link('../expenses/', 'Show Expenses') }}</li>
              <li>{{ HTML::link('vendors', 'Vendors') }}</li>
              <li>{{ HTML::link('types', 'Types') }}</li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
          <div class="row">
            @yield('content')
          </div>
          @yield('pagination')
        <div id="push"></div>
    </div><!--/container-->
{{ render('partials.footer') }}



    
