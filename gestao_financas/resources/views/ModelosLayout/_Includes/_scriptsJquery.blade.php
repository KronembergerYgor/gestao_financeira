<script>
    $(document).ready(function() {
        // Ocultar alerta após 3 segundos
        setTimeout(() => $('#alert-message').fadeOut('slow'), 3000);

        // Alternar o sidebar
        $('.toggle-btn').click(function() {
            $('#sidebar').toggleClass('collapsed');
            $('#content').toggleClass('expanded');
        });

        // Inicializa os gráficos
        initializeCharts();

        // Atualiza gráficos ao clicar no botão de filtro
        $('#filterButton').on('click', function() {
            const selectedType = $('#type').val();
            updateCharts(selectedType);
        });

        // Expande/recolhe o card de filtro
        $('#filterHeader').on('click', function() {
            const $filterBody = $('#filterBody');
            const isExpanded = $filterBody.css('max-height') !== '0px';

            $filterBody.css({
                'padding': isExpanded ? '0 1rem' : '1rem 1rem',
                'max-height': isExpanded ? '0px' : '200px'
            });
        });
    });

    // Variáveis globais para os gráficos
    let doughnutChart;
    let expenseBarChart;
    let revenueBarChart;
    let updateCards;

    // Função para inicializar gráficos
    function initializeCharts() {
        fetchChartData("{{ route('graphics.revenuesAndExpenses') }}", renderDoughnutChart);
        fetchChartData("{{ route('graphics.expenseForCategory') }}", renderExpenseBarChart);
        fetchChartData("{{ route('graphics.revenuesForCategory') }}", renderRevenueBarChart);
        fetchChartData("{{ route('graphics.valuesCards') }}", renderUpdateCards);
    }

    // Função para buscar dados da API
    function fetchChartData(url, callback) {
        $.ajax({
            url: url,
            method: 'GET',
            success: callback,
            error: (err) => console.error('Erro ao buscar dados: ', err)
        });
    }
    // Função para verificar e reparar retorno do response
    function repairAndVerifyResponse(data) {
        if(data.original){
            data = data.original
        }
        return data;
    }

    // Função para atualizar os cards
    function renderUpdateCards(response) {

        response = repairAndVerifyResponse(response);
       

        $('#boxCards .card-body h4').eq(0).text('R$ ' + response.receita_geral);
        $('#boxCards .card-body h4').eq(1).text('R$ ' + response.despesa_geral);
        $('#boxCards .card-body h4').eq(2).text('R$ ' + response.saldo);
    }


    // Renderiza gráfico de donut
    function renderDoughnutChart(response) {
        const ctx = document.getElementById('expensesAndRecives').getContext('2d');
       

        // Destruir o gráfico anterior, se existir
        if (doughnutChart) {
            doughnutChart.destroy();
        }

        response = repairAndVerifyResponse(response);

        doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: response,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }


    // Renderiza gráfico de barras de despesas
    function renderExpenseBarChart(response) {
        const ctx = document.getElementById('expenseCategory').getContext('2d');

        // Destruir o gráfico anterior, se existir
        if (expenseBarChart) {
            expenseBarChart.destroy();
        }

        response = repairAndVerifyResponse(response);

        expenseBarChart = new Chart(ctx, {
            type: 'bar',
            data: response,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (context) => `${context.dataset.label}: R$${context.raw}`
                        }
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: '#000',
                        font: { size: 10 },
                        formatter: (value, context) => `${context.dataset.label}\nR$${value}`
                    }
                },
                scales: { y: { beginAtZero: true } }
            },
            plugins: [ChartDataLabels]
        });
    }

    // Renderiza gráfico de barras de receitas
    function renderRevenueBarChart(response) {
        const ctx = document.getElementById('revenuesCategory').getContext('2d');

        // Destruir o gráfico anterior, se existir
        if (revenueBarChart) {
            revenueBarChart.destroy();
        }

        response = repairAndVerifyResponse(response);

        revenueBarChart = new Chart(ctx, {
            type: 'bar',
            data: response,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (context) => `${context.dataset.label}: R$${context.raw}`
                        }
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: '#000',
                        font: { size: 10 },
                        formatter: (value, context) => `${context.dataset.label}\nR$${value}`
                    }
                },
                scales: { y: { beginAtZero: true } }
            },
            plugins: [ChartDataLabels]
        });
    }

    //Função para atualizar os gráficos e cards
    function updateCharts(selectedType) {
    $.ajax({
            url: "{{ route('graphics.updateCharts') }}",
            method: 'GET',
            data: { type: selectedType },
            success: function(response) {

                console.log(response)
                renderDoughnutChart(response.doughnutData);
                renderExpenseBarChart(response.expenseData);
                renderRevenueBarChart(response.revenueData);
                renderUpdateCards(response.cardsValuesData);
            },
            error: (err) => console.error('Erro ao buscar dados: ', err)
        });
    }

</script>
