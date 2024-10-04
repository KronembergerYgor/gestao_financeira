<script>
    // Usado para tempo do alert na tela 
    $(document).ready(function() { 
        setTimeout(function() {
            $('#alert-message').fadeOut('slow');
        }, 3000); // 3000 milissegundos = 3 segundos
    });

    $(document).ready(function() {
        $('.toggle-btn').click(function() {
            $('#sidebar').toggleClass('collapsed');
            $('#content').toggleClass('expanded');
        });
    });






    $(document).ready(function() {
    // Função para inicializar os gráficos
    function initializeCharts() {
        $.ajax({
            url: "{{ route('graphics.revenuesAndExpenses') }}", // A URL da sua API
            method: 'GET',
            success: function(response) {
                const expensesAndRecives = document.getElementById('expensesAndRecives').getContext('2d');
                const myDoughnutChart = new Chart(expensesAndRecives, {
                    type: 'doughnut',
                    data: {
                        labels: response.labels, // Usando os labels da resposta
                        datasets: response.datasets // Usando os datasets da resposta
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            }
                        }
                    }
                });
            },
            error: function(err) {
                console.error('Erro ao buscar dados: ', err);
            }
        });

        $.ajax({
            url: "{{ route('graphics.expenseForCategory') }}", // A URL da sua API
            method: 'GET',
            success: function(response) {
                const expenseCategory = document.getElementById('expenseCategory').getContext('2d');
                const myBarChart = new Chart(expenseCategory, {
                    type: 'bar',
                    data: {
                        labels: response.labels, // Usando os labels da resposta
                        datasets: response.datasets // Usando os datasets da resposta
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': R$' + context.raw;
                                    }
                                }
                            },
                            datalabels: {
                                anchor: 'center',
                                align: 'center',
                                color: '#000',
                                font: {
                                    size: 10
                                },
                                formatter: function(value, context) {
                                    return context.dataset.label + '\nR$' + value;
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: [ChartDataLabels]
                });
            },
            error: function(err) {
                console.error('Erro ao buscar dados: ', err);
            }
        });

        $.ajax({
            url: "{{ route('graphics.revenuesForCategory') }}", // A URL da sua API
            method: 'GET',
            success: function(response) {
                const revenuesCategory = document.getElementById('revenuesCategory').getContext('2d');
                const myBarChart = new Chart(revenuesCategory, {
                    type: 'bar',
                    data: {
                        labels: response.labels,
                        datasets: response.datasets
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': R$' + context.raw;
                                    }
                                }
                            },
                            datalabels: {
                                anchor: 'center',
                                align: 'center',
                                color: '#000',
                                font: {
                                    size: 10
                                },
                                formatter: function(value, context) {
                                    return context.dataset.label + '\nR$' + value;
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: [ChartDataLabels]
                });
            },
            error: function(err) {
                console.error('Erro ao buscar dados: ', err);
            }
        });
    }

    // Inicializa os gráficos ao carregar a página
    initializeCharts();

    $('#filterButton').on('click', function() {
        const selectedType = $('#type').val();
        // Aqui, você vai fazer chamadas AJAX para atualizar os gráficos com base no filtro selecionado.

        // console.log(selectedType);
        updateCharts(selectedType);
    });

    function updateCharts(selectedType) {

        // console.log($selectedType);
        $.ajax({
            url: "{{ route('graphics.updateCharts') }}", // URL do seu endpoint de atualização
            method: 'GET',
            data: { type: selectedType }, // Envia o valor selecionado
            success: function(response) {
                // Atualiza os gráficos com os dados retornados
                updateDoughnutChart(response.doughnutData);
                updateBarChart(response.expenseData);
                updateRevenuesChart(response.revenueData);
            },
            error: function(err) {
                console.error('Erro ao buscar dados: ', err);
            }
        });
    }

    function updateDoughnutChart(data) {
        const expensesAndRecives = document.getElementById('expensesAndRecives').getContext('2d');
        // Atualiza o gráfico de donut
        // Aqui você precisa implementar a lógica para atualizar o gráfico existente com os novos dados
        // Por exemplo:
        const myDoughnutChart = new Chart(expensesAndRecives, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    }

    function updateBarChart(data) {
        const expenseCategory = document.getElementById('expenseCategory').getContext('2d');
        // Atualiza o gráfico de barras de despesas
        // Aqui você precisa implementar a lógica para atualizar o gráfico existente com os novos dados
    }

    function updateRevenuesChart(data) {
        const revenuesCategory = document.getElementById('revenuesCategory').getContext('2d');
        // Atualiza o gráfico de barras de receitas
        // Aqui você precisa implementar a lógica para atualizar o gráfico existente com os novos dados
    }
});


$(document).ready(function() {
    $('#filterHeader').on('click', function() {
        const $filterBody = $('#filterBody');

        // Verifica se o card está expandido ou não
        if ($filterBody.css('max-height') === '0px') {
            // Expande o card
            $filterBody.css({
                'padding': '1rem 1rem', // Define o padding ao expandir
                'max-height': '200px' // Defina a altura máxima desejada
            });
        } else {
            // Recolhe o card
            $filterBody.css({
                'padding': '0 1rem', // Reseta o padding ao recolher
                'max-height': '0px' // Define o max-height para 0 ao recolher
            });
        }
    });
});



</script>