<template>
  <div id="app">
    <h1>Gerenciador de Tarefas</h1>
    <div class="principal">
      <CriarTarefa @tarefaAdicionada="buscarTarefas" />
      <ListarTarefas :tarefas="tarefas" @tarefaExcluida="buscarTarefas" @tarefaAtualizada="buscarTarefas"/>
    </div>
  </div>
</template>

<script setup>

import CriarTarefa from './components/CriarTarefa.vue';
import ListarTarefas from './components/ListarTarefas.vue';
import axios from 'axios';
import { ref } from 'vue';


const tarefas = ref([]);

const buscarTarefas = () => axios.get('http://127.0.0.1:8000/api/tarefas')
  .then((res) => {
    tarefas.value = res.data
  })

  buscarTarefas();
</script>

<style scoped>
#app {
  font-family: Arial, sans-serif;
  margin: 20px;
}

h1 {
  display: flex;
  justify-self: center;
}

.principal {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>
