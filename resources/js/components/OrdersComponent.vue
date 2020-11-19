<template>
    <div>
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
                    Fecha de Recogo<i class="mdi mdi-chevron-down"></i>
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
                <tr>
                  <td></td>
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
  data() {
    return {
      states: [],
      services:[],
    };
  },
  created() {
    axios.get("api/services/states").then((res) => {
      this.states = res.data;
    });
    axios.get("api/services").then((res) => {
      this.states = res.data;
    });
  },
};
</script>