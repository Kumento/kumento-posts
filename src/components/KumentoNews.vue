<template>
  <div class="kumento_news_post ku-w-full ku-max-w-[1100px]">
    <h1 class="ku-pb-4">{{ msg }}</h1>
    <div class="kumento_news_post_loop ku-flex ku-flex-col ku-gap-4">
      <div class="ku-grid ku-grid-cols-4 ku-gap-4" v-for="(item, index) in items" :key="index">
        <div class="kumento_news_post_image">
          Billede
        </div>
        <div class="kumento_news_post_content ku-col-span-2">
          <h4 class="ku-text-lg" v-text="item?.title?.rendered" />
          <div v-if="item?.excerpt?.rendered" class="ku-text-sm" v-html="item?.excerpt?.rendered" />
          <div v-else class="ku-text-sm" v-html="item?.content?.rendered" />
        </div>
        <div class="kumento_news_post_meta">
          <ul class="list-group ku-text-sm">
              <li v-if="item?.kumento_content_publicist" class="list-group-item">
                publicist: {{ item?.kumento_content_publicist }}
              </li>
              <li v-if="item?.kumento_content_country" class="list-group-item">
                country: {{ item?.kumento_content_country }}
              </li>
              <li v-if="item?.kumento_content_contact_phoneno" class="list-group-item">
                contact_phoneno: {{ item?.kumento_content_contact_phoneno }}
              </li>
              <li v-if="item?.kumento_content_contact_email" class="list-group-item">
                contact_email: {{ item?.kumento_content_contact_email }}
              </li>
              <li v-if="item?.kumento_content_homepage_link" class="list-group-item">
                homepage_link: {{ item?.kumento_content_homepage_link }}
              </li>
              <li v-if="item?.kumento_content_youtube_link" class="list-group-item">
                youtube_link: {{ item?.kumento_content_youtube_link }}
              </li>
          </ul>
        </div>
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

async function fetchItems() {
  const itemsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_news_post`)
    items.value = itemsResponse.data
}
async function fetchCats() {
  const catsResponse = await axios.get( `${sourceUrl.value}/wp-json/wp/v2/kumento_news_category`)
  cats.value = catsResponse.data
}
onMounted(async () => {
    await fetchItems();
    await fetchCats();
})
</script>
<style scoped>
</style>