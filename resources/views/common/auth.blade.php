<!DOCTYPE html>
<html lang="en">
@include('common.partials.head')

<body class="app app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @yield('content')
            </div>
        </div>
    </div>
    @include('common.partials.footer')
</body>
</html>