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
                // data: {
                //     labels: ['Despesa', 'Receita'],
                //     datasets: [{
                //         label: 'Despesas e Receita',
                //         data: [1, 2],
                //         backgroundColor: [
                //             'rgba(255, 99, 132, 0.2)',
                //             'rgba(54, 162, 235, 0.2)',
                //         ],
                //         borderColor: [
                //             'rgba(255, 99, 132, 1)',
                //             'rgba(54, 162, 235, 1)',
                //         ],
                //         borderWidth: 1
                //     }]
                // },
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
});


$(document).ready(function() {
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
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(err) {
            console.error('Erro ao buscar dados: ', err);
        }
    });
});
</script>