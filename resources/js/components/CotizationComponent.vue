<template>
  <div class="content-wrapper" style="padding-bottom: 0px;">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Cotización de Pedido </h2>
            <p class="card-description"> </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Punto de Origen</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="zonaorigen">
                      <option value="" selected disabled>--Seleccionar Zona--</option>
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
                      <option value="" selected disabled>--Seleccionar Zona--</option>
                      <option v-for="item in zonas" :value="item">{{item.zona}}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Distrito Origen</label>
                  <div class="col-sm-9">
                    <select class="form-control" v-model="distritoorigen" v-if="zonaorigen != -1">
                      <option value="" selected disabled>--Seleccionar Distrito--</option>
                      <option v-for="item in zonaorigen.distritos" :value="item">{{item.distrito}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Distrito Destino</label>
                  <div class="col-sm-9">
                     <select class="form-control" v-model="distritodestino" v-if="zonadestino != -1">
                      <option value="" selected disabled>--Seleccionar Distrito--</option>
                      <option v-for="item in zonadestino.distritos" :value="item">{{item.distrito}}</option>
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
                    <input class="form-control" placeholder="Nombre del Producto">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Cantidad</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" placeholder="Nombre del Producto">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Categoria</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>Categoria 1</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Subcategoria</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>subcategoria 1</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Añadir foto</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ver foto</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Peso</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Altura</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ancho</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
            </div>

        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
        <button
        v-if="update == 0"
        @click="saveProductos()"
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
              <th>#</th>
              <th class="sortStyle ascStyle">
                Desripción<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Categoría<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Subcategoria<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Peso<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Altura<i class="mdi mdi-chevron-down"></i>
              </th>
              <th class="sortStyle unsortStyle">
                Ancho<i class="mdi mdi-chevron-down"></i>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
            >
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

      <br><br><br><br>
      <!--Botón para calcular-->
      <button type="button"
      class="btn btn-gradient-primary mr-2">
      Calcular monto 
     </button>
     <br><br><br>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Total de Cotización</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <button type="button"
              class="btn btn-gradient-primary mr-2">
              Contratar 
            </button>
          </div>
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
    data() {
      return {
        update:0,
        zonas:[],
        zonaorigen:"",
        zonadestino:"",
        distritoorigen:"",
        distritodestino:"",
      };
    },

    created() {
    axios.get("api/zonas").then((res) => {
      this.zonas = res.data;
    });

    axios.get("api/vehicletypes").then((res) => {
      this.vehicletypes = res.data.VehicleTypes;
    });

    axios.get("api/documenttypes").then((res) => {
      this.documenttypes = res.data.DocumentTypes;
    });
  },


  };
</script>