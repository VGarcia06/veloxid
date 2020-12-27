<template>

<div>

<!-- MODAL PARA VER DETALLE-->
  <div class="modal fade bd-example-modal-md" id="exampleModalTrackingDetalle" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="card px-2">
          <div class="card-body">
            <div class="container-fluid">
              <h3 class="text-left my-1">Detalle de Servicio</h3>
              <hr>
            </div>

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-6 pl-0">
                <p class="mb-2 mt-3"><b>Datos Generales</b></p>
                <p>
                  Código : {{ detail.id }}<br>
                  Fecha de Solicitud : {{ detail.created_at }} <br>
           <!--   Estado del Servicio : {{ detail.service_state_id }} -->
                </p>
              </div>
            </div>

            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-5 pl-0">
                <p class="mt-2 mb-2"><b>Datos para Recojo</b></p>
                <p>
                  Distrito : {{ distRecojo }} <br>
                  Zona : {{ zonaRecojo }}<br>
                  Dirección :  {{ detail.direccion_origen }}
                </p>
              </div>
              <div class="col-lg-5 pr-0">
                <p class="mt-2 mb-2"><b>Datos para Entrega</b></p>
                <p>
                  Distrito : {{ distEntrega }} <br>
                  Zona : {{ zonaEntrega }}<br>
                  Dirección : {{ detail.direccion_destino }}
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
                      <th class="text-right">Imagen</th>
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
                      <td>{{ item.precio_unitario }}</td>
                      <td>{{ item.cantidad*item.precio_unitario  }}</td>
                      <td><div class="file-field"><a class="btn-floating purple-gradient mt-0 float-left"><i aria-hidden="true" class="fas fa-cloud-upload-alt"></i> <input type="file" @change="subirImagen"></a></div></td>
                      <figure>
                      <img
                        with="200"
                        height="200"
                        :src="img"
                        alt="Foto del Producto"
                      />
                    </figure></td>
                    <td>        <button
                   v-if="img != '' "
                   @click="updateProduct(item.id)"
                  class="btn btn-gradient-primary mr-2"
                    >
                     Guardar
                 </button></td>
                    
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="container-fluid mt-3 w-100">
              <!-- <p class="text-right mb-2">Sub - Total amount: $12,348</p> -->
              <!-- <p class="text-right">IGV (8%) : S/.<p> -->
              <h4 class="text-right mb-3">Total : S/{{detail.total}}</h4>
              <hr>
            </div>
            <div class="container-fluid w-100">
              <!-- <a href="#" class="btn btn-primary float-right mt-2 ml-2"><i class="mdi mdi-printer mr-1"></i>Print</a> -->
              <a href="#" class="btn btn-secondary float-right mt-2" data-dismiss="modal">
                <!-- <i class="mdi mdi-telegram mr-1"></i> -->
               Cerrar
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<!-- FIN -->

  <div class="card">
    <div class="card-body">
      <h4 class="card-title"> Solicitudes </h4>
      <div class="row mt-4">
        <div class="table-sorter-wrapper col-lg-12 table-responsive">
          <table id="sortable-table-2" class="table table-striped">
            <thead>
              <tr style="background-color: #309D4F; color: #fff">
                <th class="sortStyle ascStyle">
                  Código<i class="mdi mdi-chevron-down"></i>
                </th>
                <th class="sortStyle unsortStyle">
                  Origen<i class="mdi mdi-chevron-down"></i>
                </th>
                <th class="sortStyle unsortStyle">
                  Destino<i class="mdi mdi-chevron-down"></i>
                </th>
                <th class="sortStyle unsortStyle">
                  Estado<i class="mdi mdi-chevron-down"></i>
                </th>
                <th class="sortStyle unsortStyle">
                  Acciones<i class="mdi mdi-chevron-down"></i>
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in services"
                :key="item.id"
              >
                <td>{{ item.id }}</td>
                <td>{{ item.distrito_origen.distrito }}</td>
                <td>{{ item.distrito_destino.distrito }}</td>
                <td>{{ item.state.estado }}</td>
                <td>
                  <button
                    class="btn btn-outline-light text-black btn-sm"
                    type="button"
                    @click="getDetalle(item.id)"
                    title="Ver detalle"
                   data-toggle="modal" 
                    data-target="#exampleModalTrackingDetalle"
                  >
                    <i class="mdi mdi-eye"></i>
                  </button>             
                </td>     
                <td> 
                 <div v-for ="item1, key in item.products ">
                  <div v-if="item1.imagen==null && key==1">
                  <i  
                      class="mdi mdi-alert-circle"
                      data-original-title="Es necesario que registre fotos referenciales del producto."
                      data-toggle="tooltip"
                      data-placement="right"
                      title="Es necesario que registre fotos referenciales del producto."
                    >
                    </i>
                 </div>
                 </div>
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

export default {
  props:[
    'user'
  ],

  data() { 
    return{
      services:[],
      detail:[],
      products:[],
      imagenminiatura:"",
      imagen:"",
      distRecojo:"",
      zonaRecojo:"",
      distEntrega:"",
      zonaEntrega:""

    };  
  },
  created(){
    //Listado de Pedidos
    axios.get("api/servicesall/"+this.user.id).then((res) => {
      this.services = res.data.data;
    });
  
  },

  methods:{
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
    },

    updateProduct(arg) {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("id", arg);
      formData.append("imagen", this.imagen);
      formData.append("_method", "put");
      let url = "api/products/" + arg; //Ruta que hemos creado para enviar una tarea y guardarla
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se agregó correctamente la imagen.");
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
    
  },

    computed: {
    img() {
      return this.imagenminiatura;
    },
},
};
</script>