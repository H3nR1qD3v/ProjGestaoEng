<!-- resources/views/teste.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - Chart.js</title>
    <!-- Importando Chart.js de uma CDN mais confiável -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
</head>
<body>
    <div class="container" style="width: 80%; margin: auto; padding: 50px;">
        <h2 class="text-center">Gráfico de Teste com Chart.js</h2>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Dados para o gráfico
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Tipo do gráfico
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'], // Rótulos
                datasets: [{
                    label: 'Número de Projetos',
                    data: [12, 19, 3, 5, 2], // Dados do gráfico
                    backgroundColor: '#17a2b8', // Cor das barras
                    borderColor: '#17a2b8',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Responsivo
                plugins: {
                    legend: {
                        display: true // Exibe a legenda
                    },
                    tooltip: {
                        enabled: true // Habilita o tooltip
                    }
                }
            }
        });
    </script>
</body>
</html>
