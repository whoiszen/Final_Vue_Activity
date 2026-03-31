<template>
    <div class="min-h-screen bg-gray-50">
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
                <Link href="/" class="text-xl font-bold text-indigo-600">MyStore</Link>
                <div class="flex items-center gap-4">
                    <Link href="/products" class="text-sm text-gray-600 hover:text-indigo-600 transition">Products</Link>
                    <Link href="/login" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Login</Link>
                </div>
            </div>
        </nav>
        <main>
            <slot />
        </main>
        <footer class="bg-white border-t border-gray-200 mt-16 py-8 text-center text-sm text-gray-400">
            © {{ new Date().getFullYear() }} MyStore. All rights reserved.
        </footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
