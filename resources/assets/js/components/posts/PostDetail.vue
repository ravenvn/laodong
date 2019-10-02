<template>
    <div class="container content">
        <div class="columns">
            <div class="column has-text-centered">
                <h1 class="title">{{ post.title }}</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-10 is-offset-1" v-html="post.body">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object
        }
    }
</script>
