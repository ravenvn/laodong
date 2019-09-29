<template>
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <h1 class="title">{{ category.name }}</h1>
            </div>
        </div>
        <div class="columns" v-for="post in category.posts" :key="post.id">
            <div class="column is-10 is-offset-1">
                <post-summary :post="post"></post-summary>
            </div>
        </div>
    </div>
</template>

<script>
    import PostSummary from './PostSummary.vue'

    export default {
        components: {
            PostSummary
        },
        props: {
            category: Object
        }
    }
</script>
