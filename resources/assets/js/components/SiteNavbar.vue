<template>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item href="/">
                <img
                    src="/images/logo.png"
                    alt="Xuất khẩu lao động, lao động nước ngoài"
                >
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="/chuyen-muc/lao-dong-can-biet">
                <i class="fas fa-book"></i>&nbsp;Lao động cần biết
            </b-navbar-item>
            <b-navbar-dropdown label="💥Đơn hàng mới">
                <b-navbar-item href="/chuyen-muc/don-hang-xuat-khau-lao-dong-nhat-ban-moi-nhat">
                    🇯🇵Nhật Bản
                </b-navbar-item>
                <b-navbar-item href="/chuyen-muc/don-hang-xuat-khau-lao-dong-dai-loan-moi-nhat">
                    🇹🇼Đài Loan
                </b-navbar-item>
                <hr class="navbar-divider">
                <b-navbar-item href="/chuyen-muc/don-hang-xuat-khau-lao-dong-chau-au-moi-nhat">
                    🇪🇺Châu Âu
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>
        <!-- <template slot="end">
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Trở thành CTV</strong>
                    </a>
                </div>
            </b-navbar-item>
        </template> -->
    </b-navbar>
</template>
