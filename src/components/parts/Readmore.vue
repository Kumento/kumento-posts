<template>
    <Transition>
        <div      
            class="kumento_post_html ku-text-sm lg:ku-text-base ku-flex ku-flex-col ku-gap-4"
            v-html="showMenu ? content : excerpt"
        />
    </Transition>
    <button 
        class="kumento_post_readmore ku-m-0 ku-p-0 ku-text-sm lg:ku-text-base ku-underline ku-inline-block !ku-border-0 !ku-bg-transparent !ku-shadow-none ku-relative focus:ku-outline-none" 
        @click="toggleNav"
    >
        <span v-text="showMenu ? 'Læs mindre' : 'Læs mere'" />
    </button>
</template>
  
<script setup>
    import {ref} from 'vue';
    const props = defineProps({
        excerpt: String,
        content: String,
    });
    const showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);
</script>
<style scoped>
.v-enter-active {
  transition: all 0.3s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>