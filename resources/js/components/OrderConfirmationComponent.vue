<template>
<div>
  <!-- MODAL PARA VER DETALLE-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <div class="container-fluid">
            <h3>Detalle de Servicio</h3>
          </div>
          <button @click="clearFields()" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-6 pl-0">
                <p class="mb-2 mt-3"><b>Datos Generales</b></p>
                <p>
                  Código : {{ detail.id }}<br>
                  Fecha de Recojo : {{ detail.fecha_recojo | time }} <br>
                  Fecha de Entrega : {{ detail.fecha_entrega | time }} <br>
                  Estado del Servicio :
                    <label v-if="detail.service_state_id==2" class="badge badge-info">Aceptado</label>
                    <label v-if="detail.service_state_id==1" class="badge badge-warning">Pendiente</label>
                    <label v-if="detail.service_state_id==3" class="badge badge-secondary">En Tránsito</label>
                    <label v-if="detail.service_state_id==4" class="badge badge-success">Entregado</label>
                    <label v-if="detail.service_state_id==5" class="badge badge-danger">Falso Flete</label>
                    <label v-if="detail.service_state_id==6" class="badge badge-danger">Rechazado</label>
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


       
                      <th class="text-right"></th>
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
     
                    <td>       </td>
                    
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button @click="clearFields()" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- FIN -->

<!-- MODAL AGREGAR AUXILIAR -->
<div>

<div
      class="modal fade"
      id="exampleModalRegistrarAuxiliar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title text-primary"
              id="exampleModalLabel"
            >
              REGISTRAR AUXILIAR
            </h5>

            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="clearFields()"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="text"
                      class="form-control"
                      v-model="nombre"
                      placeholder="Nombres"
                      maxlength="60"
                      title="Ingresar nombres completos del auxiliar."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="text"
                      class="form-control"
                      v-model="apellidoPaterno"
                      placeholder="Apellido Paterno"
                      maxlength="50"
                      title="Ingresar solo apellido paterno del auxiliar."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="text"
                      class="form-control"
                      v-model="apellidoMaterno"
                      placeholder="Apellido Materno"
                      maxlength="50"
                      title="Ingresar solo apellido materno del auxiliar."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">                    
                      <select v-model="document_type" class="form-control form-control-sm" id="exampleFormControlSelect3">                              
                          <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DNI</font></font></option>
                          <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Carnet de Extrangeria</font></font></option>                
             
                      </select>                                
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="text"
                      class="form-control"
                      v-model="numero"
                      placeholder="N° Documento"
                      title="Ingresar número de identidad del auxiliar."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
            <button
               @click="addAuxiliar()"
              class="btn btn-gradient-primary mr-2"
            >
              Registrar
            </button>
            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
            <button
              @click="clearFields()"
              class="btn btn-danger btn-fw" data-dismiss="modal"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN -->
    



</div>
<!-- FIN -->

<!-- MODAL AGREGAR EVIDENCIA-->
<div>

<div
      class="modal fade"
      id="exampleModalSubirEvidencia"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title text-primary"
              id="exampleModalLabel"
            >
              REGISTRAR EVIDENCIA
            </h5>

            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="clearFields()"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"
                    >Subir Fotografía</label
                  >
                  <div class="col-sm-9">
                    <input
                      type="file"
                      class="form-control file-upload-info"
                      @change="subirImagen"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fotografía</label>
                  <div class="col-sm-9">
                    <figure>
                      <img
                        with="200"
                        height="200"
                        :src="img"
                        alt="Foto de la Entrega"
                      />
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
            <button
              @click="subir_evidencia()"
              class="btn btn-gradient-primary mr-2" data-dismiss="modal"
            >
              Registrar
            </button>
            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
            <button
              @click="clearFields()"
              class="btn btn-danger btn-fw" data-dismiss="modal"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN -->
    



</div>
<!-- FIN -->

<div class="card">
<div class="card-body">

  <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pedidos Asignados</font></font></h1>

  <div class="input-group mb-3"><input type="text" placeholder="Buscar por código de pedido" aria-describedby="basic-addon2" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Buscar
              </font></font></button></div></div>
