<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Historial de Revisiones</h4>

        <div class="form-group row" style="margin-top: 30px">
          <div class="col-lg-4">
            <label>Desde:</label>
            <input type="date" class="form-control" v-model="from"/>
          </div>
          <div class="col-lg-4">
            <label>Hasta:</label>
            <input type="date" class="form-control" v-model="to"/>
          </div>
          <div class="col-lg-4" style="margin-top: 23px">
            <button type="submit" class="btn btn-gradient-primary" @click="filtrar()">
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
         <!--     <th class="sortStyle unsortStyle">
                    Estado<i class="mdi mdi-chevron-down"></i>
                  </th>-->
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
                  <td>
                  <a :href="'/revisionesdetalle?revision='+item.id">
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
  import moment from 'moment'

    export default {
      data() {
        return {
          revisionhistory: [],
          from: "",
          to: "",
          current_page: 1,
        };
      },
      created() {
        //Es post la ruta, para listar todo deben estar vacíos los campos (to =="" AND from =="")
        axios.post("api/revisions", {
          from : "",
          to: ""
        })
        .then((res) => {
          this.revisionhistory = res.data.data;
        });
      },
      methods: {
        // Paginación
        getPedidos(num_page) {
          axios.post("api/revisions"+"?page="+num_page, {
              from : "",
              to: "",        
            })
            .then((res) => {
              this.revisionhistory = res.data.data;
              this.current_page = res.data.current_page;
              console.log(this.services);
            })
            .catch(function (error) {
              // handle error
              console.log(error);
            });
        },

        filtrar() {
          axios.post("api/revisions", {
            from: this.from,
            to: this.to
          })
          .then((res) => {
            console.log(res.data.data);
            this.revisionhistory=res.data.data;
             
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      },
      filters: {
        timeformat: function (arg) {
          // return moment(arg).subtract(10, 'days').calendar()
          moment.locale('es');
          return moment(arg).format('LLL');
        }
      }
    };
</script>