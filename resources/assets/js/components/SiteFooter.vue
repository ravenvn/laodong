<template>
    <footer class="footer">
        <div class="content has-text-centered">
            Đừng vội liên hệ khi chưa đọc hết các chia sẻ kinh nghiệm tâm huyết từ website này bạn nhé.<br/>
            Nếu bạn cần tư vấn thêm, hãy điền Họ tên, năm sinh và SĐT rồi nhấn nút <strong>Gửi</strong>. Tôi sẽ gọi cho bạn ngay khi có thể.
        </div>
        <div class="content has-text-centered">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="columns">
                        <div class="column"><b-input v-model="name" placeholder="Họ và tên"></b-input></div>
                        <div class="column"><b-input v-model="birth" placeholder="Năm sinh" type="number"></b-input></div>
                        <div class="column" type="number"><b-input v-model="phone" placeholder="Số điện thoại"></b-input></div>
                        <div class="column"><b-button type="is-success" :disabled="isInvalidInput"><i class="fa fa-paper-plane"></i> Gửi</b-button></div>
                    </div>
                </div>
            </div>
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
                isInvalidInput: true
            }
        },
        watch: {
            name: function (val) {
                this.checkInvalidInput()
            },
            birth: function (val) {
                this.checkInvalidInput()
            },
            phone: function (val) {
                this.checkInvalidInput()
            }
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
            }
        }
    }
</script>