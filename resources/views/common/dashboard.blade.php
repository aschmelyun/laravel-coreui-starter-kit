<!DOCTYPE html>
<html lang="en">
@include('common.partials.head')

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden {{ $body_classes or '' }}">
@include('common.partials.header')
<div class="app-body" id="app">
    <div class="sidebar">
        @include('common.partials.sidebar-nav')
    </div>
    <main class="main">
        @include('common.partials.breadcrumbs')
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
</div>
@include('common.partials.footer')
<script src="/assets/js/app.js"></script>
</body>
</html>
