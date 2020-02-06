<template>
    <section>
        <h1 class="has-text-centered"><strong>Danh sách lao động</strong></h1>
        <b-table
            :data="contacts"
            :loading="loading"
            bordered
            paginated
            backend-pagination
            :total="total"
            :per-page="perPage"
            @page-change="onPageChange"
            aria-next-label="Next"
            aria-previous-label="Previous"
            aria-page-label="Page"
            aria-current-label="Current"

            backend-sorting
            :default-sort-direction="defaultSortOrder"
            :default-sort="[sortField, sortOrder]"
            @sort="onSort">

            <template slot-scope="props">
                <b-table-column field="serial" label="#">
                    {{ props.row.serial }}
                </b-table-column>
                <b-table-column field="name" label="Tên">
                    {{ props.row.name }}
                </b-table-column>
                <b-table-column field="birth" label="Năm sinh" sortable>
                    {{ props.row.birth.substring(0, 4) }}
                </b-table-column>
                <b-table-column field="phone" label="SĐT">
                    <a :href="'tel:' + props.row.phone">{{ props.row.phone }}</a>
                </b-table-column>
                <b-table-column field="province_id" label="Tỉnh" sortable>
                    {{ props.row.province.name }}
                </b-table-column>
                <b-table-column field="details" label="Chi tiết">
                    {{ props.row.details }}
                </b-table-column>
                <b-table-column field="created_at" label="Ngày đăng ký" sortable>
                    {{ props.row.created_at }}
                </b-table-column>
                <b-table-column field="notes" width="200" label="Ghi chú">
                    <b-input type="textarea" v-model="notes[props.row.id]"></b-input>&nbsp;
                    <b-button @click="updateNotes(props.row.id)" type="is-success">Cập nhật</b-button>
                </b-table-column>
            </template>
        </b-table>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                contacts: [],
                total: 0,
                loading: false,
                sortField: 'created_at',
                sortOrder: 'desc',
                defaultSortOrder: 'desc',
                page: 1,
                perPage: 20,
                notes: {}
            }
        },
        methods: {
            async loadAsyncData() {
                this.loading = true
                const response = await axios.get('/ajax/get-contacts', {
                    params: {
                        sortField: this.sortField,
                        sortOrder: this.sortOrder,
                        page: this.page,
                        perPage: this.perPage
                    }
                });
                this.contacts = response.data.contacts
                this.contacts.forEach(contact => {
                    this.notes[contact.id] = contact.notes
                })
                this.total = response.data.total
                this.loading = false
            },
            /*
            * Handle page-change event
            */
            onPageChange(page) {
                this.page = page
                this.loadAsyncData()
            },
            /*
            * Handle sort event
            */
            onSort(field, order) {
                this.sortField = field
                this.sortOrder = order
                this.loadAsyncData()
            },

            async updateNotes(contactId) {
                const response = await axios.post('/ajax/update-notes', {
                    contactId: contactId,
                    notes: this.notes[contactId],
                })
                alert('OK')
            },
        },
        mounted() {
            this.loadAsyncData()
        }
    }
</script>