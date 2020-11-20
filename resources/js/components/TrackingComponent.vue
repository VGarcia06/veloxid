<template>

<div>

<!-- MODAL PARA VER DETALLE-->
<div>
  

<div class="modal fade bd-example-modal-md" id="exampleModalTrackingDetalle" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
          
          
  <div class="card">
  <div class="card-body">
 <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Detalle de pedido</font></font></h1>

<table class="table table-light">
  <thead class="thead-green">
    <tr>
      <th scope="col">Conductor</th>
      <td>Diego Velasquez</td>
    </tr>
    <tr>
      <th scope="col">Documento</th>
      <td>76221565</td>
    </tr>
    <tr>
      <th scope="col">Auxiliar</th>
      <td>David Osorio</td>
    </tr>
    <tr>
      <th scope="col">Documento</th>
      <td>70261445</td>
    </tr>
    <tr>
      <th scope="col">Placa de vehículo</th>      
      <td>AFK947</td>
    </tr>
    <tr>
      <th scope="col">Producto</th>      
      <td>Juego de sala 3-2-1 Zack Vintage</td>
    </tr>
  </thead>

</table>
</div>
</div>




    </div>
  </div>
</div>



</div>
<!-- FIN -->

  <div class="card">
  <div class="card-body">
 <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes</font></font></h1>
<div class="input-group mb-3"><input type="text" placeholder="Buscar conductor" aria-describedby="basic-addon2" class="form-control"> <div class="input-group-append"><button type="button" class="btn btn-outline-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Buscar
            </font></font></button></div></div>
<table class="table table-light">
  <thead class="thead-green">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Origen</th>
      <th scope="col">Destino</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Villa el Salvador</td>
      <td>San Borja</td>      
      <td><label class="badge badge-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pendiente</font></font></label></td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTrackingDetalle">Ver detalle</button></td>  
</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Chorrillos</td>
      <td>San Borja</td >      
      <td><label class="badge badge-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Entregado</font></font></label></td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTrackingDetalle">Ver detalle</button></td>  
</td>
    </tr>

<tr>
      <th scope="row">3</th>
      <td>La Victoria</td>
      <td>Centro de Lima</td >      
      <td><label class="badge badge-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aceptado</font></font></label></td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTrackingDetalle">Ver detalle</button></td>  
</td>
    </tr>


    <tr>
      <th scope="row">4</th>
      <td>Los Olivos</td>
      <td>San Isidro</td >      
      <td><label class="badge badge-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En tránsito</font></font></label></td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTrackingDetalle">Ver detalle</button></td>  
</td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>Comas</td>
      <td>Surquillo</td >      
      <td><label class="badge badge-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Falso flete</font></font></label></td>
      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTrackingDetalle">Ver detalle</button></td>  
</td>
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