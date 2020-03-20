<template>
    <div>
        <i class="fa fa-globe"></i>
        <a v-bind:href="'/paste/'+paste.link">{{paste.title}}</a>
        <span>{{paste.syntax}} {{paste.interval}}</span>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            paste: Object
        }
    }
</script>