<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue'; 

// Define the props for this component
const props = defineProps({
    products: {
        type: Object, // Updated to Object to match expected pagination structure
        required: true
    }
});

// Console log for debugging (can be removed in production)
console.log(props.products);

// Define headers for the table
const headers = [
    "No.",
    "Name",
    "Description",
    "Category",
    "Type",
    "Unit",
    "Qty",
    "Price",
    "Action"
];

// Pagination data from the products prop
const paginationData = ref(props.products);
</script>

<template>
    <AppLayout title="Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <!-- Add Button Above the Table -->
                    <div class="mb-4">
                        <button class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            Add Product
                        </button>
                    </div>

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Table Header with Blue Background -->
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th v-for="header in headers" :key="header" scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                   {{ header }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Add rows here -->
                            <tr v-for="product in products.data" :key="product.id" class="border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    {{ product.id }}
                                    <!-- {{ product.name }} -->
                                </th>
                                <td class="px-6 py-4">{{ product.name }}</td>
                                <td class="px-6 py-4">{{ product.description }}</td>
                                <td class="px-6 py-4">{{ product.category }}</td>
                                <td class="px-6 py-4">{{ product.type }}</td>
                                <td class="px-6 py-4">{{ product.unit }}</td>
                                <td class="px-6 py-4">{{ product.qty }}</td>
                                <td class="px-6 py-4">{{ product.price }}</td>
                                <td class="flex items-center px-6 py-4 space-x-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination :pagination="paginationData" />

                
            </div>
        </div>
    </AppLayout>
</template>
