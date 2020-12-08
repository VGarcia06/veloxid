<template>
<div>
     <div class="content-wrapper" style="padding-bottom: 0px;">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Confirmación de Pedido </h2>
            <p class="card-description"> </p>

    {{service}} {{user}}
    <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Dirección exacta de origen</label>
                  <div class="col-sm-9">
                         <input rows="4" v-model="service.direccion_origen" type="text">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Direccion exacta de destino</label>
                  <div class="col-sm-9">
                       <input rows="4" v-model="service.direccion_destino" type="text">
                  </div>
                  </div>
            </div>
    </div>
    <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha recojo</label>
                  <div class="col-sm-9">
                         <input v-model="service.fecha_recojo" type="date">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha entrega</label>
                  <div class="col-sm-9">
                       <input v-model="service.fecha_entrega" type="date">
                  </div>
                  </div>
            </div>
    </div>
        <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Términos y Condiciones</label>
                  <div class="col-sm-9">
                         <input v-model="confirmacion" type="checkbox">
                  </div>
                </div>
        </div>
    </div>

    <button @click="makeRequest()">Aceptar</button>
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