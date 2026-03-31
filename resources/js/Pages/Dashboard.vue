<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>
        <div class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div v-for="card in cards" :key="card.label"
                        class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <div class="text-3xl mb-2">{{ card.icon }}</div>
                        <Link :href="route(card.route)" class="text-lg font-semibold text-indigo-600 hover:underline">
                            {{ card.label }}
                        </Link>
                        <p class="text-gray-400 text-sm mt-1">{{ card.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const cards = [
    { icon: '🏭', label: 'Suppliers',   route: 'admin.suppliers.index',   description: 'Manage your product suppliers.' },
    { icon: '📦', label: 'Products',    route: 'admin.products.index',    description: 'Manage your product catalog.' },
    { icon: '🗃️', label: 'Inventories', route: 'admin.inventories.index', description: 'Track and update stock levels.' },
];
</script>
