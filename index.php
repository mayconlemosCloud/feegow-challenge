<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


</head>

<body>



    <div id="app">
    
        <div class="container-fluid">
            <div class="row">
                <h2 class="mt-5" style="color:azure">Feegow Challenge</h2>

                <nav class="navbar navbar-light bg-light  mt-5">
                    <div class="container-fluid">
                        <div class="col">
                            <b> Consulta de </b>
                        </div>
                        <div class="col">



                            <select @change="mostrarProfessional(especialidade_selecionada)" v-model="especialidade_selecionada" class="form-select" aria-label="Default select example">
                                <option v-for=" row in especialidades" :key="row.especialidade_id" :value="row.especialidade_id"> {{row.nome}}</option>
                            </select>



                        </div>

                        <div class="col ms-4">
                            <button class="btn btn-outline-success" @click="mostrarProfessional(especialidade_selecionada)" type="submit">Agendar</button>
                        </div>




                    </div>
                </nav>

            </div>

            <div class="row my-3">
                <!-- 'Row in Profissionais' é For para buscar todos os profissionais da API -->
                <div v-for=" row in profissionais" class="col-lg-4 my-2">
                    <div class="our-team-main">

                        <div class="team-front">
                            <img v-if="row.foto" :src='row.foto' class="img-fluid" />
                            <h3>{{row.nome}}</h3>
                            <p v-for="nome in row.especialidades">{{nome.nome_especialidade}}</p>
                            <button id="getId" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="mostrarLista(row.profissional_id)">AGENDAR</button>



                        </div>



                    </div>
                </div>


            </div>

            <!-- Chamada do Modal -->
            <?php require_once('formulario_agendamento.php'); ?>
           
        

        </div>
     

    </div>
    




    <?php require_once('scripts_para_importar.php') ?>
    <!-- Import do Vue.jS -->
    <script src="vue.js"></script>

   

</body>


</html>