<div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">

    <div class="flex justify-between mb-3">
        <div class="flex justify-center items-center">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Pedidos según su estado</h5>
            <svg data-popover-target="chart-info" data-popover-placement="bottom"
                class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
            </svg>
            <div data-popover id="chart-info" role="tooltip"
                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                <div class="p-3 space-y-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Pedidos según su estado</h3>
                    <p>Se contabilizan todos los pedidos actuales y se agrupan según el esatdo para mejorar la administración de los pedidos que se han realizado.</p>
                </div>
                <div data-popper-arrow></div>
            </div>
        </div>

    </div>

    <!-- Donut Chart -->
    <div wire:ignore class="py-6" id="donut-chart"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const waitForLivewire = setInterval(() => {
                if (typeof Livewire !== 'undefined') {
                    clearInterval(waitForLivewire);
                    console.log('Livewire disponible');

                    const options = {
                        series: @json($series),
                        labels: @json($labels),
                        colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694", "#845EC2"],
                        chart: {
                            height: 320,
                            width: "100%",
                            type: "donut",
                        },
                        stroke: {
                            colors: ["transparent"],
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            show: true,
                                            fontFamily: "Inter, sans-serif",
                                            offsetY: 20,
                                        },
                                        total: {
                                            showAlways: true,
                                            show: true,
                                            label: "Total",
                                            fontFamily: "Inter, sans-serif",
                                            // formatter: function (w) {
                                            //     const sum = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                            //     return sum + " solicitudes";
                                            // },
                                        },
                                        value: {
                                            show: true,
                                            fontFamily: "Inter, sans-serif",
                                            offsetY: -20,
                                        },
                                    },
                                    size: "80%",
                                },
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: "bottom",
                            fontFamily: "Inter, sans-serif",
                        },
                    };

                    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("donut-chart"), options);
                        chart.render();
                    }

                }
            }, 50);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
</div>
