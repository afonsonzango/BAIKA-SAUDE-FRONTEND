const url = "http://69.10.62.213:3000";
//const url = "https://4ec1-102-214-36-112.ngrok-free.app";
//alert('ola')
var selectedDataRole;

$( document ).ready(function() {
    const health_unit = $('#health_unit').val();
    const professional_id = $('#professional_id').val();
    if (health_unit !== '') {
        document.getElementById("div-esp").style.display="black";
    }else{
        document.getElementById("div-esp").style.display="none";
    }

    var selectedDataRole = $('#health_unit').find('option:selected').attr('data-role');
    //alert(selectedDataRole)
    if (selectedDataRole == '3') {
        document.getElementById("div-prof").style.display="black";
    }else{
        document.getElementById("div-prof").style.display="none";
    }
});

$('#health_unit').on('change', function () {

    const health_unit = $('#health_unit').val();
    selectedDataRole = $(this).find('option:selected').attr('data-role');
    //const professional_id = $('#professional_id').val();
    //alert(typeof selectedDataRole);

    if (health_unit !== '') {
        //alert(9)
        document.getElementById("div-esp").style.display="block";
    }else{
        //alert(3)
        document.getElementById("div-esp").style.display="block";
    }

    if (selectedDataRole !== '3') {

        document.getElementById("div-prof").style.display="none";
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/especialidades-hospital/'+health_unit,//url+"/categorys/"+health_unit,
        type : 'GET',
        //crossDomain: true,

        dataType: 'json',
        async: false,
    })
    .done(function(response){

        console.log(response.data);
        let options = "<option value=''>Especialidades</option>";

        response.data.forEach(dta => {
            console.log(dta["name"]);
            options += "<option value="+dta['category_id']+">"+dta['name_category']+"</option>";
        });

        $("#especialty").html(options);

        console.log(options);
        console.log("msg");
    })
    .fail(function(msg){
        console.log(msg);
    });

});

$('#especialty').on('change', function (params) {
    const health_unit = $('#health_unit').val();

    const especialty = $('#especialty').val();
    //alert('esp: '+especialty+', hosp: '+health_unit);
    if (especialty == null || especialty == "") {
        //alert(typeof especialty);
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/especialistas/'+especialty+'/'+health_unit,
        type : 'GET',

        dataType: 'json',
        async: false,
    })
    .done(function(response){
        console.log(response.data);
        let options = "<option value=''>Especialistas</option>";

        response.data.forEach(dta => {
            console.log(dta["name"]);
            options += "<option value="+dta['professional_id']+">"+dta['name']+"</option>";
        });

        $("#professional_id").html(options);
        //alert(selectedDataRole)
        if (selectedDataRole == '3') {

            document.getElementById("div-prof").style.display="block";
        }else{

            document.getElementById("div-prof").style.display="none";
        }
        console.log(options);
        console.log("msg");
    })
    .fail(function(msg){
        console.log(msg);
    });

});


