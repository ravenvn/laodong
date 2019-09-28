<template>
    <div class="container content">
        <div class="columns">
            <div class="column has-text-centered">
                <h1>{{ page.title }}</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-10 is-offset-1" v-html="page.body">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            page: Object
        }
    }
</script>

<style lang="scss">
    .simple-form {
        border: 1px solid #ccc;
    }
</style>