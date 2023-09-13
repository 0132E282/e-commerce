<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{Breadcrumbs::current()->title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="float-sm-right">
                {{Breadcrumbs::render(Route::currentRouteName() , $value)}}
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->