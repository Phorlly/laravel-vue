<template xmlns="http://www.w3.org/1999/html">
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-uppercase">
                            ពត៌មានប្រភេទម្ហូប-អាហារ
                        </h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/home">ទំព័រដើម</a>
                            </li>
                            <li class="breadcrumb-item active">
                                ប្រភេទម្ហូប-អាហារ
                            </li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid card">
                <!-- Small boxes (Stat box) -->
                <div class="row card-body">
                    <div class="col-12">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="card-title">
                                <button type="button"
                                        class="btn btn-sm btn-primary"
                                        @click="addNew">
                                    <i class="fas fa-plus"></i> បន្ថែមថ្មី
                                </button>
                                <!--data-toggle = "modal" data-target = "#customer-modal"-->
                            </div>

                            <div class="card-tools">
                                <button type="button"
                                        class="btn btn-sm btn-danger"
                                        @click="refreshData">
                                    <i class="fas fa-sync-alt"></i> ទាញម្ដងទៀត
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <dataTable ref="myTable" :data="datas" :columns="columns" class="table table-striped table-bordered"
                                       :options="{
                                       responsive: true, autoWith: false, dom: 'Bfrtip' ,
                                       language:{ paginate: {
                                       previous: `<i class='fas fa-caret-square-left'> </i>`,
                                        next: `<i class=' fas fa-caret-square-right'> </i>`
                                    }
                                    },
                                buttons: buttons
                                }">
                            </dataTable>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- modal dialog-->
        <div class="modal fade" id="data-modal" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">
                            ពត៌មានប្រភេទម្ហូប-អាហារ
                        </h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="method ? putData() : postData()"
                              role="form"
                              method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            ឈ្មោះប្រភេទម្ហូប-អាហារ
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.name"
                                               name="name"
                                               id="name"
                                               placeholder="សូមបញ្ចូល ឈ្មោះប្រភេទម្ហូប-អាហារ"
                                               autocomplete="name"
                                               autofocus
                                               required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_kh">
                                            ឈ្មោះប្រភេទម្ហូប-អាហារ(ជាភាសាខ្មែរ)
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.name_kh"
                                               name="name_kh"
                                               id="name_kh"
                                               placeholder="សូមបញ្ចូល ឈ្មោះប្រភេទម្ហូប-អាហារ(ជាភាសាខ្មែរ)"
                                               autocomplete="name_kh"
                                               autofocus
                                               required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="noted">បរិយាយ</label>
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.noted"
                                               name="noted"
                                               id="noted"
                                               placeholder="សូមបញ្ចូល បរិយាយ"
                                               required
                                               autocomplete="noted" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                data-dismiss="modal">
                            <i class="fas fa-backspace"></i> បោះបង់
                        </button>
                        <button type="submit"
                                class="btn btn-secondary btn-sm"
                                @click="postData()"
                                v-show="!method">
                            <i class="fas fa-save"></i> រក្សាទុក
                        </button>
                        <button type="submit"
                                class="btn btn-success btn-sm"
                                @click="putData()"
                                v-show="method">
                            <i class="fas fa-redo"></i> កែប្រែជាថ្មី
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</template>
<script>
    import $ from "jquery";
    import Form from "vform";
    import moment from "moment";

    export default {
        props: ["token"],
        components: { DataTable },
        data() {
            return {
                datas: [],
                method: false,
                columns: [
                    {
                        title: "សកម្មភាព", data: null,
                        render: row => {
                            return `<button data-id="${row.id}" class="btn btn-warning btn-edit btn-sm btn-rounded">
                                    <span class="fas fa-edit"></span>
                                </button>
                                 <b></b>
                                <button data-id="${row.id}" class="btn btn-danger btn-delete btn-sm btn-rounded">
                                        <span class="fas fa-trash-alt"></span>
                                </button>`;
                        }
                    },
                    {
                        title: "លេខរៀង", data: null,
                        render: (data, type, row, meta) => {
                            return `${meta.row + 1}`;
                        }
                    },
                    {
                        title: "ឈ្មោះប្រភេទម្ហូប-អាហារ", data: null,
                        render: row => {
                            return `${row.name} | ${row.name_kh}`;
                        }
                    },
                    {
                        title: "បានបង្កើត", data: "created_at",
                        render: row => {
                            if (row) {
                                return moment(row).fromNow();
                            }
                            return "";
                        }
                    },
                    {
                        title: "បានកែប្រែ", data: "updated_at",
                        render: row => {
                            if (row) {
                                return moment(row).fromNow();
                            }
                            return "";
                        }
                    },
                    {
                        title: "បរិយាយ", data: "noted"
                    }
                ],
                buttons: [
                    {
                        title: "Report of Customers",
                        extend: "excelHtml5",
                        text: "<i class='fa fa-file-excel'> </i> Excel",
                        className: 'btn btn-success btn-sm mt-2'
                    },
                    {
                        title: "Report of Customers",
                        extend: "pdfHtml5",
                        text: "<i class='fa fa-file-pdf'> </i> PDF",
                        className: 'btn btn-danger btn-sm mt-2'
                    },
                    {
                        title: "Report of Customers",
                        extend: "print",
                        text: "<i class='fa fa-print'> </i> Print",
                        className: 'btn btn-dark btn-sm mt-2'
                    },
                    {
                        title: "Report of Customers",
                        extend: "copy",
                        text: "<i class='fa fa-copy'> </i> Copy Text",
                        className: 'btn btn-primary btn-sm mt-2'
                    },
                ],
                form: new Form({
                    id: "",
                    name: "",
                    name_kh: "",
                    noted: "",
                    _token: this.token.value
                }),
            };
        },
        mounted() {
            this.getData();

            // Attach event listeners to the action buttons
            $(this.$el).on('click', '.btn-edit', event => {
                const id = $(event.currentTarget).data('id');
                this.editData(id);
            });

            $(this.$el).on('click', '.btn-delete', event => {
                const id = $(event.currentTarget).data('id');
                this.removeData(id);
            });
        },
        methods: {
            async refreshData() {
                location.reload();
            },
            async getData() {
                await axios.get("api/v1/categories")
                    .then(response => {
                        this.datas = response.data;
                    }).catch(err => console.log(err));
            },
            addNew() {
                this.method = false;
                this.form.reset();
                $("#data-modal").modal("show");
            },
            async postData() {
                await this.form
                    .post("/api/v1/categories")
                    .then(response => {
                        $("#data-modal").modal("hide");
                        this.$swal({
                            position: "top-end",
                            icon: "success",
                            title: "ទិន្នន័យរបស់ត្រូវបានរក្សាទុកដោយជោគជ័យ 😍!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        // location.reload();
                        this.getData();
                        console.log(response.data);
                    }).catch(err => console.log(err));
            },
            editData(id) {
                this.method = true;
                this.form.reset();
                this.form.fill(this.datas.find(row => row.id === id));
                this.form._token = this.token.value;
                $("#data-modal").modal("show");
            },
            async putData() {
                await this.form
                    .put("/api/v1/categories/" + this.form.id)
                    .then(response => {
                        $("#data-modal").modal("hide");
                        this.$swal({
                            position: "top-end",
                            icon: "success",
                            title: "ទិន្នន័យរបស់ត្រូវបានកែប្រែដោយជោគជ័យ 😍!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        // location.reload();
                        this.getData();
                        console.log(response);
                    }).catch(err => console.log(err));
            },
            removeData(id) {
                this.$swal({
                    title: "តើអ្នកប្រាកដឬទេ?",
                    text: "អ្នកនឹងមិនអាចត្រឡប់មកវិញបានទេ !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "យល់ព្រម",
                    cancelButtonText: "បោះបង់",
                    reverseButtons: true,
                }).then(async result => {
                    if (result.isConfirmed) {
                        await this.form
                            .delete("api/v1/categories/" + id)
                            .then(response => {
                                this.$swal(
                                    "លុបរួចរាល់ហើយ !",
                                    "ទិន្នន័យរបស់អ្នកត្រូវបានលុបចោលហើយ។",
                                    "success"
                                );
                                // location.reload();
                                this.getData();
                                console.warn(response);
                            })
                            .catch(err => console.warn(err));
                    } else if (result.dismiss === this.$swal.DismissReason.cancel) {
                        this.$swal(
                            "បានបោះបង់",
                            "ទិន្នន័យរបស់អ្នកគឺនៅសុវត្ថភាពដដែល :)",
                            "error"
                        );
                    }
                }).catch(err => console.log(err));
            },
        },
    };
</script>

