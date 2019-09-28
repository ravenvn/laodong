<template>
    <footer class="footer">
        <notification ref="notification"></notification>
        <div class="content has-text-centered">
            Nếu bạn cần chia sẻ, hãy điền Họ tên, năm sinh và SĐT rồi nhấn nút <strong>Gửi</strong>. Tôi sẽ gọi cho bạn ngay khi có thể.
        </div>
        <div class="content has-text-centered">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="columns simple-form">
                        <div class="column"><b-input v-model="name" placeholder="Họ và tên"></b-input></div>
                        <div class="column"><b-input v-model="birth" placeholder="Năm sinh" type="number"></b-input></div>
                        <div class="column" type="number"><b-input v-model="phone" placeholder="Số điện thoại"></b-input></div>
                        <div class="column"><b-button type="is-success" :disabled="isInvalidInput" @click="send"><i class="fa fa-paper-plane"></i> Gửi</b-button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content has-text-centered">
            Để an toàn, hãy kiểm tra kỹ xem công ty XKLĐ bạn chuẩn bị tham gia có trong danh sách chính thức của Cục quản lý lao động ngoài nước hay không tại đây <i class="fas fa-hand-point-down"></i><a href="http://www.dolab.gov.vn/BU/Index.aspx?LIST_ID=1371&type=hdmbmtmn&MENU_ID=246&DOC_ID=1561" target="_blank"><img src="/images/bo_lao_dong.png"/></a>
        </div>
    </footer>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                birth: '',
                phone: '',
                isInvalidInput: true,
                notification: {
                    type: 'success',
                    content: ''
                }
            }
        },
        mounted() {
            this.$watch(vm => [vm.name, vm.birth, vm.phone].join(), val => {
                this.checkInvalidInput()
            })
        },
        methods: {
            checkInvalidInput() {
                let birthYear = Number(this.birth.trim())
                if (this.name.trim() == '' ||
                    (isNaN(birthYear) || birthYear < 1900 || birthYear >= 2100 ) ||
                    (this.phone.trim().length < 10 || this.phone.trim().length > 11)) {
                    this.isInvalidInput = true
                } else {
                    this.isInvalidInput = false
                }
            },
            async send() {
                const response = await axios.post('/store-simple-contact', {
                    name: this.name.trim(),
                    birth: this.birth.trim(),
                    phone: this.phone.trim()
                })

                if (response.data.status == 'success') {
                    this.name = this.birth = this.phone = ''
                    this.notification.type = 'success'
                    this.notification.content = 'Cảm ơn bạn. Tôi đã nhận được thông tin và sẽ gọi cho bạn ngay khi có thể!'
                } else {
                    this.notification.type = 'danger'
                    this.notification.content = 'Vui lòng làm mới trình duyệt và thử lại.'
                }
                this.$refs.notification.show(this.notification)
            }
        }
    }
</script>

<style lang="scss">
    .simple-form {
        border: 1px solid #ccc;
    }
</style>