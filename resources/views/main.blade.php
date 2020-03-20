@component('header')
@endcomponent
    <body>
        <div id="main_frame">
            <div id="content_frame" style="height:auto;">
                <listpastes-component :pastes = "{{$pastes}}"></listpastes-component>
                <pasteform-component></pasteform-component>
            </div>
        </div>
@component('footer')
@endcomponent