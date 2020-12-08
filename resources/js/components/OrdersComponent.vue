<template>
    <div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pedidos</h4>

        <div class="form-group row" style="margin-top: 30px">
          <div class="col-lg-4">
            <label>Filtrar por Estado:</label>
            <select class="form-control" v-model="state">
              <option v-for="item in states" :value="item.id" :key="item.id">
                {{ item.estado }}
              </option>
            </select>
          </div>
          <div class="col-lg-4">
            <label>Filtrar por Fecha:</label>
            <input type="date" class="form-control" />
          </div>
          <div class="col-lg-2">
            <label></label>
            <button
              class="form-control btn btn-gradient-primary mr-2"
            >
              Filtrar
            </button>
          </div>
        </div>

        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-2" class="table table-striped">
              <thead>
                <tr style="background-color: #309D4F; color: #fff">
                  <th>Código</th>
                  <th class="sortStyle ascStyle">
                    Origen<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Destino<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Fecha de Recogo<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Estado<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Transportista<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <!-- <th class="sortStyle unsortStyle"></th> -->
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in services.data">
                  <td>{{item.id}}</td>
                  <td>{{item.direccion_origen}} - {{item.distrito_origen.distrito}} </td>
                  <td>{{item.direccion_destino}} - {{item.distrito_destino.distrito}}</td>
                  <td>{{ item.fecha_recojo}}</td>
                  <td>{{ item.state.estado}}</td>
                  <td>
                    <select v-model="driver_id" ref="driver" class="form-select" aria-label="Default select example">
                      <option >Seleccione a un Conductor</option>
                      <option v-for="item in drivers" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                    <a href="#"  @click.prevent="assign(driver_id,item.id)" >Asignar</a>
                  </td>
                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

export default {
  
  data() {
    return {
      state:"",
      states: "",
      services:[],
      drivers: [],
    };
  },
  created() {
    
    axios.get("api/services/states").then((res) => {
      this.states = res.data;
    });
    axios.get("api/services/all").then((res) => {
      this.services = res.data;
    });
    axios.get("api/drivers/evaluated").then((res) => {
      this.drivers = res.data.suitable;
    });
  },
  methods: {
    assign(driver_id,service_id){
      if (driver_id==undefined) {
        this.$fire({
          title: "Error",
          text: "Seleccione a un Conductor" ,
          type: "error",
          showConfirmButton: false,
          timer: 3000
        })
      }

       axios.post("api/allocations",{
        service_id: service_id,
        driver_id: driver_id
      }).then((res) => {
        this.$fire({
          title: "Servicio asignado",
          text: "Se ha asignado el Servicio" ,
          type: "success",
          showConfirmButton: false,
          timer: 3000
        })

        axios.get("api/services/all").then((res) => {
          this.services = res.data;
        });
      })
    } 
  }
};
</script>