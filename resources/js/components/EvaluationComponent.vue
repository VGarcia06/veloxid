<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <!-- Evaluacion Conductor -->
              <div class="col-lg-6 col-md-4 border-right">
                <div class="page-header">
                  <h4>Evaluación de Conductor</h4>
                </div>
                <div class="input-group chat-search-input">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar Conductor"
                    @keyup="searchDriver(key_busqueda)"
                    v-model="key_busqueda"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                </div>
                <br />
                <select
                  class="form-control"
                  v-model="iddriver"
                  @click="getVehicles(iddriver)"
                >
                  <option
                    v-for="item in driverlist"
                    :value="item.id"
                    :key="item.id"
                  >
                    {{ item.person.nombre }} {{ item.person.apellidoPaterno }}
                    {{ item.person.apellidoMaterno }}
                  </option>
                </select>

                <div class="form-group" style="margin-top: 30px">
                  <label>Requerimientos:</label>
                  <div class="list-wrapper">
                    <ul
                      class="d-flex flex-column-reverse todo-list"
                      v-for="item in evaluaciondriver"
                      :key="item.id"
                    >
                      <li style="padding: 0">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input
                              class="checkbox"
                              type="checkbox"
                              v-model="requerimentdriver"
                              :value="{ idRequirement: item.id, valor: 0 }" />{{
                              item.requerimiento
                            }}
                            <i class="input-helper"></i
                          ></label>
                        </div>
                        <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Observaciones:</label>
                  <textarea
                    v-model="observaciondriver"
                    class="form-control"
                    rows="4"
                  ></textarea>
                </div>
                <div class="float-right">
                  <button
                    type="submit"
                    class="btn btn-gradient-primary"
                    @click="saveRequerimentsDrivers()"
                  >
                    Guardar
                  </button>
                </div>
              </div>

              <!-- Evaluacion Vehiculo -->
              <div class="col-lg-6 col-md-4">
                <div class="page-header">
                  <h4>Evaluación de Vehículo</h4>
                </div>
                <select class="form-control" v-model="idvehicle">
                  <option
                    v-for="item in vehicles"
                    :value="item.id"
                    :key="item.id"
                  >
                    {{ item.placa }}
                  </option>
                </select>
                <div class="form-group" style="margin-top: 30px">
                  <label>Requerimientos:</label>
                  <div class="list-wrapper">
                    <ul
                      class="d-flex flex-column-reverse todo-list"
                      v-for="item in evaluacionvehicle"
                      :key="item.id"
                    >
                      <li style="padding: 0">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input
                              class="checkbox"
                              type="checkbox"
                              v-model="requerimentvehicle"
                              :value="{ idRequirement: item.id, valor: 0 }" />{{
                              item.requerimiento
                            }}
                            <i class="input-helper"></i
                          ></label>
                        </div>
                        <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Observaciones:</label>
                  <textarea
                    v-model="observacionvehicle"
                    class="form-control"
                    rows="4"
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="float-right">
              <button
                type="submit"
                class="btn btn-gradient-primary"
                @click="saveRequerimentsVehicles()"
              >
                Guardar
              </button>
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
      drivers: [],
      driverlist: [],
      vehicles: [],
      evaluaciondriver: [],
      evaluacionvehicle: [],
      requerimentdriver: [],
      requerimentvehicle: [],
      observaciondriver: "",
      observacionvehicle: "",
      iddriver: 0,
      idvehicle: 0,
      key_busqueda: null,
    };
  },
  created() {
    axios.get("api/requirements/drivers").then((res) => {
      this.evaluaciondriver = res.data.Requirements;
    });
    axios.get("api/requirements/vehicles").then((res) => {
      this.evaluacionvehicle = res.data.Requirements;
    });
    axios.get("api/drivers").then((res) => {
      this.drivers = res.data.drivers.data;
    });
  },
  methods: {
    saveRequerimentsDrivers() {
      let me = this;
      let url = "api/drivers/" + this.iddriver + "/evaluations"; //Ruta que hemos creado para enviar los requerimentos y guardarlos
      axios
        .post(url, {
          //estas variables son las que enviaremos
          evals: this.requerimentdriver,
          observacion: this.observaciondriver,
        })
        .then(function (response) {
          alert("Se registró correctamente la evaluación.");
          me.clearFieldsD(); 
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    saveRequerimentsVehicles() {
      let me = this;
      let url = "api/vehicles/" + this.idvehicle + "/evaluations"; //Ruta que hemos creado para enviar los requerimentos y guardarlos
      axios
        .post(url, {
          //estas variables son las que enviaremos
          evals: this.requerimentvehicle,
          observacion: this.observacionvehicle,
        })
        .then(function (response) {
          alert("Se registró correctamente la evaluación.");
          me.clearFieldsV(); 
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    searchDriver(key_busqueda) {
      axios.get("api/drivers/search?query=" + key_busqueda).then((res) => {
        this.driverlist = res.data.data;
      });
    },

    getVehicles(iddriver) {
      axios.get("api/drivers/" + iddriver + "/vehicles").then((res) => {
        this.vehicles = res.data.vehicles.data;
        console.log(this.vehicles);
      });
    },

    clearFieldsD() {
      /*Limpia los campos*/
      this.requerimentdriver = "";
    },

    clearFieldsV() {
      /*Limpia los campos*/
      this.requerimentvehicle = "";
    },
  },
};
</script>