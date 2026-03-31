<template>
    <Head title="Welcome" />
    <GuestPublicLayout>
        <!-- Hero -->
        <section class="bg-gradient-to-br from-indigo-600 to-indigo-800 text-white py-24 px-4 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Quality Products, Delivered Fast</h1>
            <p class="text-indigo-100 text-lg mb-8 max-w-xl mx-auto">
                Browse our curated catalog of top-tier products from trusted suppliers across the Philippines.
            </p>
            <div class="flex justify-center gap-4">
                <Link href="/products"
                    class="bg-white text-indigo-700 font-semibold px-6 py-3 rounded-xl hover:bg-indigo-50 transition">
                    Browse Products
                </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                </Link>
            </div>
        </section>

        <!-- Features -->
        <section class="max-w-7xl mx-auto py-20 px-4 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
            <div v-for="feature in features" :key="feature.title" class="p-6 bg-white rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">{{ feature.icon }}</div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">{{ feature.title }}</h3>
                <p class="text-gray-500 text-sm">{{ feature.description }}</p>
            </div>
        </section>
    </GuestPublicLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestPublicLayout from '@/Layouts/GuestPublicLayout.vue';

const features = [
    { icon: '📦', title: 'Wide Product Range', description: 'From tech gadgets to home essentials — we have everything you need.' },
    { icon: '🤝', title: 'Trusted Suppliers', description: 'All products sourced from verified and reputable local suppliers.' },
    { icon: '⚡', title: 'Real-time Stock', description: 'Inventory updated in real time so you always know what\'s available.' },
];
</script>
