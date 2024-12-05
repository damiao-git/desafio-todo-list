<template>
    <div class="container">
        <h2>Lista de Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tarefa in tarefas" :key="tarefa.id">
                    <td>{{ tarefa.titulo }}</td>
                    <td>{{ tarefa.descricao }}</td>
                    <td>
                        <select v-model="tarefa.situacao" @change="atualizarTarefa(tarefa)">
                            <option value="pendente">Pendente</option>
                            <option value="em_progresso">Em Progresso</option>
                            <option value="finalizado">Finalizada</option>
                        </select>
                    </td>
                    <td>
                        <button @click="excluirTarefa(tarefa.id)">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import axios from 'axios';
import { defineProps, defineEmits } from 'vue';

defineProps({
    tarefas: Array,
})

const emit = defineEmits(['tarefaExcluida', 'tarefaAtualizada'])

const excluirTarefa = ((id) => {
    console.log(id);
    
    axios.delete(`http://127.0.0.1:8000/api/tarefas/${id}`)
        .then(() => {
            alert('Tarefa excluída com sucesso!')
            emit('tarefaExcluida')
        })
        .catch((erro) => {
            console.error('Erro ao excluir tarefa:', erro.response.data);
        })
})

const atualizarTarefa = (tarefa) => {
    console.log(tarefa);
    axios.put(`http://127.0.0.1:8000/api/tarefas/${tarefa.id}`, tarefa)
    .then(() => {
        alert('Tarefa atualizada com sucesso!');
        emit('tarefaAtualizada')
    }).catch((err) => {
        console.error('Erro ao atualizar tarefa:', err.response.data);
    })
}
</script>

<style scoped>
table{
    width: 700px;
}
table tr th {
    text-align: start;
}
h2{
    justify-self: center;
}
</style>