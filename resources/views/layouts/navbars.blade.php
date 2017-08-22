<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Expenses') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav">
            @if (Auth::guest())
                @foreach ($links['guest']['side'] as $link)
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="{{$link['name']}}">
                        <a class="nav-link" href="{{$link['route']}}">
                            <i class="fa fa-fw {{$link['icon']}}"></i>
                            <span class="nav-link-text">
                    {{$link['name']}}</span>
                        </a>
                    </li>
                @endforeach
            @else
                @foreach (array_keys(config('roles')) as $role)
                    @hasanyrole($role)
                    @foreach ($links[$role]['side'] as $link)
                        <li class="nav-item{{\App\Helpers\Menu::activeMenu()}}" data-toggle="tooltip" data-placement="right" title="{{$link['name']}}">
                            <a class="nav-link" href="{{$link['route']}}">
                                <i class="fa fa-fw {{$link['icon']}}"></i>
                                <span class="nav-link-text">
                    {{$link['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                    @endhasanyrole
                    <hr />
                @endforeach
            @endif
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        @if (Auth::guest() == false)
            <ul class="navbar-nav ml-auto">
{{-- 
                @include('layouts.partials.top.messages')
                @include('layouts.partials.top.notifications')
                @include('layouts.partials.top.search-box')
 --}}
                
                <li class="nav-item">
                    @if (Auth::guest())

                    @else

                        @foreach (array_keys(config('roles')) as $role)
                            @hasanyrole($role)
                            @foreach ($links[$role]['top'] as $link)
                                <a class="nav-link">
                                    <i class="fa fa-fw {{$link['icon']}}"></i>
                                    {{$link['name']}}</a>
                            @endforeach
                            @endhasanyrole
                        @endforeach

                        {{-- Logout button --}}
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>
                            Logout</a>
                    @endif

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>

        @endif
    </div>
</nav>
@auth
<!-- Logout Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
    </div>
</div>
@endauth