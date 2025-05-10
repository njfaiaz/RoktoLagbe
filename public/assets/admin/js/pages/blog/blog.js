$(function () {
    "use strict";
    setTimeout(function () {
        $(document).ready(function () {
            var chart = c3.generate({
                bindto: "#chart-bar", // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ["data1", 11, 8, 15, 18, 19, 17],
                        ["data2", 7, 7, 5, 7, 9, 12],
                        ["data3", 11, 6, 10, 17, 13, 21],
                        ["data4", 3, 12, 13, 14, 9, 18],
                        ["data5", 3, 12, 13, 14, 9, 18],
                        ["data6", 3, 12, 13, 14, 9, 18],
                        ["data7", 3, 12, 13, 14, 9, 18],
                        ["data8", 3, 12, 13, 14, 9, 18],
                    ],
                    type: "bar", // default type of chart
                    colors: {
                        data1: Aero.colors["blue"],
                        data2: Aero.colors["pink"],
                        data3: Aero.colors["cyan"],
                        data7: Aero.colors["orange"],
                        data4: Aero.colors["indigo"],
                        data5: Aero.colors["red"],
                        data6: Aero.colors["green"],
                        data8: Aero.colors["purple"],
                    },
                    names: {
                        // name of each serie
                        data1: "AB+",
                        data2: "AB-",
                        data3: "A+",
                        data4: "A-",
                        data5: "B+",
                        data6: "B-",
                        data7: "O+",
                        data8: "O-",
                    },
                },
                axis: {
                    x: {
                        type: "category",
                        // name of each category
                        categories: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec",
                        ],
                    },
                },
                bar: {
                    width: 16,
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0,
                },
            });
        });
        $(document).ready(function () {
            var chart = c3.generate({
                bindto: "#chart-donut", // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ["data1", 40],
                        ["data2", 30],
                        ["data3", 15],
                        ["data4", 10],
                        ["data5", 5],
                        ["data6", 5],
                        ["data7", 5],
                        ["data8", 5],
                    ],
                    type: "donut", // default type of chart
                    colors: {
                        data1: Aero.colors["blue"],
                        data2: Aero.colors["pink"],
                        data3: Aero.colors["cyan"],
                        data7: Aero.colors["orange"],
                        data4: Aero.colors["indigo"],
                        data5: Aero.colors["red"],
                        data6: Aero.colors["green"],
                        data8: Aero.colors["purple"],
                    },
                    names: {
                        // name of each serie
                        data1: "AB+",
                        data2: "AB-",
                        data3: "A+",
                        data4: "A-",
                        data5: "B+",
                        data6: "B-",
                        data7: "O+",
                        data8: "O-",
                    },
                },
                axis: {},
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0,
                },
            });
        });
    }, 500);
});
