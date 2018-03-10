/* ------------------------------------------------------------------------------
 *
 *  # C3.js - lines and areas
 *
 *  Demo setup of line, step and area charts
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

function reporte(nota_1,nota_2,nota_3,nota_4){
    // Line chart
    // ------------------------------
 var line_chart = c3.generate({
        bindto: '#c3-line-chart',
        point: { 
            r: 5   
        },
        size: { height: 250 },
        color: {
            pattern: ['#4CAF50', '#F4511E', '#1E88E5','#C010EC']
        },		
		"ajax":{
			method:"POST",
			url:"marcelo.php",
		},
        data: {			
            columns: [
                ['Primer Bimestre', 0,nota_1],
				['Segundo Bimestre', 0,nota_2],
				['Tercero Bimestre', 0,nota_3],
				['Cuarto Bimestre', 0,nota_4]
            ],
            type: 'spline'
        },
        grid: {
            y: {
                show: true
            }
        }
    });		 
    // Generate chart
    // Resize chart on sidebar width change
    $(".sidebar-control").on('ready', function() {
        line_chart.resize();
        chart_line_regions.resize();
        area_chart.resize();
        area_stacked_chart.resize();
        step_chart.resize();
    });
};
function reporte_g(suma_1,suma_2,suma_3,suma_4){
    // Line chart
    // ------------------------------
 var line_chart = c3.generate({
        bindto: '#c3-line-chart',
        point: { 
            r: 5   
        },
        size: { height: 250 },
        color: {
            pattern: ['#4CAF50', '#F4511E', '#1E88E5','#C010EC']
        },		
		"ajax":{
			method:"POST",
			url:"marcelo.php",
		},
        data: {			
            columns: [
                ['Promedio de Notas', suma_1,suma_2,suma_3,suma_4]
            ],
            type: 'spline'
        },
        grid: {
            y: {
                show: true
            }
        }
    });		 
    // Generate chart
    // Resize chart on sidebar width change
    $(".sidebar-control").on('ready', function() {
        line_chart.resize();
        chart_line_regions.resize();
        area_chart.resize();
        area_stacked_chart.resize();
        step_chart.resize();
    });
};