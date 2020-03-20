<template>
    <div id="content_right">
        <div class="content_right_title">Public Pastes</div>
        <div id="menu_2">
            <ul class="right_menu">
                <li v-for="paste in pastes" v-bind:key="paste">
                    <itempaste-component :paste="paste"></itempaste-component>
                </li>   
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