<div class="row">
    @foreach($cards as $card)
        @hasanyrole($card['roles'])
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="{{ $card['class'] }}">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="{{ $card['icon'] }}"></i>
                    </div>
                    <div class="mr-5">{{ $card['text'] }}</div>
                </div>
                <a href="{{ $card['link.href'] }}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">{{ $card['link.text'] }}</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        @endhasanyrole
    @endforeach
</div>