<template>
    <div>
        <form method="POST" v-if="loaded" class="payment-form">
            <div id="payment"></div>
            <button class="btn btn-primary" v-if="showSubmitBtn">Complete Payment</button>
            <input type="hidden" name="_token" :value="csrfToken">
        </form>
        <div v-else>
            loading payment form...
        </div>
    </div>
</template>

<script>
    import braintree from 'braintree-web'
    export default {
        data () {
            return {
                loaded: false,
                showSubmitBtn: false,
                csrfToken: window.Laravel.csrfToken
            }
        },
        mounted() {
            axios.get('/braintree/token').then((response) => {
                this.loaded = true
                braintree.setup(response.data.data.token, 'dropin', {
                    container: 'payment',
                    onReady: () => {
                        this.showSubmitBtn = true
                    }
                })
            })     
        }
    }
</script>
<style scoped>
    .payment-form {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>