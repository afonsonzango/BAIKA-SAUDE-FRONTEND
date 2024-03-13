const url = "http://69.10.62.213:3000";
//const url = "https://4ec1-102-214-36-112.ngrok-free.app";

$( document ).ready(function() {
    const health_unit = $('#health_unit').val();

    var selectedDataRole = $('#health_unit').find('option:selected').attr('data-role');
    //alert(selectedDataRole)
    if (selectedDataRole == '3') {
        document.getElementById("div-prof").style.display="none";
    }else{
        document.getElementById("div-prof").style.display="block";
    }
});

$('#health_unit').on('change', function () {

    const health_unit = $('#health_unit').val();
    var selectedDataRole = $(this).find('option:selected').attr('data-role');
    //alert(typeof selectedDataRole);
    if (health_unit == null || health_unit == "") {
        //alert(typeof health_unit);
        return;
    }
    if (selectedDataRole == '3') {

        document.getElementById("div-prof").style.display="none";
    }else{

        document.getElementById("div-prof").style.display="block";
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
    //alert(especialty);
    if (especialty == null || especialty == "") {
        //alert(typeof especialty);
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url+"/professionals/"+especialty+"/"+health_unit,
        type : 'GET',

        dataType: 'json',
        async: false,
    })
    .done(function(data){

        let options = "<option value=''>Especialistas</option>";
        console.log(data);
        data.forEach(dta => {
            console.log(dta["name"]);
            options += "<option value="+dta['prof_id']+">"+dta['name']+"</option>";
        });

        $("#professionals").html(options);

        console.log(options);
        console.log("msg");
    })
    .fail(function(msg){
        console.log(msg);
    });

});


