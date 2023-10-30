<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboards
      </h2>
      <nav class="border-b text-sm flex justify-start">
        <a
          class="inline-block px-4 py-2 text-gray-700 hover:text-black"
          href="/committee"
          >មេប្រយោគ</a
        >

        <!-- active -->
        <a
          class="inline-block px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold"
          href="/student"
          >សិស្ស</a
        >
      </nav>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">You're logged in!</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
