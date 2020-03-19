<html>
    <head>
        <link href="css/index.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="main_frame">
            <div id="content_frame" style="height:auto;">
                <listpastes-component :pastes = "{{$pastes}}"></listpastes-component>
                <pasteform-component></pasteform-component>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" ></script>
        <script src="js/index.js"></script>
    </body>
</html>