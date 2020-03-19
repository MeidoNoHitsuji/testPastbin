<template>
    <div id="content_right">
        <div class="content_right_title">Public Pastes</div>
        <div id="menu_2">
            <ul class="right_menu">
                <itempaste-component v-for="(paste) in pastes" :paste="paste"></itempaste-component> <!-- Костыльная фигня.. Но выглядит прикольно.. И в консоль льёт ошибку, хех :D -->
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            pastes: Object
        }
    }
</script>