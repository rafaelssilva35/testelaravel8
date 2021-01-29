<template>
    <div class="container">
        <form @submit.prevent="atualizarEndereco">
            <div class="form-group">
                <label for="cep">CEP</label>
                <input v-model="endereco.cep" type="cep" class="form-control" id="cep" aria-describedby="cepHelp" placeholder="Enter cep">
            </div>
            <div class="form-group">
                <label for="logradouro">logradouro</label>
                <input v-model="endereco.logradouro" type="logradouro" class="form-control" id="logradouro" aria-describedby="logradouroHelp" placeholder="Enter logradouro">
            </div>
            <div class="form-group">
                <label for="complemento">complemento</label>
                <input v-model="endereco.complemento" type="complemento" class="form-control" id="complemento" aria-describedby="complementoHelp" placeholder="Enter logradouro">
            </div>

            <div class="form-group">
                <label for="localidade">localidade</label>
                <input v-model="endereco.localidade" type="localidade" class="form-control" id="localidade" aria-describedby="localidadeHelp" placeholder="Enter localidade">
            </div>
            <div class="form-group">
                <label for="bairro">bairro</label>
                <input v-model="endereco.bairro" type="bairro" class="form-control" id="bairro" aria-describedby="bairroHelp" placeholder="Enter bairro">
            </div>
            <div class="form-group">
                <label for="uf">uf</label>
                <input v-model="endereco.uf" type="uf" class="form-control" id="uf" aria-describedby="ufHelp" placeholder="Enter logradouro">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        data () {
            return {
              endereco: []
            }
        },
        mounted() {
            axios
                .get(window.location.origin+`/api/cep/${this.$route.params.id}`)
                .then(response => (this.endereco = response.data))
        },
        methods: {
            atualizarEndereco() {
                axios
                    .put(window.location.origin+`/api/cep/${this.$route.params.id}`, this.endereco)
                    .then((response) => {
                    });
                    this.$router.push({name: 'lista'});

            }
        }
    }
</script>
