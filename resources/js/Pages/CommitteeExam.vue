

<script setup>
import { Head, router } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const props = defineProps({
  items: {
    type: Object,
    default: () => ({}),
  },
});
let search = ref("");
watch(search, (value) => {
  console.log(value);
  router.get(
    "/committee",
    { search: value },
    {
      preserveState: true,
    }
  );
});
</script>
<style lang="">
</style>

<template>
  <Head title="ស្វែងរកព័ត៌មាន" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ស្វែងរក</h2>
      <nav class="border-b text-sm flex justify-start">
        <a
          class="inline-block px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold"
          href="/committee_exam"
          >មេប្រយោគប្រឡង</a
        >
        <a
          class="inline-block px-4 py-2 text-gray-700 hover:text-black"
          href="/committee_correct"
          >មេប្រយោគកំណែ</a
        >
        <!-- active -->
        <a
          class="inline-block px-4 py-2 text-gray-700 hover:text-black"
          href="/student"
          >សិស្ស</a
        >
      </nav>
    </template>

    <div class="py-8">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-2">
              <input
                type="text"
                v-model="search"
                placeholder="Search..."
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5"
              />
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="px-2 py-2">ល.រ</th>
                    <th scope="col" class="px-2 py-2">ឈ្មោះ</th>
                    <th scope="col" class="px-2 py-2">អង្គភាព</th>
                    <th scope="col" class="px-2 py-2">ប្រភេទគណៈកម្មការ</th>
                    <th scope="col" class="px-2 py-2">រាជធានី/ខេត្ត</th>
                    <th scope="col" class="px-2 py-2">មណ្ឌលប្រឡង</th>
                    <th scope="col" class="px-2 py-2">តួនាទី</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(user, index) in items.data"
                    :key="user.name"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <td scope="row" class="px-2 py-2">
                      {{ index + 1 }}
                    </td>
                    <td scope="row" class="px-2 py-2">
                      {{ user.name }}
                    </td>

                    <td class="px-2 py-2">
                      {{ user.school }}
                    </td>
                    <td class="px-2 py-2">
                      {{ user.commission_name }}
                    </td>
                    <td class="px-2 py-2">
                      {{ user.province }}
                    </td>
                    <td class="px-2 py-2">
                      {{ user.exam_center }}
                    </td>
                    <td class="px-2 py-2">
                      {{ user.head_name }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :data="items" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
