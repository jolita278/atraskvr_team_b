@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                </div>
                <iframe src="https://www.facebook.com/plugins/like.php?href=http://atraskvr.dev&layout=button_count&action=recommend&size=small&show_faces=true&share=true&height=46&appId=722263501289884" width="167" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <div class="fb-like" data-href="http://atraskvr.dev" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
            </div>
        </div>
    </div>
</div>
@endsection
