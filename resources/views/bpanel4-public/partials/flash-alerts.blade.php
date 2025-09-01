@if(session()->has('success'))
    <div class="alert alert-success full-page-alert">
        {!! session('success') !!}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-error full-page-alert">
        {!! session('error') !!}
    </div>
@endif

@if(session()->has('alert-success'))
    <div class="alert alert-success full-page-alert">
        {!! session('alert-success') !!}
    </div>
@endif

@if(session()->has('alert-danger'))
    <div class="alert alert-error full-page-alert">
        {!! session('alert-danger') !!}
    </div>
@endif
