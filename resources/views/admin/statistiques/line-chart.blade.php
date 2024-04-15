<x-layout>
  <x-slot name="header">
    {{ __('Statistiques') }}
    </x-slot>
  <x-panel>
      <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col justify-center items-center">
          <canvas id="totalReservationsChart" class="w-full"></canvas>
        </div>
        <div class="flex flex-col justify-center items-center">
          <canvas id="totalPricesChart" class="w-full"></canvas>
        </div>
      </div>
      <div class="">
        <canvas id="totalInscsriptionPerMonth" ></canvas>
      </div>
      <div class="mt-20">
        <canvas id="typePercentage" width="500PX"></canvas>
      </div>
    
  </x-panel>
</x-layout>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
  
      document.addEventListener('DOMContentLoaded', function() {

         // ###########Chart 1 (Les reservations)###############//
        const ctx1 = document.getElementById('totalReservationsChart').getContext("2d");

        let gradient1 = ctx1.createLinearGradient(0,0,0,400);
        gradient1.addColorStop(0, 'rgba(58, 123, 213, 1)');
        gradient1.addColorStop(1, 'rgba(0, 210, 255, 0.3)');

        const labels1 = [];

        const data1 = {
          labels: labels1,
          datasets: [{
            data: [<?= $totalReservationsPerMonth ?>],
            label: "Total des réservations par mois",
            fill: true,
            backgroundColor: gradient1,
            borderColor: "grey",
            pointBackgroundColor: "#fff",
            //tension: 0.4
          }]
        };

        const config1 = {
          type: 'line',
          data: data1,
          options: {
            radius: 5,
            hoverRadius: 12,
            hitRadius: 30,
            responsive: true,
            animation: {
              onComplete: () => {
                delayed = true;
              },
              delay: (context) => {
                let delay = 0;
                if (context.type === "data" && context.mode === "default" && !delay) {
                  delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
              }
            }
          }
        };

        const myChart1 = new Chart(ctx1, config1);

        // ###########Chart 2 (Revunues)###############//
        const ctx2 = document.getElementById('totalPricesChart').getContext("2d");

        let gradient2 = ctx2.createLinearGradient(0,0,0,400);
        gradient2.addColorStop(0, 'rgba(58, 123, 213, 1)');
        gradient2.addColorStop(1, 'rgba(0, 210, 255, 0.3)');

        const labels2 = [];

        const data2 = {
          labels: labels2,
          datasets: [{
            data: [<?= $totalPricePerMonth ?>],
            label: "Total des revenus par mois",
            fill: true,
            backgroundColor: gradient2,
            borderColor: "red",
            pointBackgroundColor: "#fff",
            //tension: 0.4
          }]
        };

        const config2 = {
          type: 'line',
          data: data2,
          options: {
            radius: 5,
            hoverRadius: 12,
            hitRadius: 30,
            responsive: true,
            animation: {
              onComplete: () => {
                delayed = true;
              },
              delay: (context) => {
                let delay = 0;
                if (context.type === "data" && context.mode === "default" && !delay) {
                  delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
              }
            }
          }
        };

        const myChart2 = new Chart(ctx2, config2);

        // ###########Chart 3 (Total inscriptions per month)###############//


        const ctx3 = document.getElementById('totalInscsriptionPerMonth').getContext("2d");

        let gradient3 = ctx3.createLinearGradient(0,0,0,400);
        gradient3.addColorStop(0, 'rgba(58, 123, 213, 1)');
        gradient3.addColorStop(1, 'rgba(0, 210, 255, 0.3)');

        const labels3 = [];

        const data3 = {
          labels: labels3,
          datasets: [{
            data: [<?= $totalRegisrationsPerMonth ?>],
            label: "Total des inscriptions par mois",
            fill: true,
            backgroundColor: gradient3,
            borderColor: "red",
            pointBackgroundColor: "#fff",
            //tension: 0.4
          }]
        };

        const config3 = {
          type: 'line',
          data: data3,
          options: {
            radius: 5,
            hoverRadius: 12,
            hitRadius: 30,
            responsive: true,
            animation: {
              onComplete: () => {
                delayed = true;
              },
              delay: (context) => {
                let delay = 0;
                if (context.type === "data" && context.mode === "default" && !delay) {
                  delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
              }
            }
          }
        };

        const myChart3 = new Chart(ctx3, config3);

        // ###########Chart 4 (type poucentage)###############//
      const ctx4 = document.getElementById('typePercentage').getContext("2d");


      const percentageByType = <?= json_encode($percentageByType) ?>;

      const labels4 = Object.keys(percentageByType);
      const data4 = Object.values(percentageByType);

      const chartData4 = {
        labels: labels4,
        datasets: [{
          data: data4,
          label: "Total des inscriptions par mois",
          fill: true,
          pointBackgroundColor: "#fff",
          //tension: 0.4
        }]
      };

        const config4 = {
          type: 'doughnut',
          data: chartData4,
          options: {
            responsive: true,
            maintainAspectRatio: false, // Ensure aspect ratio is not maintained
            aspectRatio: 1,
            animation: {
              onComplete: () => {
                delayed = true;
              },
              delay: (context) => {
                let delay = 0;
                if (context.type === "data" && context.mode === "default" && !delay) {
                  delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
              }
            },
            width:100,
            height:100
          }
        };

      const myChart4 = new Chart(ctx4, config4);

      });

    </script>
