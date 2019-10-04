<template>
    <section class="post-summary">
        <div class="columns">
            <div class="column is-2">
                <a :href="'/bai-viet/' + post.slug">
                    <figure class="image">
                        <img :src="'/' + post.image">
                    </figure>
                </a>
            </div>
            <div class="column is-10">
                <h2 class="subtitle"><a :href="'/bai-viet/' + post.slug">{{ post.title }}</a></h2>
                {{  post.excerpt }} <a :href="'/bai-viet/' + post.slug">[đọc tiếp]</a>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            post: Object
        }
    }
</script>

<style lang="scss">
    .post-summary {
        border-bottom: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 10px;
    }
    .subtitle {
        margin-bottom: 10px !important;
    }
</style>