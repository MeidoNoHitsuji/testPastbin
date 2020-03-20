<template>
    <div>
        <ul>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Логин:</span>
                    <input class="form_right post_input" type="text" v-model="login" placeholder="Ваш логин">
                </div>
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Email:</span>
                    <input class="form_right post_input" type="email" v-model="email" placeholder="Ваш email">
                </div>
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Пароль:</span>
                    <input class="form_right post_input" type="password" v-model="password" placeholder="Ваш пароль">
                </div>
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left">Подтверждение пароля:</span>
                    <input class="form_right post_input" type="password" v-model="confpassword" placeholder="Повторите пароль">
                </div>
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left"></span>
                    <div class="button1 btnbig form_right" style="text-align: center; padding: 2px 0;">Создать учётную запись</div>
                </div>
            </li>
            <li>
                <div style="display: flex;">
                    <span class="form_left"></span>
                    <p class="form_right p_text">Нажимая «Создать учётную запись», вы соглашаетесь с нашими условиями обслуживания, настройками уведомлений по умолчанию и заявлением о конфиденциальности. (Но, естественно, всего этого не будет :D)</p>
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
                login: "",
                email: "",
                password: "",
                confpassword: "",
            }
        },
        methods: {
            request_signup(){
                var data = {
                    login: this.login,
                    email: this.email,
                    password: this.password,
                }
                axios({
                    method: 'post',
                    url: '/signup',
                    data: data,
                    headers: {'Content-Type': 'application/json' }
                })
                .then(function (response) {
                    location.replace("/")
                })
                .catch(function (response) {
                    console.log(response.error)
                });
            }
        }
    }
</script>