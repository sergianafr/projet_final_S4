
<section id="hero_section">
    <div class="row">
        <div class="col">
            <div>
                <form action="">
                    <div class="group-form">
                        <!-- TYPE DE VOITURE -->
                        <select name="" id="">
                            
                        </select>
                    </div>
                </form>
            </div>
            <div style="width: 600px; height: 400px;">
             <canvas id="chiffre_affaire"></canvas>
            </div>
        </div>
        <!-- CHIFFRE D'AFFAIRE -->
        <div class="col"></div>
    </div>

</section>
<script>
   document.addEventListener('DOMContentLoaded', (event) => {
            const cf_dom = document.getElementById('chiffre_affaire').getContext('2d');
            const data = {
                labels: ['Payer', 'Impayer'],
                datasets: [{
                    data: [<?=$cf['payer']?>,<?=$cf['impayer']?>],
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                    hoverOffset: 4
                }]
            };
            // Config
            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 10,
                            bottom: 10
                        }
                    },
                    elements: {
                        arc: {
                            borderWidth: 0,
                            radius: '70%'  // Set the radius of the pie chart
                        }
                    },
                    onClick: (event, elements) => {
                        if (elements.length > 0) {
                            const chart = elements[0]._chart;
                            const index = elements[0]._index;
                            const label = chart.data.labels[index];
                            const value = chart.data.datasets[0].data[index];
                            alert(`Label: ${label}\nValue: ${value}`);
                        }
                    }
                }
            };
            new Chart(cf_dom, config);
        });
</script>