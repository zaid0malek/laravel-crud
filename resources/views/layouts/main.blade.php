<x-header active="{{ request()->route()->getName()?: 'home'  }}"/>
<div class="container">
    @yield('main')
</div>

@include('layouts.footer')