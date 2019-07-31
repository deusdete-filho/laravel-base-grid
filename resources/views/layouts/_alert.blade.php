@if($flash = session('message'))
  <div id="flash-alert" class="alert alert-success" role="alert">
    {{ $flash }}
  </div>
@endif