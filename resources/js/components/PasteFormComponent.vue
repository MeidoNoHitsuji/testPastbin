<template>
    <div id="content_left">
        <span class="content_title no_border">
            Новая вставка
        </span>
        <textarea id="paste_code" class="paste_textarea" v-model="code" onkeydown="return catchTab(this, event)"></textarea>
        <div class="content_title">Настройки</div>
        <ul>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Синтаксис:</span>
                    <select class="form_right post_select" name="paste_format" v-model="syntax">
                        <option value="0">Отсутствует</option>
                        <option value="1">PHP</option>
                        <option value="2">Python</option>
                        <option value="3">C#</option>
                    </select>
                </div> 
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">"Срок годности":</span>
                    <select class="form_right post_select" name="paste_format" v-model="expiration">
                        <option value="0">Без срока</option>
                        <option value="1">10 минут</option>
                        <option value="2">1 час</option>
                        <option value="3">1 день</option>
                        <option value="4">1 неделя</option>
                        <option value="5">2 недели</option>
                        <option value="6">1 месяц</option>
                        <option value="7">1 год</option>
                    </select>
                </div> 
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Публичность:</span>
                    <select class="form_right post_select" name="paste_format" v-model="exposure">
                        <option value="0">Публичное</option>
                        <option value="1">Частное</option>
                        <option value="2">Приватное</option>
                    </select>
                </div> 
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Название вставки:</span>
                    <input class="form_right post_input" type="text" v-model="title"/>
                </div> 
            </li>
            <li>
                <div style="display: flex;">
                    <div class="button1 btnbig form_full" @click="request_paste">Создать новую вставку</div>
                </div> 
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                title: "",
                code: "",
                expiration: 0,
                exposure: 0,
                syntax: 0,
            }
        },
        methods: {
            request_paste(){
                var data = {
                    title: this.title,
                    code: this.code,
                    expiration: this.expiration,
                    exposure: this.exposure,
                    syntax: this.syntax,
                }
                axios({
                    method: 'post',
                    url: '/',
                    data: data,
                    headers: {'Content-Type': 'application/json' }
                })
                .then(function (response) {
                    location.replace("/paste/"+response.data.link)
                })
                .catch(function (response) {
                    console.log(response.error)
                });
            }
        }
    }
</script>
