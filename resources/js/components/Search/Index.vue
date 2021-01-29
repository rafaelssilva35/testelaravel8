<template>
    <div class="container">
        <form @submit.prevent="atualizarEndereco">
            <div class="form-group">
                <label for="cep">Busca</label>
                <input @keyup="search" v-model="keyBusca" type="keyBusca" class="form-control" id="keyBusca" aria-describedby="keyBuscaHelp" placeholder="Enter keyBusca">
                
                <ul class="list-group">                    
                    <li v-for="endereco in result" class="list-group-item">
                        <router-link :to="'/edit/'+endereco.cep"> 
                            CEP: {{endereco.cep}} |
                            logradouro: {{endereco.logradouro}} |
                            complemento: {{endereco.complemento}} |
                            bairro: {{endereco.bairro}} |
                            localidade: {{endereco.localidade}} |
                            uf: {{endereco.uf}}
                        </router-link>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        data () {
            return {
              keyBusca: null,
              result:[]
            }
        },
        methods: {
            search() {
                if(this.keyBusca.length > 1) {
                    axios
                        .get(window.location.origin+`/api/search/${this.keyBusca}`)
                        .then((response) => {
                            this.result = response.data;
                        });
                } else {
                    this.result = [];
                }
            }
        }
    }
</script>
