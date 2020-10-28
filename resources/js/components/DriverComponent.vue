<template>
 <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">TRANSPORTISTAS</h4>
          <p class="card-description"></p>
          <div class="form-group">
            <label for="exampleInputName1">Descripción</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputName1"
              v-model="descripcion"
              placeholder="Descripción"
            />
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">Marca</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail3"
                  v-model="marca"
                  placeholder="Marca"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">Modelo</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword4"
                  v-model="modelo"
                  placeholder="Modelo"
                />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleSelectUnidadCompra">Unidad de Compra</label>
            <select
              class="form-control"
              v-model="unidad_compra"
              id="exampleSelectUnidadCompra"
            >
              <option value="UND">UND</option>
              <option value="BOT">BOT</option>
              <option value="KIT">KIT</option>
              <option value="PQU">PQU</option>
              <option value="SET">SET</option>
              <option vaue="JGO">JGO</option>
              <option value="CJA">CJA</option>
              <option value="RLL">RLL</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Nota</label>
            <textarea
              class="form-control"
              placeholder="Comentario"
              id="exampleTextarea1"
              v-model="nota"
              rows="4"
            ></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">Categoria</label>
                <select
                  class="form-control"
                  v-model="categorias_id"
                  @click="getSubcategorias(categorias_id)"
                >
                  <option v-for="item in categorias" :value="item.id">
                    {{ item.categoria }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">Subcategoria</label>
                <select class="form-control" v-model="subcategorias_id">
                  <option v-for="item in subcategorias" :value="item.id">
                    {{ item.subcategoria }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
          <button
            v-if="update == 0"
            @click="saveProductos()"
            class="btn btn-gradient-primary mr-2"
          >
            Registrar
          </button>
          <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
          <button
            v-if="update != 0"
            @click="updateProductos()"
            class="btn btn-warning btn-fw"
          >
            Actualizar
          </button>
          <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
          <button
            v-if="update != 0"
            @click="clearFields()"
            class="btn btn-danger btn-fw"
          >
            Cancelar
          </button>
        </div>
      </div>
 </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
