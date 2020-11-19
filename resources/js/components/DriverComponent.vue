<template>
  <div>
        <!-- MODAL REGISTRAR CONDUCTOR-->
    <div
      class="modal fade"
      id="exampleModalRegistrarConductor"
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
              REGISTRAR CONDUCTOR
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
                      title="Ingresar nombres completos del conductor."
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
                      title="Ingresar solo apellido paterno del conductor."
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
                      title="Ingresar solo apellido materno del conductor."
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
                      type="number"
                      class="form-control"
                      v-model="telefono"
                      maxlength="9"
                      placeholder="Teléfono"
                      title="Ingresar número de celular del conductor."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="email"
                      class="form-control"
                      v-model="email"
                      placeholder="Email"
                      title="Ingresar correo personal del conductor."
                      data-toggle="tooltip" data-placement="right"
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
                      placeholder="Dirección"
                      row="2"
                      title="Ingresar dirección del conductor."
                      data-toggle="tooltip" data-placement="right"
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
                      <option
                        v-for="item in documenttypes"
                        :value="item.id"
                        :key="item.id"
                      >
                        {{ item.tipo }}
                      </option>
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
                      title="Ingresar número de identidad del conductor."
                      data-toggle="tooltip" data-placement="right"
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
                      type="text"
                      class="form-control"
                      v-model="licenciaConducir"
                      placeholder="Licencia de Conducir"
                      title="Ingresar licencia de conducir actual del conductor."
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
                      v-model="banco"
                      placeholder="Banco"
                      maxlength="20"
                      title="Ingresar entidad bancaria afiliada a la cuenta bancaria del conductor."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="number"
                      class="form-control"
                      v-model="cuentaBancaria"
                      placeholder="Cuenta Bancaria"
                      maxlength="50"
                      title="Ingresar número de cuenta o CCI del conductor."
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
                      v-model="name"
                      placeholder="Usuario"
                      title="Ingresar el nombre de usuario del conductor."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="password"
                      class="form-control"
                      v-model="password"
                      placeholder="Contraseña"
                      title="Ingresar la contraseña del conductor."
                      data-toggle="tooltip" data-placement="right"
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
                      @change="subirArchivo"
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
                        :src="img"
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
              @click="saveDrivers()"
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
    <!-- MODAL ACTUALIZAR CONDUCTOR-->
    <div
      class="modal fade"
      id="exampleModalActualizarConductor"
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
              ACTUALIZAR CONDUCTOR
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
                      type="number"
                      class="form-control"
                      v-model="telefono"
                      placeholder="Teléfono"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="email"
                      class="form-control"
                      v-model="email"
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
                      <option
                        v-for="item in documenttypes"
                        :value="item.id"
                        :key="item.id"
                      >
                        {{ item.tipo }}
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="number"
                      class="form-control"
                      v-model="numero"
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
                      type="text"
                      class="form-control"
                      v-model="licenciaConducir"
                      placeholder="Licencia de Conducir"
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
                      v-model="banco"
                      placeholder="Banco"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="number"
                      class="form-control"
                      v-model="cuentaBancaria"
                      placeholder="Cuenta Bancaria"
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
                      v-model="name"
                      placeholder="Usuario"
                    />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input
                      type="password"
                      class="form-control"
                      v-model="password"
                      placeholder="Contraseña"
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
                      @change="subirArchivo"
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
                        :src="img"
                        alt="Foto del Conductor"
                      />
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <!-- Botón que modifica al conductor que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
            <button
              @click="updateDrivers()"
              class="btn btn-warning btn-fw" data-dismiss="modal"

            >
              Actualizar
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

    <!-- MODAL REGISTRAR VEHÍCULO -->
    <div
      class="modal fade"
      id="exampleModalRegistrarVehiculo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
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
                    <input
                      type="text"
                      class="form-control"
                      v-model="placa"
                      placeholder="Placa"
                      title="Ingresar la placa actual del vehículo."
                      data-toggle="tooltip" data-placement="right"
                    />
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
                    <input
                      type="text"
                      class="form-control"
                      v-model="capacidadCarga"
                      placeholder="Capacidad de Carga"
                      title="Ingresar la capacidad máxima del vehículo."
                      data-toggle="tooltip" data-placement="right"
                    >
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
                    <select class="form-control" v-model="idVehicleType">
                      <option v-for="item in vehicletypes" :value="item.id" :key="item.id">
                        {{ item.nombre }}
                      </option>
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
                        :src="img"
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
              @click="saveVehicles()"
              class="btn btn-gradient-primary mr-2"
            >
              Registrar
            </button>
            <!-- Botón que cierra el modal-->
            <button 
             @click="clearFields()"
              class="btn btn-danger"  data-dismiss="modal">
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
              placeholder="Buscar conductor"
              @keyup="searchDriver()"
              aria-describedby="basic-addon2"
              v-model="key_busqueda"
            />
            <div class="input-group-append">
              <button
                class="btn btn-outline-primary"
                type="button"
                @click="searchDriver()"
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
            data-target="#exampleModalRegistrarConductor"
          >
            Registrar Conductor
          </button>
        </div>        
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row align-items-top">
              <i class="mdi mdi-account-check text-success icon-md"></i>
              <div class="ml-3">
                <h6 class="text-success">Conductores Activos</h6>
                <h3 class="mt-2 text-muted card-text">{{ active }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row align-items-top">
              <i class="mdi mdi-account-off text-danger icon-md"></i>
              <div class="ml-3">
                <h6 class="text-danger">Conductores Inactivos</h6>
                <h3 class="mt-2 text-muted card-text">{{ inactive }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4" v-for="item in drivers" :key="item.id">
        <div class="card">
          <div class="card-body">
            <center>
              <img
                class="card-img-top"
                :src="item.person.imagen"
                style="width: 180px; height: 170px"
              />
            </center>
            <br />
            <p class="card-text crop-text-2">
              Nombres: {{ item.person.nombre }}
              {{ item.person.apellidoPaterno }}
              {{ item.person.apellidoMaterno }} <br />
              Número de Identidad:{{ item.person.numero }} <br />
              Licencia de Conducir: {{ item.driver.licenciaConducir }} <br />
              Usuario: {{ item.name }}<br />
              Estado: {{ item.status.nombre }}
            </p>
            <p class="card-text">
              <small class="text-muted"
                >Ultima actualizacion {{ item.updated_at }}</small
              >
            </p>

            <div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-append">
                        <a :href="'/conductoresbuscar?id=' + item.id">
                          <button
                            class="btn btn-info btn-sm"
                            type="button"
                            title="Ver detalle"
                          >
                            <i class="mdi mdi-eye"></i>
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-append">
                        <button
                          class="btn btn-primary btn-sm"
                          type="button"
                          data-toggle="modal"
                          data-target="#exampleModalRegistrarVehiculo"
                          @click="addVehicles(item.id)"
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
                          class="btn btn-warning btn-sm"
                          data-toggle="modal"
                          data-target="#exampleModalActualizarConductor"
                          type="button"
                          @click="loadFieldsUpdate(item.id)"
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
                          class="btn btn-danger btn-sm"
                          type="button"
                          @click="deleteDrivers(item.id)"
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
    <br />
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
                @click="getDrivers(current_page- 1)"
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
                >{{ current_page }}</a
              >
            </li>
            <li id="order-listing_next">
              <button
                aria-controls="order-listing"
                data-dt-idx="2"
                tabindex="0"
                class="page-link"
                @click="getDrivers(current_page+ 1)"
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
      drivers: [],
      current_page: "",
      id: "",
      name: "",
      password: "",
      nombre: "",
      apellidoPaterno: "",
      apellidoMaterno: "",
      direccion: "",
      telefono: "",
      email: "",
      placa: "",
      capacidadCarga: "",
      idVehicleType: "",
      idDriver: "",
      numero: "",
      imagen: "",
      cuentaBancaria: "",
      banco: "",
      idDocumentType: "",
      licenciaConducir: "",
      constanciaEstadoSalud: "",
      key_busqueda: "",
      vehicletypes: "",
      documenttypes: "",
      update: 0,
      imagenminiatura: "",
      active: "",
      inactive: "",
      key_busqueda:null,
    };
  },
  created() {
    axios.get("api/drivers").then((res) => {
      this.drivers = res.data.drivers.data;
      this.active = res.data.active;
      this.inactive = res.data.inactive;
      this.current_page = res.data.drivers.current_page;
    });

    axios.get("api/vehicletypes").then((res) => {
      this.vehicletypes = res.data.VehicleTypes;
    });
    axios.get("api/documenttypes").then((res) => {
      this.documenttypes = res.data.DocumentTypes;
    });
  },

  methods: {
    getDrivers(num_page) {
      axios
        .get("api/drivers", {
          params: {
            page: num_page,
          },
        })
        .then((res) => {
          this.drivers = res.data.drivers.data;
          console.log(this.drivers);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    saveDrivers() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("nombre", this.nombre);
      formData.append("apellidoPaterno", this.apellidoPaterno);
      formData.append("apellidoMaterno", this.apellidoMaterno);
      formData.append("telefono", this.telefono);
      formData.append("email", this.email);
      formData.append("direccion", this.direccion);
      formData.append("idDocumentType", this.idDocumentType);
      formData.append("licenciaConducir", this.licenciaConducir);
      formData.append("numero", this.numero);
      formData.append("banco", this.banco);
      formData.append("cuentaBancaria", this.cuentaBancaria);
      formData.append("constanciaEstadoSalud", this.constanciaEstadoSalud);
      formData.append("name", this.name);
      formData.append("password", this.password);
      formData.append("imagen", this.imagen);
      let url = "api/drivers"; //Ruta que hemos creado para enviar un vehiculo y guardarlo
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se registró correctamente el conductor.");
          me.getDrivers(); //llamamos al metodo getVehicles(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    addVehicles(id) {
      this.idDriver = id;
      console.log(this.idDriver);
    },

    saveVehicles() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("placa", this.placa);
      formData.append("capacidadCarga", this.capacidadCarga);
      formData.append("idVehicleType", this.idVehicleType);
      formData.append("imagen", this.imagen);
      let url = "api/drivers/" + this.idDriver + "/vehicles"; //Ruta que hemos creado para enviar un vehiculo y guardarlo
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se registró correctamente el vehículo.");
          me.getDrivers(); //llamamos al metodo getVehicles(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    subirArchivo(e) {
      let file = e.target.files[0];
      this.constanciaEstadoSalud = file;
      console.log(this.constanciaEstadoSalud);
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
      let url = "api/drivers/" + this.update;
      axios
        .get(url)
        .then(function (response) {
          me.nombre = response.data.person.nombre;
          me.apellidoPaterno = response.data.person.apellidoPaterno;
          me.apellidoMaterno = response.data.person.apellidoMaterno;
          me.telefono = response.data.person.telefono;
          me.direccion = response.data.person.direccion;
          me.idDocumentType = response.data.person.idDocumentType;
          me.numero = response.data.person.numero;
          me.banco = response.data.driver.banco;
          me.cuentaBancaria = response.data.driver.cuentaBancaria;
          me.licenciaConducir = response.data.driver.licenciaConducir;
          me.email = response.data.email;
          me.name = response.data.name;
          me.password=response.data.password;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    updateDrivers() {
      const config = { headers: { "content-type": "multipart/form-data" } };
      let me = this;
      let formData = new FormData();
      formData.append("id", this.update);
      formData.append("nombre", this.nombre);
      formData.append("apellidoPaterno", this.apellidoPaterno);
      formData.append("apellidoMaterno", this.apellidoMaterno);
      formData.append("telefono", this.telefono);
      formData.append("email", this.email);
      formData.append("direccion", this.direccion);
      formData.append("idDocumentType", this.idDocumentType);
      formData.append("licenciaConducir", this.licenciaConducir);
      formData.append("numero", this.numero);
      formData.append("banco", this.banco);
      formData.append("cuentaBancaria", this.cuentaBancaria);
      formData.append("constanciaEstadoSalud", this.constanciaEstadoSalud);
      formData.append("name", this.name);
      formData.append("password", this.password);
      formData.append("_method", "put");
      let url = "api/drivers/" + this.update; //Ruta que hemos creado para enviar una tarea y guardarla
      axios
        .post(url, formData, config)
        .then(function (response) {
          alert("Se modificó correctamente los datos del conductor.");
          me.getDrivers(); //llamamos al metodo getPDrivers(); para que refresque nuestro array y muestro los nuevos datos
          me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    deleteDrivers(id, numero) {
      //Esta nos abrirá un alert de javascript y si aceptamos borrará el vehículo que hemos elegido
      let me = this;
      if (
        confirm(
          "¿Seguro que deseas eliminar al conductor con dni " + numero + "?"
        )
      ) {
        axios
          .delete("api/drivers/" + id)
          .then(function (response) {
            alert("Se eliminó correctamente al conductor.");
            me.getDrivers(); //llamamos al metodo getDrivers(); para que refresque nuestro array y muestro los nuevos datos
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
      searchDriver(key_busqueda) {
      axios
        .get("api/drivers/search?query=" + key_busqueda)
        .then((res) => {
          this.drivers = res.data.drivers.data;
        });
    },

    clearFields() {
      /*Limpia los campos e inicializa la variable update a 0*/
      this.nombre = "";
      this.apellidoPaterno = "";
      this.apellidoMaterno = "";
      this.telefono = "";
      this.email = "";
      this.direccion = "";
      this.idDocumentType = "";
      this.licenciaConducir = "";
      this.numero = "";
      this.banco = "";
      this.cuentaBancaria = "";
      this.constanciaEstadoSalud = "";
      this.name = "";
      this.password = "";
      this.imagen = "";
      this.placa = "";
      this.capacidadCarga = "";
      this.idDriver = "";
      this.idVehicleType = "";
      this.update = 0;
    },
  },

  computed: {
    img() {
      return this.imagenminiatura;
    },
  },

  mounted() {
    this.getDrivers();
  },
};
</script>