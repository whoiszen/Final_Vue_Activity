<template>
    <Head title="Products" />
    <GuestPublicLayout>
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h1 class="text-3xl font-bold text-gray-800">Our Products</h1>
                <input v-model="search" @input="fetchProducts" type="text" placeholder="Search products..."
                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
            </div>

            <div v-if="loading" class="text-center py-20 text-gray-400">Loading products...</div>

            <div v-else-if="products.data?.length === 0" class="text-center py-20 text-gray-400">No products found.</div>

            <div v-else class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div v-for="product in products.data" :key="product.id"
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
                    <div class="text-xs font-medium text-indigo-600 mb-1 uppercase tracking-wide">
                        {{ product.supplier?.name }}
                    </div>
                    <h3 class="font-semibold text-gray-800 text-base mb-1">{{ product.name }}</h3>
                    <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ product.description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-indigo-700 font-bold text-lg">₱{{ Number(product.price).toLocaleString() }}</span>
                        <span class="text-xs text-gray-400">
                            Stock: {{ product.inventory?.quantity ?? 0 }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div v-if="products.last_page > 1" class="flex justify-center gap-2 mt-10">
                <button v-for="page in products.last_page" :key="page" @click="goToPage(page)"
                    :class="['px-4 py-2 rounded-lg text-sm font-medium transition',
                        page === products.current_page
                            ? 'bg-indigo-600 text-white'
                            : 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50']">
                    {{ page }}
                </button>
            </div>
        </div>
    </GuestPublicLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import GuestPublicLayout from '@/Layouts/GuestPublicLayout.vue';

const products = ref({ data: [], last_page: 1, current_page: 1 });
const search = ref('');
const loading = ref(true);
let debounceTimer = null;

async function fetchProducts(page = 1) {
    loading.value = true;
    const params = new URLSearchParams({ page });
    if (search.value) params.append('search', search.value);
    const res = await fetch(`/api/products?${params}`);
    products.value = await res.json();
    loading.value = false;
}

function goToPage(page) {
    fetchProducts(page);
}

onMounted(() => fetchProducts());
</script>
