<template>
    <div class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="category">Category</label>
                                    <select v-model="category" id="category_id" name="category_id"
                                            class="form-control">
                                        <option value="all">ជ្រើសរើសប្រភេទទំនិញ</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="table_id">Table</label>
                                    <select v-model="table_id" id="table_id" name="table_id"
                                            class="form-control">
                                        <!--<option value="1">ជ្រើសរើសលេខតុ</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 mb-2 mt-3" v-for="(data, index) in items" :key="index">
                                    <div class="product-image m-0 pointer-event" @click="orderData(data)">
                                        <div class="product-image p-0" style="margin: 0 auto">
                                            <img :src="'/images/foods/' +
                                                data.photo
                                                " alt="Food" style="
                                                    height: 10rem;
                                                    width: 10rem;
                                                " class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <strong>{{ data.name_kh }}-{{ data.name }}</strong><br />
                                        <label for="price" class="badge badge-success">{{ data.price }}<sup>៛</sup></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in datas" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.name }}</td>
                                        <th>
                                            <div class="btn-group">
                                                <button @click="removeData(item)"
                                                        class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <a class="btn btn-outline-dark btn-sm disabled">
                                                    <strong>{{ item.quantity }}</strong>
                                                </a>
                                                <button @click="orderData(item)"
                                                        class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </th>
                                        <td>{{ item.price.toLocaleString() }}<sup>៛</sup></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th>{{ total_price.toLocaleString() }}<sup>៛</sup></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="card-footer" v-show="datas.length > 0">
                                <button @click="addNew" class="btn btn-primary float-right">
                                    <i class="fas fa-cart-plus mr-2">
                                        Add Cart
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="data-modal" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">
                            កម្ម៉ង់ម្ហូប-អាហារ
                        </h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form @submit.prevent="postData()"
                              role="form"
                              method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_price">
                                            សរុប
                                        </label>
                                        <input type="text"
                                               class="form-control" disabled
                                               v-model="total_price"
                                               name="total_price" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount">
                                            បញ្ចុះតម្លៃ
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               v-model="discount"
                                               name="discount"
                                               placeholder="បញ្ចុះតម្លៃ" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="noted">ប្រាក់សរុប</label>
                                        <input type="text"
                                               class="form-control " disabled
                                               name="total_pay"
                                               :class="{ 'is-invalid' : form.errors.has('total_pay')}"
                                               v-model="total_pay" />
                                        <!--                                        <label v-show="form.errors.has('total_pay')" for="total_pay" class="col-form-label text-danger">-->
                                        <!--                                            <span v-for="(err, index) in form.errors.errors.total_pay" :key="index">-->
                                        <!--                                                <i class="fas fa-times-circle"></i> {{err}}-->
                                        <!--                                            </span>-->
                                        <!--                                        </label>-->
                                        <!-- <has-error :form="form" field="total_pay"></has-error>-->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cash_in" class="p-2">ប្រាក់បានទទួល</label>
                                        <div class="btn-group">
                                            <a type="button" @click="onCashIn(5000)"
                                               class="btn btn-outline-primary"><strong>5,000<sup>៛</sup></strong></a>
                                            <a type="button" @click="onCashIn(10000)"
                                               class="btn btn-outline-primary"><strong>10,000<sup>៛</sup></strong></a>
                                            <a type="button" @click="onCashIn(20000)"
                                               class="btn btn-outline-primary"><strong>20,000<sup>៛</sup></strong></a>
                                            <a type="button" @click="onCashIn(30000)"
                                               class="btn btn-outline-primary"><strong>30,000<sup>៛</sup></strong></a>
                                            <a type="button" @click="onCashIn(50000)"
                                               class="btn btn-outline-primary"><strong>50,000<sup>៛</sup></strong></a>
                                            <a type="button" @click="onCashIn(100000)"
                                               class="btn btn-outline-primary"><strong>100,000<sup>៛</sup></strong></a>
                                        </div>
                                        <input type="number"
                                               class="form-control"
                                               :class="{ 'is-invalid' : form.errors.has('cash_in')}"
                                               placeholder="ប្រាក់បានទទួល"
                                               name="cash_in"
                                               v-model="cash_in" />
                                        <label v-show="form.errors.has('cash_in')" for="cash_in"
                                               class="col-form-label text-danger">
                                            <span v-for="(err, index) in form.errors.errors.cash_in" :key="index">
                                                <i class="fas fa-times-circle"></i> {{ err }}
                                            </span>
                                        </label>
                                        <!-- <has-error :form="form" field="cash_in"></has-error>-->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="charge">ប្រាក់នៅសល់</label>
                                        <input type="text"
                                               class="form-control" disabled
                                               name="charge"
                                               v-model="charge" />
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
                                @click="postData()">
                            <i class="fas fa-save"></i> រក្សាទុក
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
    import axios from "axios";
    import $ from "jquery";

    export default {
        props: ["token", "user_id"],
        data() {
            return {
                category: "all",
                table_id: 1,
                items: [],
                datas: [],
                total_price: 0,
                discount: 0,
                total_pay: 0,
                cash_in: 0,
                charge: 0,
                form: new Form()
            };
        },
        mounted() {
            this.getData(this.category);
            this.getCategory();
            this.gettable_id();
        },
        watch: {
            category: function (value) {
                this.getData(value);
            },
            discount: function () {
                this.total_pay = this.total_price - this.discount;
                this.charge = this.cash_in - this.total_pay;
            },
            cash_in: function () {
                this.total_pay = this.total_price - this.discount;
                this.charge = this.cash_in - this.total_pay;
            }
        },
        methods: {
            addNew() {
                this.total_pay = this.total_price - this.discount;
                this.cash_in = 0;
                this.discount = 0;
                this.charge = 0;
                $("#data-modal").modal("show");
            },
            onCashIn(value) {
                this.cash_in = parseInt(this.cash_in) + value;
            },
            postData() {
                this.form = new Form({
                    total_price: this.total_price,
                    discount: this.discount,
                    total_pay: this.total_pay,
                    cash_in: this.cash_in,
                    datas: this.datas,
                    table_id: this.table_id,
                    user_id: this.user_id,
                    _token: this.token.value
                });

                this.form.post("/api/v1/order-item")
                    .then(response => {
                        this.datas = [];
                        this.total_price = 0;
                        $("#data-modal").modal("hide");
                        this.$swal({
                            position: "top-end",
                            icon: "success",
                            title: "ទិន្នន័យរបស់ត្រូវបានរក្សាទុកដោយជោគជ័យ 😍!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        console.log(response);
                    })
                    .catch(err => console.log(err));
            },
            getData(value) {
                axios
                    .get("api/v1/products/" + value)
                    .then((response) => {
                        this.items = response.data;
                    })
                    .catch((error) => console.log(error));
            },
            orderData(value) {
                let index = this.datas.findIndex(val => val.id === value.id);
                if (index !== -1) {
                    this.datas[index].quantity += 1;
                    this.total_price += value.price;
                } else {
                    let order = {
                        id: value.id,
                        name: value.name_kh + "-" + value.name,
                        price: value.price,
                        quantity: 1
                    };

                    this.total_price += value.price;
                    this.datas.push(order);
                }
            },
            removeData(value) {
                let index = this.datas.findIndex(val => val.id === value.id);
                if (this.datas[index].quantity > 1) {
                    this.datas[index].quantity -= 1;
                    this.total_price -= value.price;
                } else {
                    this.total_price -= value.price;
                    this.datas = this.datas.filter(val => val.id !== value.id);
                }
            },
            async getCategory() {
                await $.get('api/v1/category', data => {
                    $.each(data, (index, response) => {
                        $('#category').append($('<option>').val(response.id).text(response.text));
                    });
                }).catch(err => console.warn(err));
            },
            async gettable_id() {
                await $.get('api/v1/table', data => {
                    $.each(data, (index, response) => {
                        $('#table_id').append($('<option>').val(response.id).text(response.name));
                    });
                }).catch(err => console.warn(err));
            },
        },
    };
</script>

<style scoped>
    th {
        font-size: 18px;
    }

    .pointer-event {
        cursor: pointer;
    }
</style>
