// User Status & Count ----------------------------------------------------------------

fetch("/api/dashboard/user-stats")
    .then((response) => response.json())
    .then((result) => {
        const total = result.data.reduce((a, b) => a + b, 0);
        const ctx = document.getElementById("userChart");
        new Chart(ctx, {
            type: "pie",
            data: {
                labels: result.labels,
                datasets: [
                    {
                        data: result.data,
                        backgroundColor: ["#4CAF50", "#F44336"],
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: "Active vs Inactive Users",
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const label = context.label || "";
                                const value = context.raw || 0;
                                const percentage = (
                                    (value / total) *
                                    100
                                ).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            },
                        },
                    },
                },
            },
        });
    });

// Blood Group Name --------------------------------------------------------------------

fetch("/api/dashboard/blood-group-stats")
    .then((response) => response.json())
    .then((result) => {
        const total = result.data.reduce((a, b) => a + b, 0);
        const ctx = document.getElementById("bloodGroupChart");

        new Chart(ctx, {
            type: "pie",
            data: {
                labels: result.labels,
                datasets: [
                    {
                        data: result.data,
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#4BC0C0",
                            "#9966FF",
                            "#FF9F40",
                            "#8BC34A",
                            "#E91E63",
                        ],
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: "User Blood Group Distribution",
                    },
                    legend: {
                        position: "bottom",
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const label = context.label || "";
                                const value = context.raw || 0;
                                const percentage = (
                                    (value / total) *
                                    100
                                ).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            },
                        },
                    },
                },
            },
        });
    });

//  Address With Blood Name --------------------------------------------------------------

fetch("/api/dashboard/user-location-stats")
    .then((response) => response.json())
    .then((result) => {
        const ctx = document.getElementById("locationChart");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: result.labels,
                datasets: result.datasets,
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: "User Blood Group Count by District",
                    },
                    legend: {
                        position: "bottom",
                    },
                    tooltip: {
                        mode: "index",
                        intersect: false,
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                        },
                    },
                },
            },
        });
    });

// Top 10 Blood Donar Name List -------------------------------------------------------

fetch("/api/dashboard/top-donors")
    .then((response) => response.json())
    .then((result) => {
        const ctx = document.getElementById("topDonorChart");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: result.labels,
                datasets: [
                    {
                        label: "Total Donations",
                        data: result.data,
                        backgroundColor: "rgba(255, 99, 132, 0.6)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                indexAxis: "y", // horizontal bar
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: "Top 10 Blood Donors",
                    },
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.label}: ${context.raw} donations`;
                            },
                        },
                    },
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            stepSize: 1,
                        },
                    },
                },
            },
        });
    });

// Most Common Blood Group Name -----------------------------------------------------------
fetch("/api/dashboard/blood-donation-stats")
    .then((response) => response.json())
    .then((result) => {
        const ctx = document.getElementById("bloodDonationChart");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: result.labels,
                datasets: [
                    {
                        label: "Total Donations",
                        data: result.donations,
                        backgroundColor: "rgba(255, 99, 132, 0.6)",
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: "Blood Group-wise Donations & Donors",
                    },
                    legend: {
                        position: "bottom",
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                        },
                    },
                },
            },
        });
    });
