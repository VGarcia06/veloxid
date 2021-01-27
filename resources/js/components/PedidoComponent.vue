<template>
  <div>
  <!-- MODAL PARA VER DETALLE-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="container-fluid">
            <h3>Detalle de Servicio</h3>
          </div>
          <button @click="clear()" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-6 pl-0">
                <p class="mb-2 mt-3"><b>Datos Generales</b></p>
                <p>
                  Código : {{ detail.id }}<br>
                  Fecha de Recojo : {{ detail.fecha_recojo | timeFormat }} <br>
                  Fecha de Entrega : {{ detail.fecha_entrega | timeFormat }} <br>
                  Estado del Servicio :
                    <label v-if="detail.service_state_id==2" class="badge badge-info">Aceptado</label>
                    <label v-if="detail.service_state_id==1" class="badge badge-warning">Pendiente</label>
                    <label v-if="detail.service_state_id==3" class="badge badge-danger">En Tránsito</label>
                    <label v-if="detail.service_state_id==4" class="badge badge-success">Entregado</label>
                </p>
              </div>
            </div>

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-4 pl-0">
                <p class="mt-2 mb-2"><b>Datos para Recojo</b></p>
                <p>
                  Distrito : {{ distRecojo }} <br>
                  Zona : {{ zonaRecojo }}<br>
                  Dirección :  {{ detail.direccion_origen }}
                </p>
              </div>
              <div class="col-lg-4 pr-0">
                <p class="mt-2 mb-2"><b>Datos para Entrega</b></p>
                <p>
                  Distrito : {{ distEntrega }} <br>
                  Zona : {{ zonaEntrega }}<br>
                  Dirección : {{ detail.direccion_destino }}
                </p>
              </div>
                <div class="col-lg-4 pr-0">
                <p class="mt-2 mb-2"><b>Evidencia de Entrega</b></p>
                <p>
                <img
                :src="'storage/'+imagenevidence.imagen"
                style="width: 180px; height: 170px"
              />
                </p>
              </div>
            </div>         

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-6 pl-0">
                <p class="mb-2 mt-2"><b>Productos</b></p>
              </div>
            </div>
            <div class="container-fluid mt-2 d-flex justify-content-center w-100">             
              <div class="table-responsive w-100">
                <table class="table">
                  <thead>
                    <tr style="background-color: #309D4F; color: #fff">
                      <th>#</th>
                      <th>Descripción</th>
                      <th class="text-right">Peso</th>
                      <th class="text-right">Alto</th>
                      <th class="text-right">Ancho</th>
                      <th class="text-right">Largo</th>
                      <th class="text-right">Cantidad</th>
                      <th class="text-right">Precio/u</th>
                      <th class="text-right">Subtotal</th>
                      <th class="text-center">Imagen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr 
                      class="text-right"
                      v-for="item in products"
                      :key="item.id"
                    >
                      <td class="text-left">{{ item.id }}</td>
                      <td class="text-left">{{ item.descripcion }}</td>
                      <td>{{ item.peso }}g</td>
                      <td>{{ item.alto }}</td>
                      <td>{{ item.ancho }}</td>
                      <td>{{ item.largo }}</td>
                      <td>{{ item.cantidad }}</td>
                      <td>{{ item.precio_unitario }}</td>
                      <td>{{ item.cantidad*item.precio_unitario  }}</td>
                      <!-- <td>
                        <div class="file-field"><a class="btn-floating purple-gradient mt-0 float-left"><i aria-hidden="true" class="fas fa-cloud-upload-alt"></i> <input type="file" @change="subirImagen"></a></div>
                      </td> -->
                      <td class="text-center">
                        <figure>
                          <img
                            with="200"
                            height="200"
                            :src="img"
                            alt="Foto del Producto"
                          />
                        </figure>
                      </td>
                      <!-- <td>        
                        <button
                          v-if="img != '' "
                          @click="updateProduct(item.id)"
                          class="btn btn-gradient-primary mr-2"
                            >
                            Guardar
                        </button>
                      </td> -->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="container-fluid mt-3 w-100">
              <!-- <p class="text-right mb-2">Sub - Total amount: $12,348</p> -->
              <!-- <p class="text-right">IGV (8%) : S/.<p> -->
              <h4 class="text-right mb-3">Total : S/{{detail.total}}</h4>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button @click="clear()" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- FIN -->

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
                    Recojo<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Entrega<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Acciones<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Estado<i class="mdi mdi-chevron-down"></i>
                  </th>
                  
                  <th class="sortStyle unsortStyle">
                    Transportista<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in services.data" :key="item.id">
                  <td>{{item.id}}</td>
                  <td>{{item.direccion_origen}} - {{item.distrito_origen.distrito}} </td>
                  <td>{{item.direccion_destino}} - {{item.distrito_destino.distrito}}</td>
                  <td>{{ item.fecha_recojo  | timeFormat }}</td>
                  <td>{{ item.fecha_entrega | timeFormat }}</td>
                  <td><button @click="getDetalle(item.id)" type="button" class="btn btn-outline-light text-black btn-sm" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-eye"></i></button></td>
                  <td>
                    <div v-if="item.service_state_id==2">
                    <label class="badge badge-info">Aceptado</label>
                    </div>
                    <div v-if="item.service_state_id==1">
                    <label class="badge badge-warning">Pendiente</label>
                    </div>
                    <div v-if="item.service_state_id==3">
                    <label class="badge badge-danger">En Tránsito</label>
                    </div>
                    <div v-if="item.service_state_id==4">
                    <label class="badge badge-success">Entregado</label>
                    </div>
                  </td>
                  <td>
                    <select v-model="driver_id" ref="driver" class="form-control form-control-sm" aria-label="Default select example">
                      <option >Seleccione a un Conductor</option>
                      <option v-for="item in drivers" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                  </td>
                  <td>
                    <a href="#"  @click.prevent="assign(driver_id,item.id)" >Asignar</a>                      
                  </td>
                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5"></div>
            <div class="col-sm-12 col-md-7">
                <div
                class="dataTables_paginate paging_simple_numbers"
                id="order-listing_paginate"
                >
                  <ul class="pagination">
                      <li id="order-listing_previous">
                      <button
                          aria-controls="order-listing"
                          data-dt-idx="0"
                          tabindex="0"
                          class="page-link"
                          @click="getPedidos(current_page- 1)"
                      >
                          Anterior
                      </button>
                      </li>
                      <li class="paginate_button page-item active">
                      <a
                          aria-controls="order-listing"
                          data-dt-idx="0"
                          tabindex="0"
                          class="page-link"
                          >{{ current_page }}</a
                      >
                      </li>
                      <li id="order-listing_next">
                      <button
                          aria-controls="order-listing"
                          data-dt-idx="0"
                          tabindex="0"
                          class="page-link"
                          @click="getPedidos(current_page+ 1)"
                      >
                          Siguiente
                      </button>
                      </li>
                  </ul>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
