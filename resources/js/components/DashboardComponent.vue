<template>
    <main class="main">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h4><b>Reporte de ventas y compras</b></h4>
                </div>
                <div class="car-body">
                    <div class="row">
                        <div class="col-md-6" style="text-align: center">
                            <div class="card card-chart" style="margin: 0 auto;">
                                <div class="card-header">
                                <h5><b>Compras</b></h5>
                                </div>
                                
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="entries">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer" style= "font-size:16px;">
                                    <p>Compras de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: center">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h5><b>Ventas</b></h5>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="sales">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer" style= "font-size:16px;">
                                    <p>Ventas de los últimos meses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h5><b>Balance de compras y ventas</b></h5>
                </div>
                <div class="car-body">
                    <div class="text-center" style= "font-size:16px;">
                        <balance-component></balance-component>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h5><b>Análisis de productos</b></h5>
                </div>
                <div class="car-body">
                    <p class="text-center" style= "font-size:16px;">
                    Atenci&oacute;n, los siguientes productos son alertas que se generaron por la configuraci&oacute;n de 
                    <strong>umbral de stock </strong> y <strong>umbral de fecha de vencimiento</strong>:
                    </p>
                      <!--<ul class="text-center">
                        <li>
                            <strong>Umbral de stock </strong>
                        </li>

                      <li>
                            <strong>Umbral de ventas </strong>

                        </li>
                        <li>
                            <strong>Umbral de fecha de vencimiento </strong>
                        </li>
                    </ul>-->
                </div>
                <div class="card bg-warning">
                 <div class="card-header">
                    <analysis-products></analysis-products>
                 </div>
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

