<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container">
          <form>
            <div class="row">
              <div class="col my-2 ">

                <div class="form-group">
                  <input v-model="name" type="text" class="form-control" id="name" placeholder="Nome Completo">
                </div>


              </div>

              <div class="col my-2 ">
                <!-- Estou buscando da minha propriedade patientListSources a List Sources pela API -->
                <select v-model="origem_id_selecionada" class="form-select" aria-label="Default select example">
                  <option v-for=" row in patientListSources" :key="row.origem_id" :value="row.origem_id"> {{row.nome_origem}}</option>
                </select>
              </div>

            </div>
            <div class="row">

              <div class="col my-2 ">
                <div class="form-group">

                  <input v-model="birthdate" v-mask="'##/##/####'" type="text" class="form-control" id="date" placeholder="Data de Nascimento">
                </div>
              </div>

              <div class="col my-2">
                <!-- V-mask é um puglin para colocar maskara nos meus inputs -->
                <input v-model="cpf" v-mask="'###########'" type="text" class="form-control" id="cpf" placeholder="CPF">
              </div>

            </div>
          </form>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        
        <button type="button" @click="agendar" class="btn btn-success">SOLICITAR OS HORÁRIOS</button>
      </div>
    </div>
  </div>
</div>

