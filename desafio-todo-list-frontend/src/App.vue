<template>
  <div>
    <div v-for="tarefa in tarefas" :key="tarefa.id">
      
        {{ tarefa.titulo }}
      
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import {ref} from 'vue';

const tarefas = ref()

axios.get('api/tarefas')
.then((response) => {
  // tarefas.value = response.data
  console.log(response);
  
})
</script>

<style>

</style>
