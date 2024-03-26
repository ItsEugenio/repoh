    Chart.register(ChartDataLabels);
        Chart.defaults.set('plugins.datalabels', {
            color: '#9f2241'
        });
        const plugin = {
        id: 'customCanvasBackgroundColor',
            beforeDraw: (chart, args, options) => {
                const {ctx} = chart;
                ctx.save();
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fillStyle = options.color || '#99ffff';
                ctx.fillRect(0, 0, chart.width, chart.height);
                ctx.restore();
            }
        };

    function downloadImage(myChart, name) {
        var link = document.createElement('a');
        link.href = myChart.toBase64Image();
        link.download = name+'.png';
        link.click();
    }

    function hello(){
        console.log('hellooooo');
    }

    //LIMPIAR GRÁFICAS
    function clearChart(canva, myChart) {
        event.preventDefault();
        var parent = document.getElementById(canva);
        myChart.clear();
        myChart.destroy();
        // var child = document.getElementById('myChart');          
        // parent.removeChild(child);            
        // parent.innerHTML ='<canvas id="home" width="400" height="150"></canvas>';             
        return;
    }

    
