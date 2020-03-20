@component('header')
@endcomponent
        <div id="main_frame">
            <div id="content_frame">
                <listpastes-component :pastes = "{{$data["pastes"]}}"></listpastes-component>
                <div id="content_left">
                    <div class="content_title" style="text-align: center; margin: auto;">
                        Страница Регистрации
                    </div>
                </div>
            </div>
        </div>
@component('footer')
@endcomponent