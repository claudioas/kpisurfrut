window.onload = function () {


let data_kpi1
$.ajax({
  url: base_url+'home/kpi1',
  type: 'POST',
  dataType: 'json'
})
.done(function(data) {
  $('.porc_kpi1').prepend(`<div style='color: ${data[0]['color']}'><p><h1>${data[0]['y']}%</h1> <b>Cumplido</b></p></div> `);

	  console.log(data);
	var chart1 = new CanvasJS.Chart("kpi1", {
		title:{
			// text: `<span class'card-title'>KPI 1 : Tiempo de espera para pasar a hidrocooler (% DE CUMPLIMIENTO)</span>`
		},
		data: [
		{
			type: "pie",
			dataPoints: data
		}
		]
	});
	chart1.render();

  $(".canvasjs-chart-credit").hide();

  console.log("success home/kpi1");
})
.fail(function(data) {
  console.log(data);
  console.log("error home/kpi1");
});

let data_kpi2
let porc_kpi1
$.ajax({
  url: base_url+'home/kpi2',
  type: 'POST',
  dataType: 'json'
})
.done(function(data) {
	  console.log(data);
	var chart2 = new CanvasJS.Chart("kpi2", {
		title:{
			// text: "KPI2 - Tiempo de espera para pasar a proceso (% DE KILOS)"
		},
		data: [
		{
			type: "column",
			dataPoints:data
		}
		]
	});
	chart2.render();
  $(".canvasjs-chart-credit").hide();
  console.log("success home/kpi1");
})
.fail(function(data) {
  console.log(data);
  console.log("error home/kpi1");
});




let data_kpi3
$.ajax({
  url: base_url+'home/kpi1',
  type: 'POST',
  dataType: 'json'
})
.done(function(data) {

	  console.log(data);
	var chart3 = new CanvasJS.Chart("kpi3", {
		title:{
			text: "KPI 3 Y 4 - % DE NO CUMPLIMIENTO"
		},
		data: [
		{
			type: "column",
			dataPoints: [
			{ label: 'SANITIZACION CLORO Y VACIADO (50-80 ppm)', y: 0 },
						{ label: 'SANITIZACION CLORO CORTA PEDICELOS (50-80 ppm)', y: 0 },
									{ label: 'T° AGUA POZO VACIADO (<7°C)', y: 0 },
												{ label: 'T° AGUA POZO FUNGICIDA (> 2°C)', y: 20 },
															{ label: 'T° PULPA ENTRADA CORTADOR (<7°C)', y: 0 },
																		{ label: 'T° PULPA AL SELLADO (>7°C)', y: 0 }
			]
		}
		]
	});
	chart3.render();



  console.log("success home/kpi1");
})
.fail(function(data) {
  console.log(data);
  console.log("error home/kpi1");
});

        // var chart2 = new CanvasJS.Chart("kpi2", {
        //   axisX:{
        //     title : "Valores en X"
        //   },
        //   axisY:{
        //   title : "Valores en Y"
        //  },
        //   title:{
        //     text: "Titulo del KPI N°2"
        //   },
        //     data: [
        //     {
        //         type: "area",
        //         legendText: "Oranges",
        //         showInLegend: true,
        //         dataPoints: [
        //         { x: 10, y: 101 },
        //         { x: 20, y: 15 },
        //         { x: 30, y: 22 },
        //         { x: 40, y: 30 },
        //         { x: 50, y: 28 }
        //         ]
        //     }
        //     ]
        // });
        // chart2.render();
        // var chart3 = new CanvasJS.Chart("kpi3", {
        //   axisX:{
        //     title : "Valores en X"
        //   },
        //   axisY:{
        //     title : "Valores en Y"
        //    },
        //   title:{
        //     text: "Titulo del KPI N°3"
        //   },
        //     data: [
        //     {
        //         type: "column",
        //         legendText: "Oranges",
        //         showInLegend: true,
        //         dataPoints: [
        //         { x: 10, y: 121 },
        //         { x: 20, y: 15 },
        //         { x: 30, y: 212 },
        //         { x: 40, y: 30 },
        //         { x: 50, y: 28 }
        //         ]
        //     }
        //     ]
        // });
        // chart3.render();
        // var chart4 = new CanvasJS.Chart("kpi4", {
        //   axisX:{
        //     title : "Valores en X"
        //   },
        //   axisY:{
        //   title : "Valores en Y"
        //  },
        //   title:{
        //     text: "Titulo del KPI N°4"
        //   },
        //     data: [
        //     {
        //         type: "column",
        //         legendText: "Oranges",
        //         showInLegend: true,
        //         dataPoints: [
        //         { x: 10, y: 151 },
        //         { x: 20, y: 15 },
        //         { x: 30, y: 21 },
        //         { x: 40, y: 30 },
        //         { x: 50, y: 28 }
        //         ]
        //     }
        //     ]
        // });
        // chart4.render();
    }
