import './bootstrap';
import 'admin-lte';

import {createApp} from "vue/dist/vue.esm-bundler.js";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import 'vue-multiselect/dist/vue-multiselect.min.css';
import DataTable from 'datatables.net-vue3';
import DataTableLib from "datatables.net-bs4";
import 'datatables.net-buttons-bs4';
import ButtonHtml4 from 'datatables.net-buttons/js/buttons.html5.min';
import 'datatables.net-buttons/js/buttons.print';
import pdfmake from 'pdfmake';
import pdfFont from 'pdfmake/build/vfs_fonts';
pdfmake.vfs = pdfFont.pdfMake.vfs
import 'datatables.net-responsive-bs4';
import JSZip from "jszip";
window.JSZip = JSZip;
DataTable.use(DataTableLib);
DataTable.use(pdfmake);
DataTable.use(ButtonHtml4);

import CategoryComponent from "@/components/Pages/CategoryComponent.vue";
import CustomerComponent from "@/components/Pages/CustomerComponent.vue";
import ProductComponent from "@/components/Pages/ProductComponent.vue";
import HomeComponent from "@/components/Pages/HomeComponent.vue";

//Components
const app = createApp({
    components: {
        CategoryComponent,
        CustomerComponent,
        ProductComponent,
        HomeComponent
    }
});

app.use(VueSweetalert2);
app.mount("#app");
