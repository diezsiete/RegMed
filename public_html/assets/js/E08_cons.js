//console.log(arregloSignos);
var results = 0;
$("#pintar").click(function(){

    if($("#ult10").is(":checked")){
        results = arregloSignos.length-10;
    }
    if($("#ult100").is(":checked")){
        results = arregloSignos.length-100;
    }
    results = (results < 0? 0:results);

    var cbselec = 0;
    if($("#tensart").is(":checked")){
        cbselec++;
    }
    if($("#freqcar").is(":checked")){
        cbselec++;
    }
    if($("#sat").is(":checked")){
        cbselec++;
    }
    if($("#peso").is(":checked")){
        cbselec++;
    }
    if(cbselec>0){
        var divs = 12/cbselec;
        $("#areaGrafica").empty();
        if($("#horizontal").is(":checked")){

            if($("#tensart").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-"+divs+"'><div id='graficaTensArt'></div></div>");
                dibujarTensArt("graficaTensArt");
            }
            if($("#freqcar").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-"+divs+"' ><div id='graficaFreqCar'></div></div>");
                dibujarFreqCar("graficaFreqCar");
            }
            if($("#sat").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-"+divs+"' ><div id='graficaSat'></div></div>");
                dibujarSat("graficaSat");
            }
            if($("#peso").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-"+divs+"' ><div id='graficaPeso'></div></div>");
                dibujarPeso("graficaPeso");
            }
        }

        if($("#vertical").is(":checked")){
            if($("#tensart").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-12'><div id='graficaTensArt'></div></div>");
                dibujarTensArt("graficaTensArt");
            }
            if($("#freqcar").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-12'><div id='graficaFreqCar'></div></div>");
                dibujarFreqCar("graficaFreqCar");
            }
            if($("#sat").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-12'><div id='graficaSat'></div></div>");
                dibujarSat("graficaSat");
            }
            if($("#peso").is(":checked")){
                $("#areaGrafica").append("<div class='col-md-12'><div id='graficaPeso'></div></div>");
                dibujarPeso("graficaPeso");
            }



        }
    }

});

function dibujarTensArt(div){
    var arTensArt = [];
    for(var i=results; i<arregloSignos.length;i++){
        if(arregloSignos[i].tensionArterial != null && arregloSignos[i].tensionArterial != ""){
            try{
                if(typeof arregloSignos[i].tensionArterial.split("/")[1] != "undefined"){ //Por si el formato de tension arterial (d+/d+, en notacion regex) no es correcto
                    arTensArt.push(
                        {x:arregloSignos[i].fecha, t1:arregloSignos[i].tensionArterial.split("/")[0], t2:arregloSignos[i].tensionArterial.split("/")[1]}
                    );
                }
            }catch(err){
                console.log("No es posible graficar tensión arterial: "+err);
            }

        }
    }
    Morris.Line({
        element: div,
        data: arTensArt,
        xkey: 'x',
        ykeys: ['t1','t2'],
        labels: ['Tensión Arterial Sistólica','Tensión Arterial Diastólica'],
        lineColors: ["#DA7A01","#2A8500"]
    });
}

function dibujarFreqCar(div){
    var arFreqCar = [];
    for(var i=results; i<arregloSignos.length;i++){
        if(arregloSignos[i].FrecuenciaCardiaca != null){
            arFreqCar.push(
                {x:arregloSignos[i].fecha, f:arregloSignos[i].FrecuenciaCardiaca}
            );
        }
    }
    Morris.Line({
        element: div,
        data: arFreqCar,
        xkey: 'x',
        ykeys: ['f'],
        labels: ['Frecuencia Cardiaca']
    });
}

function dibujarSat(div){
    var arSat = [];
    for(var i=results; i<arregloSignos.length;i++){
        if(arregloSignos[i].Saturacion != null){
            arSat.push(
                {x:arregloSignos[i].fecha, f:arregloSignos[i].Saturacion}
            );
        }
    }
    Morris.Line({
        element: div,
        data: arSat,
        xkey: 'x',
        ykeys: ['f'],
        labels: ['Saturación'],
        lineColors: ["#C60900"]
    });
}

function dibujarPeso(div){
    var arPeso = [];
    for(var i=results; i<arregloSignos.length;i++){
        if(arregloSignos[i].Peso != null){
            arPeso.push(
                {x:arregloSignos[i].fecha, f:arregloSignos[i].Peso}
            );
        }
    }
    Morris.Line({
        element: div,
        data: arPeso,
        xkey: 'x',
        ykeys: ['f'],
        labels: ['Peso (kg)'],
        lineColors: ["#BB01DA"]
    });
}