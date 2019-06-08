<template>
    <ul class = "text-center">
        <li v-for="itemsNotification in itemsNotifications">
            <div class="text-dark">
                <p style= "font-size:16px;"><i class="fas fa-exclamation-triangle"></i> El producto <strong>{{ itemsNotification.name }}</strong>  tiene un stock de <strong>{{ itemsNotification.stock }}</strong> y caduca <strong>{{ defaultFormat(itemsNotification.expiration_date) }}</strong> <i class="fas fa-exclamation-triangle"></i></p>
            </div>
        </li>
    </ul>
   
</template>

<script>
    export default {
        data() {
            return {
                itemsNotifications: [],
            }
        },

        methods: {
            defaultFormat(date) {
                return moment(date).format('DD-MM-YYYY');
            },

            getItemsNotifications() {
                let me = this;
                let url = '/itemsNotification';
                axios.get(url).then(function (response) {
                    let res = response.data;
                    me.itemsNotifications = res.itemsNotifications;
                })
            }
        },

        mounted() {
            this.getItemsNotifications();
        }
    }
</script>
