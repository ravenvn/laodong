<template>
    <footer class="footer">
        <notification ref="notification"></notification>
        <div class="content has-text-centered">
            Nếu bạn cần thêm lời khuyên, hãy điền Họ tên, Năm sinh, SĐT và nội dung cần chia sẻ rồi nhấn nút <strong>Gửi</strong>. Tôi sẽ gọi cho bạn ngay khi có thể.
        </div>
        <div class="content has-text-centered">
            <div class="columns">
                <div class="column is-8 is-offset-2 simple-form">
                    <div class="columns">
                        <div class="column"><b-input v-model="name" placeholder="Họ và tên"></b-input></div>
                        <div class="column"><b-input v-model="birth" placeholder="Năm sinh" type="number"></b-input></div>
                        <div class="column" type="number"><b-input v-model="phone" placeholder="Số điện thoại"></b-input></div>
                        <div class="column">
                            <b-select placeholder="Quê quán" v-model="provinceId">
                                <option
                                    v-for="province in provinces"
                                    :value="province.id"
                                    :key="province.id">
                                    {{ province.name }}
                                </option>
                            </b-select>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <b-input v-model="notes" type="textarea" rows="5" placeholder="Điền nội dung bạn cần chia sẻ ở đây. Nhớ ghi rõ chi tiết về bạn như chiều cao, cân nặng, tình trạng sức khỏe, trình độ học vấn, ngoại ngữ, tay nghề cũng như mong muốn của bạn để tôi hiểu rõ bạn hơn từ đó tôi có thể giúp bạn được nhiều hơn."></b-input>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column"><b-button type="is-success" :disabled="isInvalidInput" @click="send" class=" is-pulled-right"><i class="fa fa-paper-plane"></i> Gửi</b-button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content has-text-centered">
            Hotline: Mr Vinh <a href="tel:0965999290">0965.999.290</a> - Mai Linh Group, Tầng 5 N02-T2 Ngoại Giao Đoàn, Hà Nội<br/>
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
                provinceId: null,
                notes: '',
                isInvalidInput: true,
                notification: {
                    type: 'success',
                    content: ''
                },
                provinces: [
                    { id: '40', name: 'Nghệ An'},
                    { id: '42', name: 'Hà Tĩnh'},
                    { id: '11', name: 'Điện Biên'},
                    { id: '25', name: 'Phú Thọ'},
                    { id: '30', name: 'Hải Dương'},
                    { id: '38', name: 'Thanh Hóa'},
                    { id: '1000', name: 'Tỉnh thành khác'},
                ]
            }
        },
        mounted() {
            this.$watch(vm => [vm.name, vm.birth, vm.phone, vm.notes].join(), val => {
                this.checkInvalidInput()
            })
        },
        methods: {
            checkInvalidInput() {
                let birthYear = Number(this.birth.trim())
                if (this.name.trim() == '' ||
                    this.notes.trim() == '' ||
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
                    phone: this.phone.trim(),
                    provinceId: this.provinceId || '1000',
                    notes: this.notes.trim()
                })

                if (response.data.status == 'success') {
                    this.name = this.birth = this.phone = this.notes = ''
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