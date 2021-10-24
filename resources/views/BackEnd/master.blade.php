<!DOCTYPE html>
<html lang="en">
@include('BackEnd.include.head_link')
<body>
<div class="container-scroller">
    @include('BackEnd.include.header')
    <div class="container-fluid page-body-wrapper">
        @include('BackEnd.include.side_bar')
        <div class="main-panel">
            <div class="text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('BackEnd.include.footer')
        </div>
    </div>
</div>
<a id="button"></a>
@include('BackEnd.include.js')
</body>
</html>

