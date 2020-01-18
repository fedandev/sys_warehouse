<ol class="breadcrumb page-breadcrumb">    
    <li class="breadcrumb-item">
        <a href="/">{{ trans('generic.index') }}</a>
    </li>
    @if (routeIndex($controller) != 'home')
        <li class="breadcrumb-item">
            <a href="/{{ controllerFromRoute() }} ">{{ trans('controllers.'.$controller) }}</a>
        </li>
    @endif

    @if ($action != 'index')
        <li class="breadcrumb-item active">
            <strong>{{ trans('generic.'.$action) }}</strong>
        </li>
    @endif
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
</ol>

