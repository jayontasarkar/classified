<template>
    <form method="POST" v-if="loaded" class="payment-form">
        <button class="btn btn-primary">Complete Payment</button>
        <input type="hidden" name="_token" :value="csrfToken">
    </form>
    <div v-else>
        loading payment form...
    </div>
</template>

<script>
    import braintree from 'braintree-web'
    export default {
        data () {
            return {
                loaded: true,
                csrfToken: window.Laravel.csrfToken
            }
        },
        mounted() {
            
        }
    }
</script>
<style scoped>
    .payment-form {
        margin-top: 20px;
    }
</style>