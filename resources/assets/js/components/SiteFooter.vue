<template>
    <footer class="footer">
        <notification ref="notification"></notification>
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <div class="content has-text-centered">
                    Nếu bạn muốn đi xuất khẩu lao động an toàn, phí thấp và bay nhanh, hãy gọi cho tôi Mr. Thành Vinh <b><a href="tel:0965999290">0965.999.290</a></b> - <b><a href="tel:0965656311">0965.65.63.11</a></b>.<br/>Tôi hiện là trưởng ban tuyển dụng trực tuyến EK Group, hệ thống bao gồm 3 công ty thành viên là EK, Emico và Labco.<br/>Hiện tôi đang có nhiều chương trình hỗ trợ cho lao động các chi phí ăn, học, ở, khám sức khỏe và bao đỗ cho những bạn gọi ngay hôm nay <b>({{ getCurrentDate() }})</b><br/>
                    ĐC: Tầng 6, CT1, Tòa Bắc Hà C14, Tố Hữu, P.Trung Văn, Q.Nam Từ Liêm, Hà Nội
                </div>
            </div>
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
                            <b-input v-model="details" type="textarea" rows="5" placeholder="Điền nội dung bạn cần chia sẻ ở đây. Nhớ ghi rõ chi tiết về bạn như chiều cao, cân nặng, tình trạng sức khỏe, trình độ học vấn, ngoại ngữ, tay nghề cũng như mong muốn của bạn để tôi hiểu rõ bạn hơn từ đó tôi có thể giúp bạn được nhiều hơn."></b-input>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column"><b-button type="is-success" :disabled="isInvalidInput" @click="send" class=" is-pulled-right"><i class="fa fa-paper-plane"></i> Gửi</b-button></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="content has-text-centered">
            Để an toàn, hãy kiểm tra kỹ xem công ty XKLĐ bạn chuẩn bị tham gia có trong danh sách chính thức của Cục quản lý lao động ngoài nước hay không tại đây <i class="fas fa-hand-point-down"></i><a href="http://www.dolab.gov.vn/BU/Index.aspx?LIST_ID=1371&type=hdmbmtmn&MENU_ID=246&DOC_ID=1561" target="_blank"><img src="/images/bo_lao_dong.png"/></a>
        </div> -->
        <div class="content has-text-centered">
            <div class="mobile-only">
                <div class="columns is-mobile">
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-emico.png" alt="xkld Emico EK">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-hoang-long.png" alt="xkld Hoàng Long CMS">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-itc-quoc-te.jpeg" alt="xkld ITC Quốc Tế">
                        </figure>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-mai-linh.jpg" alt="xkld Mai Linh MSP">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-mh.png" alt="xkld MH">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-miyata.png" alt="xkld Miyata">
                        </figure>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-sao-viet.jpg" alt="xkld Sao Việt">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-thuan-an-kyoto.png" alt="xkld Thuận An Kyoto">
                        </figure>
                    </div>
                    <div class="column">
                        <figure class="image is-64x64 is-inline-block">
                            <img src="/images/xkld-viet-tin.jpeg" alt="xkld Việt Tín">
                        </figure>
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
                provinceId: null,
                details: '',
                isInvalidInput: true,
                notification: {
                    type: 'success',
                    content: ''
                },
                provinces: []
            }
        },
        mounted() {
            this.loadProvinces()
            this.$watch(vm => [vm.name, vm.birth, vm.phone, vm.details].join(), val => {
                this.checkInvalidInput()
            })
        },
        methods: {
            async loadProvinces() {
                const response = await axios.get('/ajax/get-all-provinces');
                this.provinces = response.data.provinces
            },
            checkInvalidInput() {
                let birthYear = Number(this.birth.trim())
                if (this.name.trim() == '' ||
                    this.details.trim() == '' ||
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
                    details: this.details.trim()
                })

                if (response.data.status == 'success') {
                    this.name = this.birth = this.phone = this.details = ''
                    this.notification.type = 'success'
                    this.notification.content = 'Cảm ơn bạn. Tôi đã nhận được thông tin và sẽ gọi cho bạn ngay khi có thể!'
                } else {
                    this.notification.type = 'danger'
                    this.notification.content = 'Vui lòng làm mới trình duyệt và thử lại.'
                }
                this.$refs.notification.show(this.notification)
            },
            getCurrentDate() {
                var today = new Date()
                var dd = String(today.getDate()).padStart(2, '0')
                var mm = String(today.getMonth() + 1).padStart(2, '0') //January is 0!
                var yyyy = today.getFullYear()

                return dd + '/' + mm + '/' + yyyy
            }
        }
    }
</script>

<style lang="scss">
    .simple-form {
        border: 1px solid #ccc;
    }
</style>