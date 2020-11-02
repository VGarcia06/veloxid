<template>
  <div>
    <!-- Modal Conductor-->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">
              REGISTRAR CONDUCTOR
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
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
                      class="form-control"
                      v-model="nombre"
                      id="exampleTextarea1"
                      placeholder="Nombres"
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
                      class="form-control"
                      v-model="apellidoPaterno"
                      id="exampleTextarea1"
                      placeholder="Apellido Paterno"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      class="form-control"
                      v-model="apellidoMaterno"
                      id="exampleTextarea1"
                      placeholder="Apellido Materno"
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
                      class="form-control"
                      v-model="telefono"
                      id="exampleTextarea1"
                      placeholder="Teléfono"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      class="form-control"
                      v-model="email"
                      id="exampleTextarea1"
                      placeholder="Email"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <textarea
                      class="form-control"
                      v-model="direccion"
                      id="exampleTextarea1"
                      placeholder="Dirección"
                      row="2"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <select class="form-control" v-model="idDocumentType">
                      <option value="" selected disabled>
                        Tipo de Documento
                      </option>
                      <option value="DNI">DNI</option>
                      <option value="Pasaporte de Extranjeria">
                        Pasaporte de Extranjeria
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      class="form-control"
                      v-model="numero"
                      id="exampleTextarea1"
                      placeholder="N° Documento"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      class="form-control"
                      v-model="licenciaConducir"
                      id="exampleTextarea1"
                      placeholder="Licencia de Conducir"
                      row="2"
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
                      class="form-control"
                      v-model="banco"
                      id="exampleTextarea1"
                      placeholder="Banco"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      class="form-control"
                      v-model="cuentaBancaria"
                      id="exampleTextarea1"
                      placeholder="Cuenta Bancaria"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"
                    >Constancia de Salud</label
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
                        :src="imagen"
                        alt="Foto del Conductor"
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
              v-if="update == 0"
              @click="saveVehicles()"
              class="btn btn-gradient-primary mr-2"
            >
              Registrar
            </button>
            <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
            <button
              v-if="update != 0"
              @click="updateVehicles()"
              class="btn btn-warning btn-fw"
            >
              Actualizar
            </button>
            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
            <button
              v-if="update != 0"
              @click="clearFields()"
              class="btn btn-danger btn-fw"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN -->

    <!-- Modal Vehículo -->
    <div
      class="modal fade"
      id="exampleModal1"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel1"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">
              REGISTRAR VEHICULO
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Placa</label>
                  <div class="col-sm-9">
                    <textarea
                      class="form-control"
                      v-model="marca"
                      id="exampleTextarea1"
                      rows="2"
                      placeholder="Placa"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"
                    >Capacidad de Carga</label
                  >
                  <div class="col-sm-9">
                    <textarea
                      class="form-control"
                      v-model="marca"
                      id="exampleTextarea1"
                      rows="2"
                      placeholder="Capacidad de Carga"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="exampleInputName1"
                    >Tipo de Vehículo</label
                  >
                  <div class="col-sm-9">
                    <select
                      class="form-control"
                      v-model="tipo"
                      @click="get(tipo)"
                    >
                      <option value=""></option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Subir Imagen</label>
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
                  <label class="col-sm-3 col-form-label">Imagen</label>
                  <div class="col-sm-9">
                    <figure>
                      <img
                        with="200"
                        height="200"
                        :src="imagen"
                        alt="Foto del Vehículo"
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
              v-if="update == 0"
              @click="saveVehicles()"
              class="btn btn-gradient-primary mr-2"
            >
              Registrar
            </button>
            <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
            <button
              v-if="update != 0"
              @click="updateVehicles()"
              class="btn btn-warning btn-fw"
            >
              Actualizar
            </button>
            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
            <button
              v-if="update != 0"
              @click="clearFields()"
              class="btn btn-danger btn-fw"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-lg-8">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Buscar vehiculo"
              @keyup="searchVehicles()"
              aria-describedby="basic-addon2"
              v-model="key_busqueda"
            />
            <div class="input-group-append">
              <button
                class="btn btn-outline-primary"
                type="button"
                @click="searchVehicles()"
              >
                Buscar
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            Registrar Conductor
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5" v-for="item in vehicles">
        <div class="card">
          <div class="card-body">
            <img
              class="card-img-top"
              :src="item.imagen"
              style="height: 200px"
            />
            <div class="card-title text-truncate">
              {{ item.descripcion }}
            </div>

            <p class="card-text crop-text-2">
              Placa: {{ item.placa }} <br />
              Capacidad_Carga: {{ item.capacidadCarga }} <br />
              Tipo: {{ item.idVehicleType }} <br />
              Conductor : {{ item.idDriver }}
            </p>
            <p class="card-text">
              <small class="text-muted"
                >Ultima actualizacion {{ item.updated_at }}</small
              >
            </p>

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-append">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-toggle="modal"
                          data-target="#exampleModal1"
                          @click="addVehicle(item.id)"
                          title="Agregar vehículo"
                        >
                          <i class="mdi mdi-truck-delivery"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-append">
                        <button
                          class="btn btn-warning"
                          data-toggle="modal"
                          data-target="#exampleModal"
                          type="button"
                          @click="updateVehicles(item.id)"
                          title="Actualizar"
                        >
                          <i class="mdi mdi-lead-pencil"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-append">
                        <button
                          class="btn btn-danger"
                          data-toggle="modal"
                          data-target="#exampleModal"
                          type="button"
                          @click="updateVehicles(item.id)"
                          title="Eliminar"
                        >
                          <i class="mdi mdi-delete"></i>
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
                @click="getVehicles(vehicles.current_page - 1)"
              >
                Anterior
              </button>
            </li>
            <li class="paginate_button page-item active">
              <a
                aria-controls="order-listing"
                data-dt-idx="1"
                tabindex="0"
                class="page-link"
                >{{ vehicles.current_page }}</a
              >
            </li>
            <li id="order-listing_next">
              <button
                aria-controls="order-listing"
                data-dt-idx="2"
                tabindex="0"
                class="page-link"
                @click="getVehicles(vehicles.current_page + 1)"
              >
                Siguiente
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vehicles: [],
      imagen: "",
      key_busqueda: "",
      update: 0,
    };
  },
  created() {
    axios.get("api/vehicles").then((res) => {
      this.vehicles = res.data;
    });
    axios.get("api/drivers").then((res) => {
      this.vehicles = res.data;
    });
  },

  methods: {
    getVehicles(num_page) {
      axios
        .get("api/vehicles", {
          params: {
            page: num_page,
          },
        })
        .then((res) => {
          this.vehicles = res.data;
          console.log(this.vehicles);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    saveVehicles() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("placa", this.placa);
      formData.append("capacidadCarga", this.capacidadCarga);
      formData.append("idVehicleType", this.idVehicleType);
      formData.append("idDriver", this.idDriver);
      formData.append("imagen", this.imagen);
      let url = "api/vehicles"; //Ruta que hemos creado para enviar un vehiculo y guardarlo
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se registró correctamente el vehículo.");
          me.getVehicles(); //llamamos al metodo getVehicles(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
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

    loadFieldsUpdate(id) {
      //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
      let me = this;
      this.update = id;
      let url = "?id=" + this.update;
      axios
        .get(url)
        .then(function (response) {
          me.descripcion_detalle = response.data.descripcion_detalle;
          me.stock = response.data.stock;
          me.estado = response.data.estado;
          me.tipo = response.data.tipo;
          me.ubicaciones_id = response.data.ubicaciones_id;
          me.nota = response.data.nota;
          me.nota1 = response.data.nota1;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    updateVehicles() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("id", this.update);
      formData.append("placa", this.placa);
      formData.append("capacidadCarga", this.capacidadCarga);
      formData.append("idVehicleType", this.idVehicleType);
      formData.append("idDriver", this.idDriver);
      formData.append("imagen", this.imagen);
      formData.append("_method", "put");
      let url = "api/vehicles"; //Ruta que hemos creado para enviar una tarea y guardarla
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se modificó correctamente el vehículo.");
          me.getVehicles(); //llamamos al metodo getProductos(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    deleteVehicles(id, matricula) {
      //Esta nos abrirá un alert de javascript y si aceptamos borrará el vehículo que hemos elegido
      let me = this;
      if (confirm("¿Seguro que deseas eliminar este vehículo? " + matricula)) {
        axios.get("api/vehicles", {
          params: {
            id: id,
          },
        });

        axios
          .get("apiproductosalmacen")
          .then(function (response) {
            alert("Se eliminó correctamente el vehículo.");
            me.getVehicles(); //llamamos al metodo getVehicles(); para que refresque nuestro array y muestro los nuevos datos
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },

    clearFields() {
      /*Limpia los campos e inicializa la variable update a 0*/
      this.placa = "";
      this.capacidadCarga = "";
      this.idVehicleType = "";
      this.idDriver = "";
      this.update = 0;
    },
  },

  mounted() {
    this.getVehicles();
  },
};
</script>