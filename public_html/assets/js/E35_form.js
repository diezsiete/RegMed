
function calcularIMC(peso, altura) {
    var retorno = {
        "estadoNutricional" : "N/A",
        "IMC" : ""
    };
    if(peso && altura){
        altura = altura / 100;
        var imc = (peso / (altura * altura)).toFixed(2);

        var leyenda = "Delgadez severa";

        if(imc>=16 && imc<17)
            leyenda="Delgadez moderada";
        else if(imc>=17 && imc<18.5)
            leyenda="Delgadez leve";
        else if(imc>=18.5 && imc<25)
            leyenda="Normal";
        else if(imc>=25 && imc<30)
            leyenda="Preobeso";
        else if(imc>=30 && imc<35)
            leyenda="Obesidad leve";
        else if(imc>=35 && imc<40)
            leyenda="Obesidad media";
        else if(imc>=40)
            leyenda="Obesidad mórbida";

        retorno["estadoNutricional"] = leyenda;
        retorno["IMC"] = imc;
    }
    return retorno;
}

function setIMC(peso, talla){
    var $estadoN = $('#estado_nutricional');
    var $IMC = $("#imc");

    var calculo = calcularIMC(peso, talla);

    $estadoN.val(calculo.estadoNutricional);
    $IMC.val(calculo.IMC);
}

function disableProblemasDigestivosOtros() {
    var $checked = $('input[name="group1"]:checked');
    var $pD = $('#problema_digestivo');
    if(parseInt($checked.val()) === 1){
        $pD.val("").prop('disabled', true).hide();
    }else
        $pD.prop('disabled', false).show();
}


$(function(){
    var $peso = $('#peso');
    var $talla= $('#talla');

    $peso.change(function(){
        setIMC($peso.val(), $talla.val());
    });
    $talla.change(function(){
        setIMC($peso.val(), $talla.val());
    });

    disableProblemasDigestivosOtros();
    $('input[name="group1"]').change(function(){
        disableProblemasDigestivosOtros();
    })
});