<div class="table-sorter-wrapper col-lg-12 table-responsive" style="padding-left: 0px; padding-right: 0px;">
  <table id="sortable-table-2" class="table table-striped">
    <thead>
      <tr style="background-color: #309D4F; color: #fff">
        <th class="sortStyle ascStyle">Código</th>
        <th class="sortStyle unsortStyle">Origen</th>
        <th class="sortStyle unsortStyle">Destino</th>      
        <th class="sortStyle unsortStyle">Cotización</th>
        <th class="sortStyle unsortStyle">Fecha Recojo</th>
        <th class="sortStyle unsortStyle">Fecha Entrega</th>
        <th class="sortStyle unsortStyle">Estado</th>
        <th class="sortStyle unsortStyle">Confirmación</th>
        <th class="sortStyle unsortStyle">Evidenciar</th>
        <th class="sortStyle unsortStyle">Detalle</th>
        <th class="sortStyle unsortStyle">Auxiliar</th>
      </tr>
    </thead>
    <tbody>
          
      <tr v-for="item in services" :key="item.id" >
        <td>{{item.service.id}}</td>
        <td>{{item.service.direccion_origen}}</td>
        <td>{{item.service.direccion_destino}}</td>            
        <td>{{item.service.total*0.60}}</td>      
        <td>{{item.service.fecha_recojo | timeformat}}</td>        
        <td>{{item.service.fecha_entrega | timeformat}} </td>      
        <td>       
          <div v-if="item.service.service_state_id==1">
            <label class="badge badge-warning">Pendiente</label>
          </div>
          <div v-if="item.service.service_state_id==2">
            <label class="badge badge-info">Aceptado</label>
          </div>
          <div v-if="item.service.service_state_id==6">
            <label class="badge badge-danger">Rechazado</label>
          </div>
          <div v-if="item.service.service_state_id==3">
            <label class="badge badge-secondary">En Tránsito</label>
          </div>
          <div v-if="item.service.service_state_id==4">
            <label class="badge badge-success">Entregado</label>
          </div>
          <div v-if="item.service.service_state_id==5">
            <label class="badge badge-danger">Falso Flete</label>
          </div>
        </td>        
        <td>
          <select @click="cambio_estado(item.id,item.service.service_state_id)" v-model="item.service.service_state_id" :disabled="item.service.service_state_id==4 || item.service.service_state_id==6" class="form-control form-control-sm" id="exampleFormControlSelect3">                              
            <option value="2"  :disabled="item.service.service_state_id!=1 " ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aceptar</font></font></option>
            <option value="6"  :disabled="item.service.service_state_id!=1 "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rechazar</font></font></option>                
            <option value="3"  :disabled="item.service.service_state_id==1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En tránsito</font></font></option>    
            <option value="4"  :disabled="item.service.service_state_id!=3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Entregado</font></font></option>             
            <option value="5" :disabled="item.service.service_state_id==1 "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Falso flete</font></font></option>                
          </select>
        </td>      
        <td>
         <button :disabled="item.service.service_state_id!=3" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalSubirEvidencia" @click="get_id(item.service.id)" >Evidenciar entrega</button>
        </td>

        <td>
                            <button
                    type="button"
                     class="btn btn-outline-light text-black btn-sm" data-toggle="modal" data-target="#myModal" @click="getDetalle(item.service.id)"
                  >
                    <i class="mdi mdi-eye"></i>
                  </button> 
                  </td>  
        <td><button type="button" :disabled="item.service.service_state_id!=2" class="btn btn-success" data-toggle="modal" data-target="#exampleModalRegistrarAuxiliar" @click="set_id(item.id)" >Agregar</button></td>
      </tr>
    </tbody>
  </table>
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
import Vue from "vue";
import moment from "moment";

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);
export default {
    props:[
    'user'
  ],
  data() {
    return {
      services: [],
      products:[],
      nombre: "",
      apellidoPaterno: "",
      apellidoMaterno: "",
      numero: "",
      document_type: "",
      imagenminiatura: "",
      id_servicio: 0,

      detail: [],

      imagenminiatura: "",
      imagen:"",
      imagenevidence:{},
      distRecojo: "",
      zonaRecojo: "",
      distEntrega: "",
      zonaEntrega: "",

      current_page: 1,

    };
  },
  created() {
    //Listado de Pedidos
    axios.get("api/allocations/"+this.user.id).then((res) => {
      this.services = res.data.data;
      console.log(this.services);
    });
  },
  methods: {
    // Paginación
    getPedidos(num_page) {
      axios
        .get("api/allocations/"+this.user.id, {
          params: {
            page: num_page,
          },
        })
        .then((res) => {
          this.services = res.data.data;
          this.current_page = res.data.current_page;
          console.log(this.services);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },    

    cambio_estado(id_service, estado) {
    
        axios
          .patch("/api/allocations/" + id_service,{
            id_status_internal:estado
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
      
    },

    get_id(id_service){
      this.id_servicio=id_service;
    },

    subir_evidencia() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let formData = new FormData();
      formData.append("imagen", this.imagen);
      let url = "api/services/" + this.id_servicio + "/images";
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se registró correctamente la evidencia.");
          this.getPedidos();
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    subirImagen(e) {
      let file = e.target.files[0];
      this.imagen = file;
      this.mostrarImagen(file);
      console.log(this.imagen);
    },

    mostrarImagen(file) {
      let reader = new FileReader();

      reader.onload = (e) => {
        this.imagenminiatura = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    set_id(id_service) {
      this.id_servicio = id_service;
    },
    addAuxiliar() {
      axios
        .post("api/allocations/" + this.id_servicio + "/auxiliars", {
          nombre:
            this.nombre +
            " " +
            this.apellidoPaterno +
            " " +
            this.apellidoMaterno,
          numero: this.numero,
          document_type_id: this.document_type,
        })
        .then(function (response) {
          this.$fire({
            title: "Auxiliar Agregado",
            text: "Se ha agregado al auxiliar",
            type: "success",
            showConfirmButton: false,
            timer: 3000,
          });
        });
    },
    //Detalle de Pedido
    getDetalle(arg) {
      axios.get("api/services/" + arg).then((res) => {
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

    clearFields(){
        this.detail = "";
        this.distRecojo = "";
        this.zonaRecojo = "";
        this.distEntrega = "";
        this.zonaEntrega = "";
        this.products = "";
        this.imagenevidence={};
    },

  },

  filters: {
     timeformat: function (arg) {
      return moment(arg).format('L');
    },
     time: function (arg) {
      return moment(arg).format('L');
    },
  },

  computed: {
    img() {
      return this.imagenminiatura;
    },
  },

  mounted() {
    this.getPedidos();
  },
};
</script>