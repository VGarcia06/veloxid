<template>

<div>
 <h1 align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solicitudes</font></font></h1>
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
      <td><button type="button" class="btn btn-success">Ver detalle</button>
</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Chorrillos</td>
      <td>San Borja</td >      
      <td>Entregado</td>
      <td><button type="button" class="btn btn-success">Ver detalle</button>
</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
</template>



<script>
export default { data()
{ return{};}
    
}
</script>