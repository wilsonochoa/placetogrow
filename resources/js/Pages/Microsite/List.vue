<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import {Head} from "@inertiajs/vue3";
import {ref} from "vue";
import Select from "@/Components/Select.vue";

const props = defineProps({
    title: String,
    categories: Array,
});

//const searchTerm = ref("");
//const category = ref("");
const microsites = ref([]);

/*const toggleStatus = (e) => {
    axios
        .patch(route("api.product.toggleStatus"), {id: e.target.dataset.product})
        .catch((err) => {
            console.error(err);
        });
};*/

const loadMicrosites = (url = null) => {
    axios
        .get(url || route("microsite.index"))
        .then((response) => {
            microsites.value = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });
};

/*const searchProducts = () => {
    axios
        .get(
            `${route("api.product.index")}/?filter=${searchTerm.value}&category=${
                category.value
            }`
        )
        .then((response) => {
            products.value = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });
};*/
loadMicrosites();
</script>

<template>
    <Head :title="title"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $page.props.$t.microsites.list_microsites }}
            </h2>
        </template>
        <div class="py-12">
            <div class="flex">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                    <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" :href="route('microsite.create')">{{ $page.props.$t.microsites.create }}</a>
                </div>
            </div>
            <div
                v-if="microsites && microsites.data?.length > 0"
                class="max-w-7xl mx-auto sm:px-6 lg:px-8"
            >
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Actualizar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="microsite in microsites.data">
                                    <td>{{ microsite.name }}</td>
                                    <td>{{ microsite.description.slice(0, 10) }} ...</td>
                                    <td>{{ microsite.category }}</td>
                                    <td>{{ microsite.price }}</td>
                                    <td>{{ microsite.quantity }}</td>
                                    <td>
                                        <input
                                            type="checkbox"
                                            class="toggle toggle-success"
                                            :data-product="product.id"
                                            :checked="product.status === 1"
                                            @change="toggleStatus($event)"
                                        />
                                    </td>
                                    <td>
                                        <a
                                            class="btn btn-active btn-primary"
                                            :href="route('microsite.show', product.id)"
                                        >Actualizar</a
                                        >
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination
                                class="mt-6"
                                :links="products.links"
                                :filter="`&filter=${searchTerm}&category=${category}`"
                                :click="loadProducts"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
