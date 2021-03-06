var config= {
    type:"line",
    data: {
        labels:["January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "Augest",
        "September"],
        datasets:[ {
            label: "Conversion Rate", fill: !1, backgroundColor: "#4eb7eb", borderColor: "#4eb7eb", data: [44, 60, -33, 58, -4, 57, -89, 60, -33, 58, -22, 35]
        }
        ,
        {
            label: "Average Sale Value", fill: !1, backgroundColor: "#e3eaef", borderColor: "#e3eaef", borderDash: [5, 5], data: [-68, 41, 86, -49, 2, 65, -64, 86, -49, 2, -8, 41]
        }
        ]
    }
    ,
    options: {
        responsive:!0,
        tooltips: {
            mode: "index", intersect: !1
        }
        ,
        hover: {
            mode: "nearest", intersect: !0
        }
        ,
        scales: {
            xAxes:[ {
                display:!0,
                gridLines: {
                    color: "rgba(0,0,0,0.1)"
                }
            }
            ],
            yAxes:[ {
                gridLines: {
                    color: "rgba(255,255,255,0.05)", fontColor: "#fff"
                }
                ,
                ticks: {
                    max: 100, min: -100, stepSize: 20
                }
            }
            ]
        }
    }
}

;
// window.onload=function() {
//     var e=document.getElementById("lineChart").getContext("2d");
//     window.myLine=new Chart(e, config)
// }

// ,
// $(document).ready(function() {
//     map=new GMaps( {
//         el:"#gmaps-markers", lat:-12.043333, lng:-77.028333, zoomControl:!0, zoomControlOpt: {
//             style: "SMALL", position: "TOP_LEFT"
//         }
//         , panControl:!1, streetViewControl:!1, mapTypeControl:!1, overviewMapControl:!1
//     }
//     )
// }

// ),
$(".mfp-image").magnificPopup( {
    type:"image", mainClass:"mfp-with-zoom", gallery: {
        enabled: !0, navigateByImgClick: !0, preload: [0, 1]
    }
}

),
$(".dropify").dropify();