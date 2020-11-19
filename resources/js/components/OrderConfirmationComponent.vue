<template>

<div>
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
      <th scope="col">Producto</th>
      <th scope="col">Cotización</th>
      <th scope="col">Fecha</th>
      <th scope="col">Confirmación</th>
      <th scope="col">Evidenciar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Villa el Salvador</td>
      <td>San Borja</td>      
      <td>Juego de sala 3-2-1</td>
      <td>60</td>      
      <td>12/11/2020</td>      
      <td><div class="input-group-prepend">
                          <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirmar</font></font></button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 46px, 0px);">
                            <a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aceptar</font></font></a>
                            <a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rechazar</font></font></a>
                            <div role="separator" class="dropdown-divider"></div>
                          </div>
                        </div></td>
      <td><button><h2><i class="mdi mdi-cloud-upload"></i></h2></button></td>
           
</td>
    </tr>
    
    <tr>
      <th scope="row">2</th>
      <td>Chorrillos</td>
      <td>San Isidro</td>      
      <td>Juego de comedor 8 sillas Lil</td>
      <td>70</td>      
      <td>13/11/2020</td>      
      <td><div class="row">
    <div class="col-sm-3">
      <select class="mdb-select md-form colorful-select dropdown-primary">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
</select>
<label class="mdb-main-label">Blue select</label>
    </div>
  </div></td>      
      <td><button><h2><i class="mdi mdi-cloud-upload"></i></h2></button></td>
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