<div class="input-wrapper">
    <div class="footer-widget">
        <div class="container">
            <div class="row" style="display: flex;">
                @foreach ($menusList as $menu)
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>{{ $menu->title }}</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach ($menu->children as $menu)
                                    <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="col-sm-3 col-sm-offset-1" style="margin-left: auto;">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>
</div>
