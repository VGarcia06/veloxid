<template>
<div>

   <!-- MODAL TÉRMINOS Y CONDICIONES-->
  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Términos y Condiciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: justify;">
          <p>
            El portal digital Veloxid es una plataforma web de traslado logísticos de productos a solicitud de cliente, el cual obedece a las normas inscritas en los “Términos y condiciones”, así como en las leyes que se indiquen dentro de la República de Perú. Estas normas aplican a todos los usuarios de este portal, como visitante, proveedor o cliente y así como sus efectos jurídicos estarán regidos por estas reglas. 
            El portal web www.Veloxid.com tendrá disponible sus servicios solo para aquellas personas que están legalmente en capacidad de usarlas. No podrán disponer de dichos servicios los menores de edad o usuarios que hayan sido bloqueados por la página debido al mal uso de esta. Los menores de edad que se involucren en compras de nuestra página será responsabilidad de los padres, tutores o encargados de ellos. 
            Como primer requisito para formar parte de los clientes o proveedores de Veloxid, es indispensable que previamente se hayan aceptado los términos y condiciones de la página. La adquisición de servicios efectuadas por este canal web está sujeta a previa confirmación de los términos y condiciones, por otro lado, es posible que los servicios de la página web como por ejemplo el acceso al usuario, proceso de compras, carga de la página, etc. Verse restringido por la realización de trabajos de mantenimiento. Veloxid se compromete a mantener su funcionamiento las 24 horas al día y siempre tratar de asegurar la ausencia de errores en cualquier punto del proceso de compra del cliente. Veloxid, está en todo el derecho de modificar el presente documento de términos sin previo aviso, por lo que el cliente debe revisar constantemente este portal antes de realizar su compra.
          </p>
          <p>
            <b>Registro de cliente o usuario</b>
          </p>
          <p>
            Para registrarse, tiene la obligación de dar los datos solicitados en la página de inicio como forma de validación de identidad del mismo, para ello se compromete a proporcionar sus datos de identificación fidedignos y necesarios (como nombre completo, número de documento oficial de identidad, dirección domiciliaria, correo electrónico y teléfonos) los cuales podrán ser validados posteriormente.
          </p>
            
          <p>
            Es importante mencionar que solo se aceptará una 1 cuenta por persona, en caso se disponga de otras adicionales, Veloxid se encargará de disolver dichas cuentas a 1 sola bajo previa información. Si se verifica o sospecha algún uso fraudulento y/o malintencionado y/o contrario a estos Términos y Condiciones y/o contrarios a la buena fe, Veloxid tendrá el derecho inapelable de dar por terminados los beneficios, no hacer efectiva las promociones, cancelar las transacciones en curso, dar de baja las cuentas y hasta de perseguir judicialmente a los infractores.
          </p>
          
          <p>
            Los usuarios que se registren por primera vez, no tendrán que registrarse cada vez que efectúen una adquisición de servicio adicional a futuro, para ello solo contará con un email y contraseña como medio de ingreso a su cuenta dentro del portal de Veloxid. El usuario se compromete a proteger de manera confidencial la contraseña de su usuario, evitando la difusión de esta a terceros, haciendo responsable de cual cambio de información personal y de los servicios que pueda tomar dentro de la página, por lo que Veloxid no se responsabilizará por las actividades efectuadas de las cuentas.
          </p>
          
          <p>
            <b>Medios de Pago</b>
          </p>
          <p>
            Los medios de pago que se utilizarán para comprar en esta tienda virtual son: Tarjetas de Crédito, Débito por MercadoPago, las cuales deben encontrarse activas. Además, también podrá seleccionar transferencia bancaria, depósito y pago contra entrega. El uso de las tarjetas usadas en esta web, estará sujeto a lo establecido en los términos y condiciones y en relación con su emisor (Contratos de apertura y reglamento de uso).
            En caso se solicite una anulación, devolución o extorno de alguna adquisición de servicio, por el uso de alguna de estas tarjetas aceptadas por este sitio, estarán regidas por el contrato de apertura y reglamento de uso, de esta manera Veloxid no se responsabilizará por cualquier uso indebido de esta, así mismo, el sitio puede elegir algunas condiciones de compra según el medio de pago que se utilice por el usuario. Por otro lado, en caso Veloxid considere como no válida una transacción por evidencie de algún tipo de fraude o error sistémico que distorsione el precio de las ofertas que justifique la anulación, se procederá a anular el pedido, se cancelará la entrega del pedido y generará el extorno del dinero al cliente, siempre que no se haya entregado el producto
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN -->


  <div class="content-wrapper" style="padding-bottom: 0px;">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Confirmación de Servicio </h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Dirección de origen</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="service.direccion_origen" placeholder="Escribir Dirección" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Direccion de destino</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="service.direccion_destino" class="form-control"  placeholder="Escribir Dirección" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha de recojo</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" v-model="service.fecha_recojo" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha de entrega</label>
                  <div class="col-sm-9">
                    <input type="date" v-model="service.fecha_entrega" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>

        <div class="row justify-content-center text-center">
          <div class="form-group mb-0">
              <div class="form-check mt-0 mb-4">
                  <label class="form-check-label">
                      <input
                          class="checkbox"
                          type="checkbox"
                          v-model="terminos"
                      />
                  </label>
                      <i class="ml-4" >Acepto los
                          <a href="" data-toggle="modal" data-target="#exampleModalScrollable">
                            <b>Términos y Condiciones</b>
                          </a>
                      </i>                
              </div>
              <button  v-if="terminos == false" class="btn btn-secondary mr-2" disabled>Pagar</button>              
              <button v-else class="btn btn-primary mr-2" @click="makeRequest()">Pagar</button>
          </div>
        </div>

    </div>
    
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
          terminos:false
        }
    },
    created() {
    },
    methods: {
        makeRequest: function(){

          // if(service.direccion_origen==null){
          //    alert ("Es necesario que complete todos los campos.");
          // }
          
          axios.post('api/checkout',{price:this.service.total})
            .then((res) => {

              this.service.user = this.user;
              this.service.transaction_id=res.data.id
                axios.post('api/services', this.service)
                .then((res) => {
                  
                })
                .catch((error) => {
                  
                });
                 window.location.replace(res.data.init_point); 
            })
            .catch((error) => {
                console.log(error);
            });
        }
    },
}
</script>