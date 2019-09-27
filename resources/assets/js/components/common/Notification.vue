<template>
    <b-notification :active.sync="isActive" :type="'is-' + type" class="notification" has-icon>
        <div class="content-max">
            <p><b>{{ title[type] }}</b></p>
            <p v-html="content"></p>
        </div>
    </b-notification>
</template>

<script>
export default {
    data() {
        return {
            isActive: false,
            type: 'success',
            content: '',
            title: {
                danger: 'Xảy ra lỗi',
                warning: 'Cảnh báo',
                success: 'Thành công',
            }
        }
    },
    methods: {
        show(notification, timeout = 5000) {
            this.type = notification.type
            this.content = notification.content
            this.isActive = true
            const self = this
            setTimeout(function () {
                self.isActive = false
            }, timeout)
        }
    }
}
</script>

<style lang="scss">
    .notification {
        position: fixed;
        bottom: 0;
        right: 20px;
        z-index: 40;
    }
    .content-max {
        max-width: 250px;
        max-height: 300px;
    }
</style>