<template xmlns = "http://www.w3.org/1999/html">
    <div>
        <!-- Content Header (Page header) -->
        <div class = "content-header">
            <div class = "container-fluid">
                <div class = "row mb-2">
                    <div class = "col-sm-6">
                        <h1 class = "m-0 text-uppercase">ពត៌មានម្ហូប-អាហារ</h1>
                    </div>
                    <!-- /.col -->
                    <div class = "col-sm-6">
                        <ol class = "breadcrumb float-sm-right">
                            <li class = "breadcrumb-item">
                                <a href = "/home">ទំព័រដើម</a>
                            </li>
                            <li class = "breadcrumb-item active">ម្ហូប-អាហារ</li>
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
        <section class = "content">
            <div class = "container-fluid card">
                <!-- Small boxes (Stat box) -->
                <div class = "row card-body">
                    <div class = "col-12">
                        <!-- /.card-header -->
                        <div class = "card-header">
                            <div class = "card-title">
                                <button
                                    type = "button"
                                    class = "btn btn-sm btn-primary"
                                    @click = "addNew"
                                >
                                    <i class = "fas fa-plus"></i> បន្ថែមថ្មី
                                </button>
                                <!--                        data-toggle = "modal" data-target = "#customer-modal"-->
                            </div>

                            <div class = "card-tools">
                                <button
                                    type = "button"
                                    class = "btn btn-sm btn-danger"
                                    @click = "refreshData"
                                >
                                    <i class = "fas fa-sync-alt"></i> ទាញម្ដងទៀត
                                </button>
                            </div>
                        </div>

                        <div class = "table-responsive">
                            <dataTable ref="myTable"  :data="datas" :columns="columns" class="table table-striped table-bordered"
                                :options="{
                                    responsive: true, autoWith: false, dom: 'Bfrtip',
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
        <div class = "modal fade" id = "data-modal" aria-modal = "true" role = "dialog">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title text-center">
                            ពត៌មានម្ហូប-អាហារ
                        </h4>
                        <button
                            type = "button"
                            class = "close"
                            data-dismiss = "modal"
                            aria-label = "Close"
                        >
                            <span aria-hidden = "true">×</span>
                        </button>
                    </div>

                    <div class = "modal-body">
                        <form
                            @submit.prevent = "method ? updateData() : saveData()"
                        >
                            <div class = "row">
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label for = "name"
                                        >ឈ្មោះម្ហូប-អាហារ</label
                                        >
                                        <input
                                            type = "text"
                                            class = "form-control"
                                            v-model = "form.name"
                                            name = "name"
                                            id = "name"
                                            placeholder = "សូមបញ្ចូល ឈ្មោះម្ហូប-អាហារ"
                                            autocomplete = "name"
                                            autofocus
                                            required
                                        />
                                    </div>
                                </div>
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label for = "name"
                                        >ឈ្មោះម្ហូប-អាហារ(ជាភាសាខ្មែរ)</label
                                        >
                                        <input
                                            type = "text"
                                            class = "form-control"
                                            v-model = "form.name_kh"
                                            name = "name_kh"
                                            id = "name_kh"
                                            placeholder = "សូមបញ្ចូល ឈ្មោះម្ហូប-អាហារ(ជាភាសាខ្មែរ)"
                                            autocomplete = "name_kh"
                                            autofocus
                                            required
                                        />
                                    </div>
                                </div>

                                <!--                          <div class = "col-md-12">-->
                                <!--                              <div class = "form-group">-->
                                <!--                                  <label for = "category_id">ប្រភេទ</label>-->
                                <!--                                  <select name = "category_id" id = "category_id" class = "form-control"-->
                                <!--                                          v-model = "form.category_id">-->
                                <!--                                      <option value = "សូមជ្រើសរើស ប្រភេទម្ហូម-អាហារ">សូមជ្រើសរើស ប្រភេទម្ហូម-អាហារ</option>-->
                                <!--                                      <option v-for = "category in categories" :key = "category.id"-->
                                <!--                                              value = "{{ category.id}}" >-->
                                <!--                                                {{ category.name_kh }}-->
                                <!--                                      </option>-->
                                <!--                                  </select>-->
                                <!--                              </div>-->
                                <!--                          </div>-->
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label for = "price">តម្លៃ (រៀល)</label>
                                        <input
                                            type = "number"
                                            class = "form-control"
                                            v-model = "form.price"
                                            name = "price"
                                            id = "price"
                                            maxlength = "12"
                                            placeholder = "សូមបញ្ចូល តម្លៃ"
                                            autocomplete = "price"
                                        />
                                    </div>
                                </div>
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label for = "photo">រូបភាព</label>
                                        <input
                                            type = "file"
                                            class = "form-control"
                                            name = "photo"
                                            id = "photo"
                                            @change = "onChangeVal"
                                        />
                                    </div>
                                </div>
                                <div class = "col-md-12">
                                    <div class = "form-group">
                                        <label for = "price">បរិយាយ</label>
                                        <textarea
                                            type = "text"
                                            class = "form-control"
                                            v-model = "form.noted"
                                            name = "noted"
                                            id = "noted"
                                            placeholder = "សូមបញ្ចូល បរិយាយ"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer justify-content-between">
                        <button
                            v-show = "!method"
                            type = "button"
                            class = "btn btn-danger btn-sm"
                            data-dismiss = "modal"
                        >
                            <i class = "fas fa-backspace"></i> បោះបង់
                        </button>
                        <button
                            type = "button"
                            class = "btn btn-secondary btn-sm"
                            @click = "saveData()"
                        >
                            <i class = "fas fa-save"></i> រក្សាទុក
                        </button>
                        <button
                            type = "submit"
                            v-show = "method"
                            class = "btn btn-success btn-sm"
                            @click = "updateData()"
                        >
                            <i class = "fas fa-redo"></i> កែប្រែជាថ្មី
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