import moment from 'moment';
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
      detail:[],
      imagenminiatura:"",
      imagen:"",
      imagenevidence:{},
      distRecojo:"",
      zonaRecojo:"",
      distEntrega:"",
      zonaEntrega:"",
      current_page: 1,
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
    getPedidos(num_page) {
      axios
        .get("api/services/all", {
          params: {
            page: num_page,
          },
        })
        .then((res) => {
          this.services = res.data;
          this.current_page = res.data.current_page;
          console.log(this.services);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    //Detalle de Pedido
    getDetalle(arg) { 
    axios.get("api/services/"+arg).then((res) => {
        this.detail = res.data;
        this.distRecojo = this.detail.distrito_origen.distrito;
        this.zonaRecojo = this.detail.distrito_origen.zona.zona;
        this.distEntrega = this.detail.distrito_destino.distrito;
        this.zonaEntrega = this.detail.distrito_destino.zona.zona;
        this.products = this.detail.products;
    });

    axios.get("api/services/" + arg+'/images').then((res) => {
        this.imagenevidence = res.data[0];
        console.log(this.imagenevidence );
      });
    },

    clear(){
        this.detail = "";
        this.distRecojo = "";
        this.zonaRecojo = "";
        this.distEntrega = "";
        this.zonaEntrega = "";
        this.products = "";
        this.imagenevidence={};
    },

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
  },
    filters: {
    timeFormat: function (arg) {
      return moment(arg).format('L');      
    }
  },
    mounted() {
    this.getPedidos();
  },
};
</script>