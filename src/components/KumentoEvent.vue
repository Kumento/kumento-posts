<template>
    <div class="kumento_event_post ku-w-full ku-max-w-[1100px]">
      <h1 class="ku-pb-4">{{ msg }}</h1>
      <pre class="ku-max-w-[500px]">
        {{ items }}
      </pre>
    </div>
  </template>
<script setup>
import { computed, ref, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
  msg: String,
  settings: Array
})

const items = ref([]);
const cats = ref([]);

const sourceUrl = computed(() => {
  return props.settings?.sourceUrl;
});
const category = computed(() => {
  return props.settings?.category;
});
const layout = computed(() => {
  return props.settings?.layout;
});
const showSidebar = computed(() => {
  return props.settings?.showSidebar;
});

async function fetchItems() {
  if(category.value !== ''){
    const itemsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_event_post?kumento_event_category=${category.value}`)
    items.value = itemsResponse.data
  }else{
    const itemsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_event_post`)
    items.value = itemsResponse.data
  }
}
async function fetchCats() {
  const catsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_event_category`)
  cats.value = catsResponse.data
}
onMounted(async () => {
    await fetchItems();
    await fetchCats();
})
</script>
<style scoped>
</style>