<template>
    <div>
        Hello World
    </div>
    <div>Current Count: {{ counter.count }}</div>
</template>


<script setup lang="ts">
    import { useCounterStore } from './stores/validateForm'

    const counter = useCounterStore()

    counter.count++
    // with autocompletion ✨
    counter.$patch({ count: counter.count + 1 })
    // or using an action instead
    counter.increment()
</script>
