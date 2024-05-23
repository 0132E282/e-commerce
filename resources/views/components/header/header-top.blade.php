<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="contactinfo">
                <ul class="nav nav-pills">
                    @foreach ($infoContactLeft as $info)
                        @if (!empty($info['display']))
                            <li><a href="{{ $info['links'] }}"><i class="{{ $info['icon'] }}"></i> {{ $info['value'] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="social-icons pull-right">
                <ul class="nav navbar-nav">
                    @foreach ($infoContactRight as $info)
                        @if (!empty($info['display']))
                            <li><a href="{{ $info['links'] }}"><i class="{{ $info['icon'] }}"></i></a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
