<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Component Lista</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">logradouro</th>
                                    <th scope="col">complemento</th>
                                    <th scope="col">localidade</th>
                                    <th scope="col">uf</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in enderecos" :key="item.id">
                                    <th >{{item.bairro}}</th>
                                    <td>{{item.logradouro}}</td>
                                    <td>{{item.complemento}}</td>
                                    <td>{{item.localidade}}</td>
                                    <td>{{item.uf}}</td>
                                    <td scope="col">
                                        <router-link :to="'/edit/'+item.cep"><button>Editar</button></router-link>
                                        <button @click="excluir(item.id)">Excluit</button>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                        <router-view></router-view>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios"
    import { filter } from "lodash"

    export default {
        data () {
            return {
              enderecos: null
            }
        },
        mounted() {
            axios
                .get('api/cep')
                .then(response => (this.enderecos = response.data))
        },
        methods: {
            excluir(id) {                
                axios
                    .delete(window.location.origin+`/api/cep/${id}`)
                    .then((response) => {
                        this.enderecos = filter(this.enderecos, function(endereco) {
                            return (endereco.id != id);
                        });
                    });

            }
        }
    }
</script>
