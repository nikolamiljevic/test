<nav class="navbar  navbar-expand-lg fixed-top navbar-light bg-light">
 
  <a class="navbar-brand" href="{{url('profile')}}">
      {{Auth::user()->name}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
          <a class="navbar-brand" href="{{url('admin')}}">
            Admin
          </a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="{{url('blogs')}}">
            Home
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-responsive-nav-link :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Log Out') }}
              </x-responsive-nav-link>
          </form>
            <div class="dropdown-divider"></div>
          
          </div>
        </li>
   
      </ul>
     
    </div>
  </nav>
