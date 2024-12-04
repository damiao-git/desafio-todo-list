<template>
  <div>
    <button @click="criarTarefa">criar auto</button>
    <table>
      <thead>
        <td>Titulo</td>
        <td>Descrição</td>
        <td>Situação</td>
        <td></td>
      </thead>
      <tbody>
        <tr v-for="tarefa in tarefas" :key="tarefa.id">
          <td>{{ tarefa.titulo }}</td>
          <td>{{ tarefa.descricao }}</td>
          <td>{{ tarefa.situacao }}</td>
          <td>
            <button>Editar</button>
            <button>Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import axios from 'axios';
import {ref} from 'vue';

const tarefas = ref()

axios.get('api/tarefas')
.then((response) => {
  tarefas.value = response.data
  // console.log(response);
});
const criarTarefa = () => {
  axios.post('api/tarefas', {
    titulo: 'teste2',
    descricao: 'teste desc2',
    situacao: 'pendente'
  })
  .then((response) => {
    console.log(response.data);
  })
}
</script>

<style>

</style>
