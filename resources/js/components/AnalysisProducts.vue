<template>
    <ul class = "text-center">
        <li v-for="itemsNotificationStock in itemsNotificationsStock">
            <div class="text-dark">
                <p style= "font-size:16px;">
                    <i class="fas fa-exclamation-triangle"></i>

                    El producto <strong>{{ itemsNotificationStock.name }}</strong>  tiene poco stock: <strong>{{ itemsNotificationStock.stock }}</strong> y tiene un umbral de alerta de {{ itemsNotificationStock.stock_threshold }}
                    <i class="fas fa-exclamation-triangle"></i>
                </p>
<!--
                <p style= "font-size:16px;"><i class="fas fa-exclamation-triangle"></i> El producto <strong>{{ itemsNotificationStock.name }}</strong> caduca <strong>{{ defaultFormat(itemsNotification.expiration_date) }}</strong>  <i class="fas fa-exclamation-triangle"></i></p>
-->
            </div>
        </li>

        <li v-for="itemsNotificationExpirationDate in itemsNotificationsExpirationDate">
            <div class="text-dark">
                <p style= "font-size:16px;">
                    <i class="fas fa-exclamation-triangle"></i>

                    El producto <strong>{{ itemsNotificationExpirationDate.name }}</strong>  est&aacute; a punto de vencer: <strong>{{ itemsNotificationExpirationDate.expiration_date }}</strong> y tiene un umbral de alerta de {{ itemsNotificationExpirationDate.expiration_threshold }}
                    <i class="fas fa-exclamation-triangle"></i>
                </p>
<!--
                <p style= "font-size:16px;"><i class="fas fa-exclamation-triangle"></i> El producto <strong>{{ itemsNotificationStock.name }}</strong> caduca <strong>{{ defaultFormat(itemsNotification.expiration_date) }}</strong>  <i class="fas fa-exclamation-triangle"></i></p>
-->
            </div>
        </li>
    </ul>
   
</template>

<script>
    export default {
        data() {
            return {
                itemsNotificationsStock: [],
                itemsNotificationsExpirationDate: [],
            }
        },

        methods: {
            getItemsNotifications() {
                let me = this;
                let url = '/itemsNotification';
                axios.get(url).then(function (response) {
                    let res = response.data;
                    me.itemsNotificationsStock = res.itemsNotificationsStock;
                    me.itemsNotificationsExpirationDate = res.itemsNotificationsExpirationDate;
                })
            }
        },

        mounted() {
            this.getItemsNotifications();
        }
    }
</script>
