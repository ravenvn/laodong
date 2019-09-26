<template>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item :to="{ path: '/' }">
                <img
                    src="/images/logo.png"
                    alt="Xuất khẩu lao động, lao động nước ngoài"
                >
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="#">
                Kinh nghiệm
            </b-navbar-item>
            <b-navbar-item href="#">
                Đơn hàng
            </b-navbar-item>
            <b-navbar-dropdown label="Quốc gia XKLĐ">
                <b-navbar-item href="#">
                    Nhật Bản
                </b-navbar-item>
                <b-navbar-item href="#">
                    Đài Loan
                </b-navbar-item>
                <b-navbar-item href="#">
                    Singapore
                </b-navbar-item>
                <hr class="navbar-divider">
                <b-navbar-item href="#">
                    Hungary
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>

        <template slot="end">
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Trở thành CTV</strong>
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</template>
