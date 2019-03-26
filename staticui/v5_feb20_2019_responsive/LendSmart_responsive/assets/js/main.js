var paymentData3 = {
  labels: ["Loan repayment", "Home insurance", "Tax"],
  datasets: [
    {
      data: [65, 20, 15],
      backgroundColor: ["#6A2CD8", "#23CE6B", "#F9CB40"]
    }
  ]
};

var paymentData2 = {
  datasets: [
    {
      data: [50, 35, 15],
      backgroundColor: ["#B495EB", "#E1D5F7", "#F0EAFB"]
    }
  ]
};

var paymentData1 = {
  datasets: [
    {
      data: [65, 20, 15],
      backgroundColor: ["#B495EB", "#E1D5F7", "#F0EAFB"]
    }
  ]
};

var debtData = {
    labels: ["Debt", "Remainig income", "Tax"],
    datasets: [
      {
        data: [20, 80],
        backgroundColor: ["#6A2CD8", "#F0EAFB"]
      }
    ]
  };

var paymentChartE1 = document.getElementById("paymentChart1");
var paymentChartE2 = document.getElementById("paymentChart2");
var paymentChartE3 = document.getElementById("paymentChart3");
var debtChartE = document.getElementById("debtChart");

var paymentChart1 = new Chart(paymentChartE1, {
    type: 'doughnut',
    data: paymentData1,
    options: {
        legend: {
            display: false           
        },
        tooltips: {enabled: false},
        hover: {mode: null},
        rotation: .9 * Math.PI
    }
});

var paymentChart2 = new Chart(paymentChartE2, {
  type: 'doughnut',
  data: paymentData2,
  options: {
      legend: {
          display: false           
      },
      tooltips: {enabled: false},
      hover: {mode: null},
      rotation: .9 * Math.PI
  }
});

var paymentChart3 = new Chart(paymentChartE3, {
  type: 'doughnut',
  data: paymentData3,
  options: {
      legend: {
          display: false           
      },
      rotation: .9 * Math.PI
  }
});

var debtChart = new Chart(debtChartE, {
    type: 'doughnut',
    data: debtData,
    options: {
        legend: {
            display: false           
        },
        rotation: 1 * Math.PI,
        circumference: 1 * Math.PI
    }
});