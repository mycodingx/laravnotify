<template>
    <a class="dropdown-item" :href="messageUrl">
        {{ unread.data.message.name }} sent a new message.
    </a>
</template>

<script>
    export default {
        props:['unread'],
        data(){
            return {
                messageUrl:""
            }
        },
        mounted(){
            this.messageUrl="message/"+ this.unread.data.message.id
        }
    }
</script>
