<template>
  <div>
    <!-- <div class="page-header">
      <h2> Evaluación de Transportista y Vehículo </h2>
    </div> -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card px-3">
          <div class="card-body" style="padding-bottom: 0;">
            <div class="page-header">
                <h4> Evaluación de Transportista </h4>
            </div> 

            <div class="col-lg-4 col-md-4 px-0">
                <div class="input-group chat-search-input">
                  <input type="text" class="form-control" placeholder="Buscar Transportista" aria-label="Username">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                </div>
            </div>
            
            <!-- <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
            </div> -->

            <div class="row" style="margin-top: 30px;">
              <div class="col-lg-7 col-md-4">
                <div class="form-group">
                  <label>Requerimientos:</label>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list">
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Meeting with Alisa <i class="input-helper"></i></label>
                        </div>
                        <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-5 col-md-4">
                <div class="form-group">
                  <label for="exampleTextarea1">Observaciones:</label>
                  <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                </div>
              </div>
            </div>

          </div>

          <div class="card-body">
            <div class="page-header">
                <h4> Evaluación de Vehículo </h4>
            </div>    

            <!-- <div class="dropdown">
              <button class="btn btn-gradient-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vehículo</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 42px, 0px);">
                <h6 class="dropdown-header">Settings</h6>
                <a class="dropdown-item" href="#">Action</a>
              </div>
            </div> -->
            <div class="col-lg-4 col-md-4 px-0">
              <select class="form-control">
                <option selected>Seleccione Vehículo</option>
                <option>Category1</option>
              </select>
            </div>

            <div class="row" style="margin-top: 30px;">
              <div class="col-lg-7 col-md-4">
                <div class="form-group">
                  <label>Requerimientos:</label>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list" v-for="item in drivers" :key="item.id">
                      <li>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">{{}} <i class="input-helper"></i></label>
                        </div>
                        <!-- <i class="remove mdi mdi-close-circle-outline"></i> -->
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-5 col-md-4">
                <div class="form-group">
                  <label for="exampleTextarea1">Observaciones:</label>
                  <textarea class="form-control" id="exampleTextarea2" rows="4"></textarea>
                </div>
              </div>
            </div>
            
            <!-- <div class="form-group row justify-content-center"> -->
              <button type="submit" class="btn btn-gradient-primary">Guardar</button>
            <!-- </div> -->
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
      evaluacion:[],
      }
    },
  created() {
    axios.get("api/drivers/evaluated").then((res) => {
      this.evaluacion = res.data;
    });
  },
  methods:{

  },

}

</script>