export const planetChartData = {
  type: "line",
  data: {
    labels: ["January", "Februari", "March", "April", "May", "June", "Juli", "August", "September", "October", "November", "December"],
    datasets: [
      {
        label: "Report To Lecturer",
        data: [5, 8, 10, 22, 79, 82, 27, 14, 52, 60, 49, 12],
        backgroundColor: "#d2f4ea",
        borderColor: "#79dfc1",
        borderWidth: 3
      },
      {
        label: "Report To Leader",
        data: [61, 21, 51, 74, 79, 85, 23, 18, 32, 82, 49, 22],
        backgroundColor: "#f8d7da",
        borderColor: "#ea868f",
        borderWidth: 3
      }
    ]
  },
  options: {
    responsive: true,
    lineTension: 1,
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
            padding: 25
          }
        }
      ]
    }
  }
};

export default planetChartData;