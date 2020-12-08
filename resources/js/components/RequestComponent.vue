<template>
<div>

   <!-- MODAL TÉRMINOS Y CONDICIONES-->

    <!-- FIN -->


     <div class="content-wrapper" style="padding-bottom: 0px;">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Confirmación de Pedido </h4>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Dirección exacta de origen</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="service.direccion_origen" placeholder="Dirección" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Direccion exacta de destino</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="service.direccion_destino" class="form-control"  placeholder="Dirección" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha recojo</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" v-model="service.fecha_recojo" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha entrega</label>
                  <div class="col-sm-9">
                    <input type="date" v-model="service.fecha_entrega" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>

        <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="form-check">
                  <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" checked=""> Aceptar términos y condiciones <i class="input-helper"></i></label><button class="btn btn-gradient-primary mr-2" data-toggle="modal"
            data-target="#exampleModal">Leer</buton>
                  </div>
                </div>
        </div>
    </div>

    <button class="btn btn-gradient-primary mr-2" @click="makeRequest()">Aceptar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
    props:['serviceq', 'user'],
    data() {
        return {
            service:this.serviceq,
            confirmacion:"",
        }
    },
    created() {
    },
    methods: {
        makeRequest: function(){
            this.service.user = this.user;
            axios.post('api/services',this.service)
            .then((res) => {
                console.log(res);
            })
            .catch((error) => {
                console.log(error);
            });
        }
    },
}
</script>