<template>
    <div>
        <cotizacion v-if="cotizar"></cotizacion>
        <request v-else></request>
    </div>
</template>
    
<script>
import cotizacion from './CotizationComponent';
import request from './RequestComponent';
export default {
    components: {
        cotizacion,
        request
    },
    data() {
        return {
            cotizar: true,
        }
    }
}
</script>