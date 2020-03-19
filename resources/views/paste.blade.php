<html>
    <head>
        <link href="{{asset('css/index.css')}}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="main_frame">
            <div id="content_frame">
                <span class="content_title no_border" style="min-width: 1100px; width: 1200px; text-align: center;">
                    {{$paste->title}}
                </span>
                <div>
                    <textarea disabled id="paste_code" class="paste_textarea">{{$paste->code}}</textarea>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" ></script>
        <script src="{{asset('js/index.js')}}"></script>
    </body>
</html>