<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Historial de Revisiones</h4>

        <div class="form-group row" style="margin-top: 30px">
            <div class="col-lg-4">
                <label>Desde:</label>
                <input
                type="date"
                class="form-control"
                />
            </div>
            <div class="col-lg-4">
                <label>Hasta:</label>
                <input
                type="date"
                class="form-control"
                />
            </div>
            <div class="col-lg-4" style="margin-top: 23px;">
              <button
                type="submit"
                class="btn btn-gradient-primary"
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
                  <th>#</th>
                  <th class="sortStyle ascStyle">
                    First Name<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Last Name<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Product<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Amount<i class="mdi mdi-chevron-down"></i>
                  </th>
                  <th class="sortStyle unsortStyle">
                    Deadline<i class="mdi mdi-chevron-down"></i>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                >
                  <td></td>
                  <td>Herman Beck</td>
                  <td>John</td>
                  <td>Photoshop</td>
                  <td>$456.00</td>
                  <td>12 May 2017</td>
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
  data(){
    return{
      revisionhistory: []
    };
  },
  created(){
    axios.get("api/drivers/drivers").then((res) => {
      this.evaluaciondriver = res.data.Requirements;
    });    
  }

};
</script>