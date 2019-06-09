<template>
    <main class="main">
        <div class="container-fluid">
            <div class="card border-success">
                <div class="card-header border-success" style="text-align: center">
                    <h4><b>Reporte de ventas y compras</b></h4>
                </div>
                <div class="car-body">
                    <div class="row">
                        <div class="col-md-6" style="text-align: center">
                            <div class="card card-chart border-success" style="margin: 0 auto;">
                                <div class="card-header border-success">
                                    <h5><b>Compras</b></h5>
                                </div>

                                <div class="card-content border-success">
                                    <div class="ct-chart">
                                        <canvas id="entries">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer border-success" style="font-size:16px;">
                                    <p style = "color: black">Compras de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: center">
                            <div class="card card-chart border-success">
                                <div class="card-header border-success">
                                    <h5><b>Ventas</b></h5>
                                </div>
                                <div class="card-content border-success">
                                    <div class="ct-chart">
                                        <canvas id="sales">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer border-success" style="font-size:16px;">
                                    <p style = "color: black">Ventas de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-success">
                <div class="card-header border-success" style="text-align: center">
                    <h5><b>Balance de compras y ventas</b></h5>
                </div>
                <div class="car-body border-success">
                    <div class="text-center" style="font-size:16px;">
                        <balance-component></balance-component>
                    </div>
                </div>
            </div>
            <div class="card border-success">
                <div class="card-header border-success" style="text-align: center">
                    <h5><b>Análisis de productos</b></h5>
                </div>
                <div class="car-body border-success">
                </div>
            </div>
            <div class="card bg-warning border-success">
                    <div class="card-header border-success">
                        <analysis-products></analysis-products>
                    </div>
            </div>
            <br>
            <div style="margin: 0 auto; width:1100px;">
                <a href="/main" class="btn btn-primary">Ir al men&uacute; principal</a>
            </div>
            <br>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {

                // entries
                varEntry: null,
                charEntry: null,
                entries: [],
                varTotalEntry: [],
                varMonthEntry: [],

                //sales
                varSale: null,
                charSale: null,
                sales: [],
                varTotalSale: [],
                varMonthSale: [],
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
                    // cargamos los datos de chartjs
                    me.loadEntries();
                })
            },

            loadEntries() {
                let me = this;
                me.entries.map(function (x) {
                    me.varMonthEntry.push(x.month);
                    me.varTotalEntry.push(x.total);
                });
                me.varEntry = document.getElementById('entries').getContext('2d');

                me.charEntry = new Chart(me.varEntry, {

                    type: 'bar',
                    data: {
                        labels: me.varMonthEntry,
                        datasets: [{
                            label: 'Compras',
                            data: me.varTotalEntry,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },

            //sales
            getSales() {
                let me = this;
                let url = '/dashboard';
                axios.get(url).then(function (response) {
                    let res = response.data;
                    me.sales = res.sales;
                    // cargamos los datos de chartjs
                    me.loadSales();
                })
            },


            loadSales() {
                let me = this;
                me.sales.map(function (x) {
                    me.varMonthSale.push(x.month);
                    me.varTotalSale.push(x.total);
                });
                me.varVenta = document.getElementById('sales').getContext('2d');

                me.charVenta = new Chart(me.varVenta, {

                    type: 'bar',
                    data: {
                        labels: me.varMonthSale,
                        datasets: [{
                            label: 'Ventas',
                            data: me.varTotalSale,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
        },
        mounted() {
            this.getEntries();
            this.getSales();
        }
    }
</script>

