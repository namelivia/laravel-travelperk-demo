<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="/"><i class="fas fa-plane"></i> Laravel Travelperk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'invoice-profiles') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('invoice-profiles')}}">Invoice Profiles</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'invoices') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('invoices')}}">Invoices</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'invoice-lines') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('invoice-lines')}}">Invoice Lines</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'users') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('users')}}">Users (SCIM)</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'users_no_scim') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('users_no_scim')}}">Users (No SCIM)</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'discovery') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('discovery')}}">Discovery</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'webhook') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('webhooks')}}">Webhooks</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'travelsafe') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('travelsafe')}}">TravelSafe</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'trips') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('trips')}}">Trips</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'bookings') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('bookings')}}">Bookings</a>
      </li>
      <li class="nav-item {{ \Str::contains(request()->route()->getName(),'cost-centers') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('cost-centers')}}">Cost Centers</a>
      </li>
    </ul>
  </div>
</nav>
