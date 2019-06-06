<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="car-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4>Ingresos</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="entries">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p>Compras de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4>Ventas</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="sales">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p>Ventas de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <p class="text-center">Balance de Ventas e Ingresos</p>
                </div>
                <div class="car-body">
                    <div class="text-center">
                        <balance-component></balance-component>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="text-center">
                        Analisis de productos.
                        Atenci&oacute;n los siguientes productos son alertas que se generaron por la configuraci&oacute;n de cada uno
                    </p>
                    <ul class="text-center">
                        <li>
                            <strong>Umbral del stock </strong>
                        </li>

                        <li>
                            <strong>Umbral de ventas </strong>
                        </li>

                        <li>
                            <strong>Umbral de fecha de vencimiento </strong>
                        </li>
                    </ul>
                </div>
                <div class="car-body">
                    <div class="text-center">
                        <analysis-products></analysis-products>
                    </div>
                </div>
            </div>
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
                            label: 'Ingresos',
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