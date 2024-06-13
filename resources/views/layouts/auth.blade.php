
@include('components.auth-header')
   
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">    
    @yield('main')
</div>
</div>


@include('components.auth-footer')
