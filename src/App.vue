<template>
  <div class="kumento_post_wrap">
    <KumentoNews 
      v-if="settings?.type === 'kumento_news_post'" 
      msg="Kumento News" 
      :settings="settings" 
    />
    <KumentoPress 
      v-else-if="settings?.type === 'kumento_press_post'" 
      msg="Kumento Press" 
      :settings="settings" 
    />
    <KumentoCompany 
      v-else-if="settings?.type === 'kumento_company_post'" 
      msg="Kumento Company" 
      :settings="settings" 
    />
    <KumentoEvent 
      v-else-if="settings?.type === 'kumento_event_post'" 
      msg="Kumento Event" 
      :settings="settings" 
    />
    <KumentoAssociation 
      v-else-if="settings?.type === 'kumento_association_post'" 
      msg="Kumento Association" 
      :settings="settings" 
    />
    <template v-else>
      <h2>Settings Type Error</h2>
      <pre>
        {{ settings }}
      </pre>
    </template>
  </div>
</template>
<script setup>
import KumentoNews from './components/KumentoNews.vue';
import KumentoPress from './components/KumentoPress.vue';
import KumentoCompany from './components/KumentoCompany.vue';
import KumentoEvent from './components/KumentoEvent.vue';
import KumentoAssociation from './components/KumentoAssociation.vue';
</script>
<style scoped>

</style>
