
<section id="hero_section">
    <!-- CHIFFRE D'AFFAIRE -->
     <div id="chiffre_affaire"></div>
</section>
<script>
    document.addEventListener('load',function(e){
            /**
             * CHIFFRE D'AFFAIRE
             */
            // data
            const data = {
                labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        // config
        const config_chiffre_affaire = {
            type: 'doughnut',
            data: data,
        };
        const chiffre_affaire_chart  = new Chart(
            document.getElementById('chiffre_affaire'),
            config_chiffre_affaire
        );
    })
</script>