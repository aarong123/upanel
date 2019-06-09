<template>
    <div style = "color: black">
        <div>
            {{ varTotalEntry - varTotalSale }}
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                // entries
                entries: [],
                varTotalEntry: 0,
                //sales
                sales: [],
                varTotalSale: 0,
            }
        },

        methods: {
            // entries
            getEntries() {
                let me = this;
                let url = '/dashboard';
                axios.get(url).then(function (response) {
                    let res = response.data;
                    me.entries = res.entries;
                    me.entries.map(function (x) {
                        me.varTotalEntry = parseFloat(x.total);
                    });
                });
            },
            //sales
            getSales() {
                let me = this;
                let url = '/dashboard';
                axios.get(url).then(function (response) {
                    let res = response.data;
                    me.sales = res.sales;
                    me.sales.map(function (x) {
                        me.varTotalSale = parseFloat(x.total);
                        //me.total = me.varTotalSale;
                        //me.calculateBalance();
                    });
                });

            },

        },

        mounted() {
            this.getEntries();
            this.getSales();
        }
    }
</script>