<template>
    <div class="container">
        <form @submit.prevent="enviarTarefa">
            <h2>Adicionar tarefa</h2>
            <label>
                Título
                <input v-model="tarefa.titulo" type="text" required>
            </label>
            <label>
                Descrição
                <textarea v-model="tarefa.descricao"></textarea>
            </label>
            <label>
                Situação:
                <select v-model="tarefa.situacao">
                    <option value="pendente">Pendente</option>
                    <option value="em_progresso">Em progresso</option>
                    <option value="finalizada">Finalizada</option>
                </select>
            </label>
            <div class="botao">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>

</template>

<script setup>
import axios from 'axios';
import { ref, defineEmits } from 'vue';

const emit = defineEmits(['novaTarefa']);

const tarefa = ref({
    titulo: '',
    descricao: '',
    situacao: 'pendente'
})

const enviarTarefa = () => {
    axios.post('http://127.0.0.1:8000/api/tarefas', tarefa.value)
        .then(() => {
            tarefa.value = { titulo: '', descricao: '', situacao: 'pendente' };
            alert('Tarefa adicionada com sucesso!');
            emit('tarefaAdicionada')
        }).catch((erro) => {
            console.error('Erro ao adicionar tarefa: ', erro)
        });
};

</script>

<style scoped>
.container {
    width: 400px;
    height: 270px;
    background-color: #eeeeee;
    margin: 0px auto;
    border-radius: 15px;
    padding: 20px;
}

h2 {
    justify-self: center;
    padding-top: 15px;
}

label {
    display: flex;
    margin: 20px 10px;
    gap: 10px;
    justify-content: space-between;
}

input {
    width: 22em;
    border-radius: 5px;
    border: none;
}

textarea {
    height: 4em;
    width: 23em;
    border-radius: 5px;
    border: none;

}

button {
    cursor: pointer;
    width: 80px;
    height: 30px;
    background-color: rgb(165, 175, 255);
    border: none;
    border-radius: 5px;
}

.botao {
    display: flex;
    justify-content: center;
}
button:hover{
    background-color: rgb(209, 214, 255);
}

select {
    width: 22em;
    border-radius: 5px;
    border: none;
}
</style>