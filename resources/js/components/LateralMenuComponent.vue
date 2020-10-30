<template>
<div >
   <li class="nav-item" v-for="item in menus">
    <a class="nav-link" :href="item.href">
      <span class="menu-title">{{item.nombre}}</span>
      <i :class="item.icon"></i>
    </a>
  </li>

</div>
</template>
<script>
    export default {

  data() {

      return {
        menus: [],
      }
    },
  created(){
    axios.get('get_menulateral').then(res=>{
      this.menus = res.data;

    })
  },

}

</script>