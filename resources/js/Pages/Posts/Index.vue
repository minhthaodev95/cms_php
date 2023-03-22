<template>
  <Head title="Posts" />
  <!-- A list post with id, title, feature_image, checkbox with html -->
  <div class="flex items-center justify-between mb-6">
    <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
      <label class="block text-gray-700">Trashed:</label>
      <select v-model="form.trashed" class="form-select mt-1 w-full">
        <option :value="null" />
        <option value="with">With Trashed</option>
        <option value="only">Only Trashed</option>
      </select>
    </search-filter>
    <Link class="btn-indigo" href="/posts/create">
      <span>Create</span>
      <span class="hidden md:inline">&nbsp;Post</span>
    </Link>
  </div>
  <div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Title
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Feature Image
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Status
          </th>
          <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="post in posts.data" :key="post.id">
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ post.id }}</div>
          </td>


          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ post.title }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ post.feature_image_id }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ post.status }}</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <pagination class="mt-6" :links="posts.links" />
</template>
<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Shared/Pagination'
import Layout from '@/Shared/Layout'
import mapValues from 'lodash/mapValues'
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    posts: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/posts', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },

}
</script>

<style scoped>
.text-sm.text-gray-900 {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 350px; /* adjust this value to fit your specific layout */
}

</style>

