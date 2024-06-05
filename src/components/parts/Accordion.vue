<template>
    <button 
        class="ku-flex ku-w-full" 
        @click="toggleNav"
        :class="btnClass"
    >
        <span class="ku-pt-1.5 ku-pr-2">
            
            <svg v-if="showMenu" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" :class="iconClass">
                <path d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/>
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" :class="iconClass">
                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
            </svg>
        </span>
        {{ title }}
    </button>
    <div 
        :class="showMenu ? 'ku-block' : 'ku-hidden'"
    >
        <div class="ku-w-full ku-text-sm ku-py-2" :class="contentClass">
            <slot />
        </div>    
    </div>
</template>
  
<script setup>
    import { computed, ref, onMounted } from 'vue';
    const props = defineProps({
        title: String,
        btnClass: String,
        iconClass: String,
        contentClass: String,
    });
    const showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);
</script>