export default {
    components: { DataTable},
    props: ["token"],
    data() {
        return {
            datas: [],
            categories: {},
            method: false,
            headers: [
                {text: "សកម្មភាព", val: "action"},
                {text: "លេខរៀង", val: "id"},
                {text: "ឈ្មោះផលិតផល", val: "name"},
                {text: "រូបភាព", val: "photo"},
                // {text: "ឈ្មោះប្រភេទម្ហូប-អាហារ", val: "category_id"},
                {text: "តម្លៃ", val: "price"},
                {text: "បានបង្កើត", val: "created_at"},
                {text: "បរិយាយ", val: "noted"},
            ],
            columns: [
                {
                    title: "សកម្មភាព", data: null,
                    render: row =>{
                        return `<button data-id="${row.id}" class="btn btn-warning btn-edit btn-sm btn-rounded">
                                    <span class="fas fa-edit"></span>
                                </button>
                                 <b></b>
                                <button data-id="${row.id}" class="btn btn-danger btn-remove btn-sm btn-rounded">
                                        <span class="fas fa-trash-alt"></span>
                                </button>`;
                        }
                },
                {
                    title: "លេខរៀង", data: null,
                    render: (data, type, row, meta) =>{
                            return `${meta.row + 1}`
                        }
                },
                {
                    title: "ឈ្មោះប្រភេទម្ហូប-អាហារ", data: null,
                    render: row =>{
                        return `${row.name} | ${row.name_kh}`;
                        }
                },
                {
                    title: "រូបភាព", data: "photo",
                    render: row => {
                        if (!row) {
                            return "<img src='images/avatar.png' class='rounded-circle'  width='40px'/>";
                        }  
                            return "<img src='images/foods/"+ row +"' class='rounded-circle'  width='40px'/>";
                         
                    }
                        
                },
                {
                    title: "តម្លៃ", data: "price",
                    render: row =>{
                            return `${row}<sup>៛</sup>`;
                        }
                },
                {
                    title: "បានបង្កើត", data: "created_at",
                    render: row => {
                        if (row){
                            return moment(row).fromNow();
                        }
                            return "";
                       }
                },
                {
                    title: "បានកែប្រែ", data: "updated_at",
                    render: row => {
                        if (row){
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
                    text: "<i class='fa fa-print'> </i> Import",
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
                category_id: 1,
                price: '',
                noted: "",
                photo: "",
                _token: this.token.value,
            }),
        };
    },
    mounted() {
        this.fetchData();
        this.getData();

         // Attach event listeners to the action buttons
         $(this.$el).on('click', '.btn-edit', event => {
            const id = $(event.currentTarget).data('id');
            this.editData(id);
        });

        $(this.$el).on('click', '.btn-remove', event => {
            const id = $(event.currentTarget).data('id');
            this.removeData(id);
        });
    },
    methods: {
        async refreshData() {
            location.reload();
        },
        async fetchData() {
            await axios
                .get("api/v1/products")
                .then(response => {
                    this.datas = response.data;
                }).catch(err => console.log(err));
        },
        addNew() {
            this.method = false;
            this.form.reset();
            $("#data-modal").modal("show");
        },
        async saveData() {
            await this.form
                .post('api/v1/products')
                .then(response => {
                    $("#data-modal").modal("hide");
                    this.$swal({
                        position: "top-end",
                        icon: "success",
                        title: "ទិន្នន័យរបស់ត្រូវបានរក្សាទុកដោយជោគជ័យ 😍!",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    // location.reload();
                    this.fetchData();
                    console.log(response.data);
                }) .catch(err => console.log(err));
        },
        editData(id) {
            this.method = true;
            this.form.reset();
            this.form.fill(this.datas.find(row => row.id === id));
            this.form._token = this.token.value;
            $("#data-modal").modal("show");
        },
        async updateData() {
           await this.form
                .put("api/v1/products/" + this.form.id)
                .then(response => {
                    $("#data-modal").modal("hide");
                    this.$swal({
                        position: "top-end",
                        icon: "success",
                        title: "ទិន្នន័យរបស់ត្រូវបានកែប្រែដោយជោគជ័យ 😍!",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    // location.reload();
                    this.fetchData();
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
                        .delete("api/v1/products/" + id)
                        .then(response => {
                            this.$swal(
                                "លុបរួចរាល់ហើយ !",
                                "ទិន្នន័យរបស់អ្នកត្រូវបានលុបចោលហើយ។",
                                "success"
                            );
                            // location.reload();
                            this.fetchData();
                            console.warn(response);
                        }).catch(err => console.warn(err));                      
                } else if (result.dismiss === this.$swal.DismissReason.cancel) {
                    this.$swal(
                        "បានបោះបង់",
                        "ទិន្នន័យរបស់អ្នកគឺនៅសុវត្ថភាពដដែល :)",
                        "error"
                    );
                }
            });
        },
        onChangeVal(event) {
            let files = event.target.files;
            if (!files.length) return;

            let reader = new FileReader();
            reader.onload = (file) => {
                this.form.photo = file.target.result;
            };
            reader.readAsDataURL(files[0]);
        },
        async getData() {
            await axios.get("api/v1/categories")
                       .then(response => {
                this.categories = response.data;
            }).catch(err => console.warn(err));
        },
    },
};
</script>

