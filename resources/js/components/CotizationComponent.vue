<template>
  <div class="content-wrapper" style="padding-bottom: 0px;">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Cotización de Pedido </h2>
            <p class="card-description"> </p>
       <!-- <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Punto de Origen</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="zonaorigen">
                      <option value="" selected disabled>-Seleccionar Zona-</option>
                      <option v-for="item in zonas" :value="item">{{item.zona}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Punto de Destino</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="zonadestino">
                      <option value="" selected disabled>-Seleccionar Zona-</option>
                      <option v-for="item in zonas" :value="item">{{item.zona}}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Distrito Origen</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="distritoorigen">
                      <option v-for="item in distritos" :value="item" :key="item.id">{{item.distrito}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Distrito Destino</label>
                  <div class="col-sm-9">
                     <select class="form-control" v-model="distritodestino">
                      <option v-for="item in distritos" :value="item" :key="item.id">{{item.distrito}}</option>
                    </select>
                  </div>
                  </div>
                </div>
              </div>
            


            <h4 class="card-title">Registrar Producto </h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Descripción</label>
                  <div class="col-sm-9">
                    <input class="form-control" v-model="producto.descripcion" placeholder="Nombre del Producto">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Cantidad</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" v-model="producto.cantidad" placeholder="Cantidad">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Categoria</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="categorie">
                      <option v-for="item in categories" :value="item">{{item.nombre}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Subcategoría</label>
                  <div class="col-sm-9">
                     <select class="form-control" v-model="producto.subcategory">
                      <option v-for="item in categorie.subcategories" :value="item">{{item.nombre}}</option>
                    </select>
                  </div>
                  </div>
                </div>
              </div>
              <!--
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Añadir foto</label>
                <div class="col-sm-9">
                    <input
                      type="file"
                      class="form-control file-upload-info"
                      @change="subirImagen"
                    />
                    <code style="color: #9c9fa6;">Subir fotografía del foto.</code>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ver foto</label>
                  <div class="col-sm-9">
                    <figure>
                      <img
                        with="200"
                        height="200"
                        :src="producto.imagen"
                        alt="Foto del Producto"
                      />
                    </figure>
                  </div>
                </div>
              </div>
            </div>
              -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Peso</label>
                  <div class="col-sm-9">
                     <div class="input-group">
                     <input type="number" class="form-control" v-model="producto.peso">
                       <div class="input-group-prepend">
                    <select class="form-control" v-model="producto.pesoM">
                      <option value="" selected disabled>U. Medida</option>
                      <option value="KG">KG</option>
                      <option value="T">T</option>
                    </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alto</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                     <input type="number" class="form-control" v-model="producto.alto">
                       <div class="input-group-prepend">
                    <select class="form-control" v-model="producto.altoM">
                      <option value="" selected disabled>U. Medida</option>
                      <option value="CM">CM</option>
                      <option value="MT">MT</option>
                    </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              </div>
              
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ancho</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                     <input type="number" class="form-control" v-model="producto.ancho">
                       <div class="input-group-prepend">
                    <select class="form-control" v-model="producto.anchoM">
                      <option value="" selected disabled>U. Medida</option>
                      <option value="CM">CM</option>
                      <option value="MT">MT</option>
                    </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Largo</label>
                  <div class="col-sm-9">
                      <div class="input-group">
                     <input type="number" class="form-control" v-model="producto.largo">
                       <div class="input-group-prepend">
                    <select class="form-control" v-model="producto.largoM">
                      <option value="" selected disabled>U. Medida</option>
                      <option value="CM">CM</option>
                      <option value="MT">MT</option>
                    </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>

        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
        <button
        v-if="update == 0"
        @click="saveProductos(producto)"
        class="btn btn-gradient-primary mr-2"
      >
        Registrar producto
      </button>
      <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
      <button
        v-if="update != 0"
        @click="updateProductos()"
        class="btn btn-warning btn-fw"
      >
        Actualizar producto
      </button>
      <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
      <button
        v-if="update != 0"
        @click="clearFields()"
        class="btn btn-danger btn-fw"
      >
        Cancelar
      </button>
   

  <br><br><br>

<!--Tabla de Productos-->
    <div class="row">
      <div class="table-sorter-wrapper col-lg-12 table-responsive">
        <table id="sortable-table-2" class="table table-striped">
          <thead>
            <tr style="background-color: #309D4F; color: #fff">
              <th class="sortStyle ascStyle">
                Descripción<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Peso<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Alto<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Ancho<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Largo<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Cantidad<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Precio / u<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Subtotal<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                <i class="mdi mdi-chevron-down"></i>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,index) in service.products" :value="item.id"
            >
              <td>{{item.descripcion}}</td>
              <td>{{item.peso}}{{item.pesoM}}</td>  
              <td>{{item.alto}}{{item.altoM}}</td>
              <td>{{item.ancho}}{{item.anchoM}}</td>
              <td>{{item.largo}}{{item.largoM}}</td>
              <td>{{item.cantidad}}</td>
              <td>{{item.precio_unitario}}</td>
              <td>{{item.subtotal}}</td>
              <td><button  class="btn btn-danger btn-fw" @click="deleteProduct(index)">Eliminar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
     <br><br><br>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Total De Cotización</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" v-model="service.total" disabled>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
          <form v-bind:action="homeRoute" method="POST" enctype="multipart/form-data">
          
              <input type="hidden" name="_token" :value="csrf">
              <input type="hidden" name="service" :value="JSON.stringify(service)">
            <button type="submit"
              class="btn btn-gradient-primary mr-2">
              Contratar
            </button>
            
          </form>
          </div>
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
    props: ['homeRoute'],
    data() {
      return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        update:0,
        cotizar: true,
        distritos:[],
        categories:[],
        distritoorigen: "",
        distritodestino: "",
        categorie:"",
        producto: {
          cantidad: 1,
        },

        service:{
            distrito_origen_id : "",
            distrito_destino_id :"",
            direccion_origen : null,
            direccion_destino : null,
            fecha_recojo : null,
            fecha_entrega : null,
            transaction_id : 0,
            total : 0,
            products : []
        },
      };
    },

  created() {
    axios.get("api/distritos").then((res) => {
      this.distritos = res.data;
    });

    axios.get("api/categories").then((res) => {
      this.categories = res.data;
    });

    axios.get("api/prices").then((res) => {
    this.prices = res.data;
    });
  },
  methods:{
    cotizacion(){

    },
      saveProductos(producto){
        if (producto!=null) {
          /// Obtener precio del producto

          //obtener el precio mediante la función api/prices
          var distritodestino = this.distritodestino;
          var distritoorigen = this.distritoorigen;
          
          var price = this.prices.find((precio) => { 
              return precio.zona_destino_id === distritodestino.zona_id
                    && precio.zona_origen_id === distritoorigen.zona_id
                    && precio.vehicle_type_id === producto.subcategory.vehicle_type_id;
            });

          axios.post("api/prices/cotizar",{
            distrito_origen_id: this.distritoorigen.id,
            distrito_destino_id: this.distritodestino.id,
            subcategory_id: producto.subcategory.id,
            cantidad: producto.cantidad,
          }).then((res) => {
            this.producto.precio_unitario = res.data;
            this.producto.subcategory_id = this.producto.subcategory.id;

            /// Concatenando alto
            this.producto.alto = this.producto.alto + this.producto.altoM;
            delete this.producto.altoM;

            /// Concatenando ancho
            this.producto.ancho = this.producto.ancho + this.producto.anchoM;
            delete this.producto.anchoM;

            /// Concatenando largo
            this.producto.largo = this.producto.largo + this.producto.largoM;
            delete this.producto.largoM;

            /// Concatenando peso
            this.producto.peso = this.producto.peso + this.producto.pesoM;
            delete this.producto.pesoM;

            //Sumar
            this.producto.subtotal=this.producto.cantidad*this.producto.precio_unitario;
            this.service.total += this.producto.subtotal;
            this.service.distrito_origen_id=this.distritoorigen.id;
            this.service.distrito_destino_id=this.distritodestino.id;
            this.service.products.push(producto);

            this.clearFields();
           alert("Se agregó correctamente los datos del producto.");
          }).catch((error) => {
            console.log(error);
            alert("Tu producto no encuentra un precio.");
          });
        }
      },


    clearFields() {
      //Limpia los campos e inicializa la variable update a 0
      this.producto = {
        cantidad : 1,
        categorie: "",
      };
    },


    deleteProduct: function (index) {
    this. service.products.splice(index, 1);
    this.service.total = this.service.total-this.producto.subtotal;
    },


    makeRequest: function() {
      this.$router.push({ path: '/request', query: { service: this.service } })
    },

  },

    computed: {
    img() {
      return this.imagenminiatura;
    },
  },



  };
</script>