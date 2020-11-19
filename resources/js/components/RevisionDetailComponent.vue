<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <!-- Evaluacion Conductor -->
            <div class="col-lg-6 col-md-4 border-right">
              <div class="page-header" style="margin-bottom: 0px;">
                <h4>Evaluación de Conductor</h4>
              </div>
  
              <div class="list d-flex align-items-center border-bottom py-3">
                <div class="wrapper w-200">
                  <p class="mb-0">
                    <b>Nombre: </b>Lorem ipsum dolor sit amet</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center" style="padding-top: 8px;">
                      <i class="mdi mdi-calendar text-muted mr-100"></i>
                      <p class="mb-0">17/11/2020</p>
                    </div>
                    <!-- <small class="text-muted ml-auto">2 hours ago</small> -->
                  </div>
                </div>
              </div>
  
              <div class="form-group" style="margin-top: 30px">
                <label>Requerimientos:</label>
                <div class="list-wrapper">
                  <ul
                    class="d-flex flex-column-reverse todo-list"
                    v-for="item in revisions" 
                    :key="item.id"
                  >
                    <li style="padding: 0">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input v-if="item.pivot.valor = 1" type="checkbox" class="form-check-input" disabled="" checked="">
                          <input v-else type="checkbox" class="form-check-input" disabled="">
                          {{ item.requerimiento }}
                          <i class="input-helper"></i>
                        </label>
                      </div>                                       
  
                        <!-- <i v-if="item.pivot.valor = 1" class="mdi mdi-bookmark-check"></i>
                        <i v-else class="mdi mdi-bookmark-remove"></i>
                        <label class="form-label">{{ item.requerimiento }}</label> -->
                    </li>
                  </ul>
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleTextarea1">Observaciones:</label>
                <textarea
                  class="form-control"
                  rows="4"
                  disabled
                >{{ observacion }}</textarea>
              </div>                
            </div>
  
            <!-- Evaluacion Vehiculo -->
            <div class="col-lg-6 col-md-4">
              <div class="page-header">
                <h4>Evaluación de Vehículo</h4>
              </div>
              <div class="form-group" style="margin-top: 30px">
                <label>Requerimientos:</label>
                <div class="list-wrapper">
                  <ul>
                    <li>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Observaciones:</label>
                <textarea
                  class="form-control"
                  rows="4"
                  disabled
                ></textarea>
              </div>                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {

  props: ["detail"],

    data() {
      return {
      revisions:[],
      observacion:"",  
      idvehicle:"",
       };
      
    },
    
    created() { 
       axios
        .get("api/drivers/"+this.detail[0].driver+"/evaluations/"+this.detail[1].revision, {
        })
        .then((res) => {
          this.revisions = res.data.revision.requirements;
          this.observacion = res.data.revision.observacion;
          console.log(this.revisions);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
        axios
        .get("api/vehicles/"+this.idvehicle+"/evaluations/"+this.detail[0].revision, {
        })
        .then((res) => {
          this.revisions = res.data.revision.requirements;
          this.observacion = res.data.revision.observacion;
          console.log(this.revisions);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    methods: {
    }

};
</script>