Vue.use(VueMask.VueMaskPlugin);
Vue.use(Toasted)

const app = new Vue({
    el: '#app',


    //Aqui ficar minhas propriedades
    data: {
        especialidades: null,
        especialidade_selecionada: '',
        profissionais: null,
        patientListSources: null,
        
        name:'',
        specialty_id:1,
        professional_id:'',
        cpf:'',
        birthdate: '',
        origem_id_selecionada:'',


    },

    //Minhas Funções
    methods: {
        
    
        agendar(){
            var resposta;
            
            console.log(this.birthdate)
            const dataNascimento = moment(this.birthdate, "DD/MM/YYYY").format("YYYY-MM-DD");
            
            axios.post('json_encode_api/api.php', {
                action: 'salvarAgendamento',
                name: this.name,
                specialty_id : this.specialty_id,
                professional_id : this.professional_id,
                cpf: this.cpf,
                source_id: this.origem_id_selecionada,
                birthdate: dataNascimento

                
    
              
            }).then(function(response) {
    
                resposta = response.data.msg;
    
            }).finally(function(response){
                console.log( resposta)
               
                Vue.toasted.show(resposta, {
                    theme: "bubble", 
                    position: "bottom-right", 
                    duration : 5000
                  });
    

            })          

        },
        mostrarLista(profissional_id){
           
        
            this.professional_id = profissional_id
            
           
        
    
          
            axios.get('https://api.feegow.com/v1/api/patient/list-sources', {

                    headers: {
                        'Content-Type': 'application/json',
                        'x-access-token': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'
                    }
                })
                .then(function(response) {
                    app.patientListSources = response.data.content
                    
                })
        },
        mostrarProfessional(especialidade_selecionada) {
            console.log(especialidade_selecionada)
            this.specialty_id = especialidade_selecionada
            console.log(   this.specialty_id)
            axios.get('https://api.feegow.com/v1/api/professional/list/?especialidade_id=' + especialidade_selecionada, {

                    headers: {
                        'Content-Type': 'application/json',
                        'x-access-token': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'
                    }
                })
                .then(function(response) {
                    app.profissionais = response.data.content
                  
                })
        },
      
      

    },


    //executar código logo após a instância ou página ser criada
    mounted() {
        
        
      

        axios.get('https://api.feegow.com/v1/api/specialties/list', {

                headers: {
                    'Content-Type': 'application/json',
                    'x-access-token': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'
                }
            })
            .then(function(response) {
                app.especialidades = response.data.content
              
            })
    }

})
