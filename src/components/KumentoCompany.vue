<template>
    <div class="kumento_company_post ku-flex ku-flex-col ku-gap-8">
      <h1 class="kumento_post_h1 ku-text-3xl">{{ msg }}</h1>
    <div 
      class="kumento_post_loop ku-grid ku-grid-cols-4 ku-gap-8 ku-border-b ku-pb-8" 
      v-for="(item, index) in items" 
      :key="index"
    >
      <div class="kumento_post_image">
        <img
          v-if="item?.fimg_url"    
          :src="item?.fimg_url"
          class="kumento_post_featured_media ku-w-full ku-h-auto ku-border-0 !ku-object-contain"
        />
      </div>
      <div class="kumento_post_main_content ku-col-span-2">
        <h4 
          class="kumento_post_h4 ku-text-xl" 
          v-text="item?.title?.rendered" 
        />
        <div 
          v-if="item?.excerpt?.rendered" 
          class="kumento_post_excerpt ku-text-sm" 
          v-html="item?.excerpt?.rendered" 
        />
        <div 
          v-else 
          class="kumento_post_content ku-text-sm" 
          v-html="item?.content?.rendered" 
        />
        <a 
          v-if="item?.link" 
          :href="item?.link" 
          target="_blank" 
          class="kumento_post_link"
        >
          Læs mere
        </a>
      </div>
      <div class="kumento_post_meta">
        <ul class="kumento_post_ul ku-text-sm">
            <li 
              v-if="item?.kumento_content_country" 
              class="kumento_post_li"
            >
              country: {{ item?.kumento_content_country }}
            </li>
            <li 
              v-if="item?.kumento_content_address" 
              class="kumento_post_li"
            >
              kumento_content_address: {{ item?.kumento_content_address }}
            </li>
            <li 
              v-if="item?.kumento_content_address_second" 
              class="kumento_post_li"
            >
              address 2: {{ item?.kumento_content_address_second }}
            </li>
            <li 
              v-if="item?.kumento_content_zip" 
              class="kumento_post_li"
            >
              zip: {{ item?.kumento_content_zip }}
            </li>
            <li 
              v-if="item?.kumento_content_city" 
              class="kumento_post_li"
            >
              city: {{ item?.kumento_content_city }}
            </li>
            <li 
              v-if="item?.kumento_content_contact_name" 
              class="kumento_post_li"
            >
              contact_name: {{ item?.kumento_content_contact_name }}
            </li>

            <li 
              v-if="item?.kumento_content_contact_phoneno" 
              class="kumento_post_li"
            >
              contact_phoneno: {{ item?.kumento_content_contact_phoneno }}
            </li>
            <li 
              v-if="item?.kumento_content_contact_email" 
              class="kumento_post_li"
            >
              contact_email: {{ item?.kumento_content_contact_email }}
            </li>
            <li 
              v-if="item?.kumento_content_homepage_link" 
              class="kumento_post_li"
            >
              homepage_link: {{ item?.kumento_content_homepage_link }}
            </li>
            <li 
              v-if="item?.kumento_content_youtube_link" 
              class="kumento_post_li"
            >
              youtube_link: {{ item?.kumento_content_youtube_link }}
            </li>

            <li 
              v-if="item?.kumento_content_vision" 
              class="kumento_post_li"
            >
             content_vision: {{ item?.kumento_content_vision }}
            </li>
            <li 
              v-if="item?.kumento_content_mission" 
              class="kumento_post_li"
            >
             content_mission: {{ item?.kumento_content_mission }}
            </li>
            <li 
              v-if="item?.kumento_content_cvr" 
              class="kumento_post_li"
            >
             content_cvr: {{ item?.kumento_content_cvr }}
            </li>
        </ul>
      </div>
    </div>
      <pre class="ku-max-w-[500px] ku-hidden">
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
    const itemsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_company_post?kumento_company_category=${category.value}`)
    items.value = itemsResponse.data
  }else{
    const itemsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_company_post`)
    items.value = itemsResponse.data
  }
}
async function fetchCats() {
  const catsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_company_category`)
  cats.value = catsResponse.data
}
onMounted(async () => {
    await fetchItems();
    await fetchCats();
})
</script>
<style scoped>
</style>