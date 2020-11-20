<template>

<div>
<!-- MODAL VER DETALLE DE PEDIDO - CONDUCTOR -->
  <div>



<div class="modal fade bd-example-modal-lg" id="exampleModalDetallePedidoConductor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          
          
  <div class="card">
  <div class="card-body">
 <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Detalle de pedido</font></font></h1>

<table class="table table-light">
  <thead class="thead-green">
    <tr>
      <th scope="col">Dirección</th>
      <th scope="col">Categoría</th>
      <th scope="col">Sub categoría</th>
      <th scope="col">Producto</th>
      <th scope="col">Fotografía</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Av pastor sevilla 1352</td>
      <td>Salas</td>      
      <td>Juego de sala</td>
      <td>Juego de sala 3-2-1 Zack Vintage</td>      
      <td><div class="col-sm-9">
                    <figure>
                      <img
                        with="250"
                        height="250"
                        :src="img"
                        alt="Foto del Producto"
                      />
                    </figure>
                  </div>                  
      </td>          
    </tr>    
  </tbody>
</table>
</div>
</div>
    </div>
  </div>
</div> 
  
  </div>

<!-- FIN -->

<!-- MODAL AGREGAR AUXILIAR -->
<div>

<div
      class="modal fade"
      id="exampleModalRegistrarAuxiliar"
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
              REGISTRAR AUXILIAR
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
                      title="Ingresar nombres completos del auxiliar."
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
                      title="Ingresar solo apellido paterno del auxiliar."
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
                      title="Ingresar solo apellido materno del auxiliar."
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
                      <select class="form-control form-control-sm" id="exampleFormControlSelect3">                              
                          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DNI</font></font></option>
                          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PASAPORTE</font></font></option>                
                          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CE</font></font></option>                
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
                      title="Ingresar número de identidad del auxiliar."
                      data-toggle="tooltip" data-placement="right"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
            <button
              
              class="btn btn-gradient-primary mr-2"
            >
              Registrar
            </button>
            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
            <button
              
              class="btn btn-danger btn-fw" data-dismiss="modal"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN -->



</div>
<!-- FIN -->

  <div class="card">
  <div class="card-body">
 <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pedidos</font></font></h1>
<div class="input-group mb-3"><input type="text" placeholder="Buscar por código de pedido" aria-describedby="basic-addon2" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Buscar
            </font></font></button></div></div>
<table class="table table-light">
  <thead class="thead-green">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Origen</th>
      <th scope="col">Destino</th>      
      <th scope="col">Cotización</th>
      <th scope="col">Fecha</th>
      <th scope="col">Confirmación</th>
      <th scope="col">Evidenciar</th>
      <th scope="col">Detalle</th>
      <th scope="col">Auxiliar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Villa el Salvador</td>
      <td>San Borja</td>            
      <td>60</td>      
      <td>12/11/2020</td>      
      <td>    <select class="form-control form-control-sm" id="exampleFormControlSelect3">                              
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aceptar</font></font></option>
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rechazar</font></font></option>                
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En tránsito</font></font></option>                
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Falso flete</font></font></option>                
              </select>
            
        </td>      
      <td>
                            <div class="file-field">
                              <a class="btn-floating purple-gradient mt-0 float-left">
                                <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                <input type="file">
                              </a>    
                            </div>
      </td>
    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalDetallePedidoConductor">Ver detalle</button></td>  
    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalRegistrarAuxiliar">Agregar</button></td>
    </tr>
    
    <tr>
      <th scope="row">2</th>
      <td>Chorrillos</td>
      <td>San Isidro</td>            
      <td>70</td>      
      <td>13/11/2020</td>      
      <td>    <select class="form-control form-control-sm" id="exampleFormControlSelect3">                              
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aceptar</font></font></option>
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rechazar</font></font></option>                
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En tránsito</font></font></option>                
                <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Falso flete</font></font></option>                
              </select>
            
        </td>      
      <td>
        
        <div class="file-field">
                                <a class="btn-floating purple-gradient mt-0 float-left">
                                  <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                  <input type="file">
                                </a>    
        </div>
      </td>
</td>

<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalDetallePedidoConductor">Ver detalle</button></td>  
<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalRegistrarAuxiliar">Agregar</button></td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</template>



<script>
export default { data()
{ return{};}
    
}
</script>