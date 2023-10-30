<script setup>
import { router } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
const props = defineProps({
  teachers: {
    type: Object,
    default: () => ({}),
  },
});
let search = ref("");
watch(search, (value) => {
  console.log(value);
  router.get(
    "/test",
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
  <Head title="Teachers" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Teachers
      </h2>
    </template>
    <div class="py-12">
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
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Gender</th>
                    <th scope="col" class="px-6 py-3">Province</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="user in teachers.data"
                    :key="user.name"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                    >
                      {{ user.name }}
                    </th>
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                    >
                      {{ user.gender }}
                    </th>
                    <td class="px-6 py-4">
                      {{ user.province }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :data="teachers" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
