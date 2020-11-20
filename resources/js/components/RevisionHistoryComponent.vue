<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Historial de Revisiones</h4>

        <div class="form-group row" style="margin-top: 30px">
          <div class="col-lg-4">
            <label>Desde:</label>
            <input type="date" class="form-control" v-model="fechaInicio"/>
          </div>
          <div class="col-lg-4">
            <label>Hasta:</label>
            <input type="date" class="form-control" v-model="fechaFin"/>
          </div>
          <div class="col-lg-4" style="margin-top: 23px">
            <button type="submit" class="btn btn-gradient-primary">
              Filtrar
            </button>
          </div>
        </div>

        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-2" class="table table-striped">
              <thead>
                <tr style="background-color: #309D4F; color: #fff">
                  <th>#</th>
                  <th class="sortStyle ascStyle">
                    Nombres<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Apellidos<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Fecha de Evaluación<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Estado<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Detalle<i class="mdi mdi-chevron-down"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="item in revisionhistory"
                  :key="item.id"
                >
                  <td>{{ item.id }}</td>
                  <td>{{ item.driver.user.person.nombre }}</td>
                  <td>{{ item.driver.user.person.apellidoPaterno }} {{ item.driver.user.person.apellidoMaterno }}</td>
                  <td>{{ item.created_at | timeformat }} </td>
                  <td>{{ item.status.estado }}</td>
                  <td>
                  <a :href="'/revisionesdetalle?driver='+item.driver.idUser+'&revision='+item.id">
                      <button
                        class="btn btn-outline-light text-black btn-sm"
                        type="button"
                        title="Ver detalle"
                      >
                        <i class="mdi mdi-eye"></i>
                      </button> 
                    </a>                 
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
  import moment from 'moment'

    export default {
      data() {
        return {
          revisionhistory: [],
          fecha: "",
          fechaInicio: "",
          fechaFin: ""
        };
      },
      created() {
        axios.get("api/drivers/evaluations").then((res) => {
          this.revisionhistory = res.data.data;
        });
      },
      filters: {
        timeformat: function (arg) {
          return moment(arg).subtract(10, 'days').calendar()
        }
      }
    };
</script>