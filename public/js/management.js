const url = "http://69.10.62.213:3000";

$( document ).ready(function() {

});
$('#verticalycentered').on('hidden.bs.modal', function () {
    $('#alert').hide();
    window.location.reload();
});

let isRequesting = false;

$("#btn-addHealthUnit").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddHealthUnit"]').submit(function (event) {
        event.preventDefault();

        let name = $(this).find("input#name").val();
        let phoneNumber = $(this).find("input#phoneNumber").val();
        let email = $(this).find("input#email").val();
        let img = $('input[type="file"]')[0].files[0];
        let name_street = $(this).find("input#name_street").val();
        let sub_organic_unity_id = $(this).find("select#sub_organic_unity_id").val();
        let health_unit_county_id = $(this).find("select#health_unit_county_id").val();
        let health_unit_country_id = $(this).find("select#health_unit_country_id").val();
        let health_unit_province_id = $(this).find("select#health_unit_province_id").val();
        let longuitude = $(this).find("input#longuitude").val();
        let latitude = $(this).find("input#latitude").val();
        let description = $(this).find("input#description").val();
        let health_unit_province = $(this).find("input#health_unit_province").val();
        let health_unit_county = $(this).find("input#health_unit_county").val();

        let formData = new FormData();
        formData.append('name',name);
        formData.append('phoneNumber',phoneNumber);
        formData.append('email',email);
        formData.append('img',img);
        formData.append('name_street',name_street);
        formData.append('sub_organic_unity_id',sub_organic_unity_id);
        formData.append('longuitude',longuitude);
        formData.append('latitude',latitude);
        formData.append('description',description);
        formData.append('health_unit_county_id',health_unit_county_id);
        formData.append('health_unit_country_id',health_unit_country_id);
        formData.append('health_unit_province_id',health_unit_province_id);
        formData.append('health_unit_province',health_unit_province);
        formData.append('health_unit_county',health_unit_county);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/registar-unidade-sanitaria',
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })

    })
});


$("#btn-addProfessional").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddProfessional"]').submit(function (event) {
        event.preventDefault();

        let name = $(this).find("input#name").val();
        let phoneNumber = $(this).find("input#phoneNumber").val();
        let email = $(this).find("input#email").val();
        let date = $(this).find("input#date").val();
        //let img = $(this).find("input#img").val();
        let img = $('input[type="file"]')[0].files[0];
        let name_street = $(this).find("input#name_street").val();
        let clinical_state_id = $(this).find("select#clinical_state_id").val();
        let organic_unity_id = $(this).find("select#organic_unity_id").val();
        let educationalInstitution = $(this).find("input#educationalInstitution").val();
        let gender = $(this).find("select#gender").val();
        let type_professional = $(this).find("select#type_professional").val();
        let professionalLicenseNumber = $(this).find("input#professionalLicenseNumber").val();
        let languages = $(this).find("select#languages").val();
        let languages2 = $(this).find("select#languages2").val();
        let experiences = $(this).find("input#experiences").val();
        let categorys = $(this).find("select#categorys").val();
        let categorys2 = $(this).find("select#categorys2").val();
        let identification = $(this).find("input#identification").val();
        let academiclevel_id = $(this).find("select#academiclevel_id").val();identification
        let description = $(this).find("input#description").val();
        //let academicLevel = $(this).find("input#academicLevel").val();
        let health_unit_county_id = $(this).find("select#health_unit_county_id").val();
        let health_unit_country_id = $(this).find("select#health_unit_country_id").val();
        let health_unit_province_id = $(this).find("select#health_unit_province_id").val();
        let health_unit_province = $(this).find("input#health_unit_province").val();
        let health_unit_county = $(this).find("input#health_unit_county").val();

        let formData = new FormData();
        formData.append('name',name);
        formData.append('phoneNumber',phoneNumber);
        formData.append('email',email);
        formData.append('date',date);
        formData.append('img',img);
        formData.append('name_street',name_street);
        formData.append('languages',languages);
        formData.append('languages2',languages2);
        formData.append('gender',gender);
        formData.append('experiences',experiences);
        formData.append('type_professional',type_professional);
        formData.append('educationalInstitution',educationalInstitution);
        formData.append('description',description);
        formData.append('categorys',categorys);
        formData.append('categorys2',categorys2);
        formData.append('professionalLicenseNumber',professionalLicenseNumber);
        formData.append('clinical_state_id',clinical_state_id);
        formData.append('organic_unity_id',organic_unity_id);
        formData.append('academiclevel_id',academiclevel_id);
        formData.append('identification',identification);
        formData.append('health_unit_county_id',health_unit_county_id);
        formData.append('health_unit_country_id',health_unit_country_id);
        formData.append('health_unit_province_id',health_unit_province_id);
        formData.append('health_unit_province',health_unit_province);
        formData.append('health_unit_county',health_unit_county);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/registar-profissional',
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddProfessional"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});


$("#btn-addAllergy").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddAllergy"]').submit(function (event) {
        event.preventDefault();

        let name = $(this).find("input#name").val();
        let formData = new FormData();
        formData.append('name',name);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-alergia',
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,//{'name': name},
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddAllergy"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })

    })
});


$("#btn-addChronic").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddChronic"]').submit(function (event) {
        event.preventDefault();

        let name = $(this).find("input#name").val();
        let formData = new FormData();
        formData.append('name',name);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-doenca-cronica',
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,//{'name': name},
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddAllergy"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })

    })
});


$("#btn-addFaq").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddFaq"]').submit(function (event) {
        event.preventDefault();

        let question = $(this).find("input#question").val();
        let answer = $(this).find("input#answer").val();
        let formData = new FormData();
        formData.append('question',question);
        formData.append('answer',answer);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-faq',
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,//{'name': name},
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddFaq"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })

    })
});

$("#btn-addNews").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddNews"]').submit(function (event) {
        event.preventDefault();

        let title = $(this).find("input#title").val();
        let imageNetwork = $('input[type="file"]')[0].files[0];
        let description = $(this).find("input#description").val();

        let formData = new FormData();
        formData.append('title',title);
        formData.append('imageNetwork',imageNetwork);
        formData.append('description',description);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-noticias',
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-updateNews").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddNews"]').submit(function (event) {
        event.preventDefault();

        let news_id = $(this).find("input#news_id").val();
        let title = $(this).find("input#title").val();
        let imageNetwork = $('input[type="file"]')[0].files[0];
        let description = $(this).find("input#description").val();

        let formData = new FormData();
        formData.append('title',title);
        formData.append('imageNetwork',imageNetwork);
        formData.append('description',description);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/editar-noticia/'+news_id,
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$( document ).ready(function() {
    const country_id = $('#health_unit_country_id').val();
    const area_id = $('#medical_area_id').val();
    //alert(country_id)
    /*if (area_id=="") {
        document.getElementById("categorys").style.display="none";
        document.getElementById("categorys2").style.display="none";
    }*/

    if (country_id == '') {
       
        document.getElementById("d-health_unit_county").style.display="none";
        document.getElementById("d-health_unit_province").style.display="none";
        document.getElementById("d-health_unit_county").style.display="none";

        document.getElementById("d-health_unit_county_id").style.display="none";
        document.getElementById("d-health_unit_province_id").style.display="none";
        document.getElementById("d-health_unit_county_id").style.display="none";

    }else if(country_id == '6'){
        document.getElementById("d-health_unit_county").style.display="none";
        document.getElementById("d-health_unit_province").style.display="none";
        document.getElementById("d-health_unit_county").style.display="none";

        document.getElementById("d-health_unit_county_id").style.display="block";
        document.getElementById("d-health_unit_province_id").style.display="block";
        document.getElementById("d-health_unit_county_id").style.display="block";
    }else{
        
        document.getElementById("d-health_unit_county_id").style.display="none";
        document.getElementById("d-health_unit_province_id").style.display="none";
        document.getElementById("d-health_unit_county_id").style.display="none";

        document.getElementById("d-health_unit_county").style.display="block";
        document.getElementById("d-health_unit_province").style.display="block";
        document.getElementById("d-health_unit_county").style.display="block";
    }


});

$('#health_unit_country_id').on('change', function () {

    const country_id = $('#health_unit_country_id').val();
    
    if (country_id == '') {
        document.getElementById("d-health_unit_county").style.display="none";
        document.getElementById("d-health_unit_province").style.display="none";
        document.getElementById("d-health_unit_county").style.display="none";

        document.getElementById("d-health_unit_county_id").style.display="none";
        document.getElementById("d-health_unit_province_id").style.display="none";
        document.getElementById("d-health_unit_county_id").style.display="none";

    }else if(country_id == '6'){

        document.getElementById("d-health_unit_county").style.display="none";
        document.getElementById("d-health_unit_province").style.display="none";
        document.getElementById("d-health_unit_county").style.display="none";

        document.getElementById("d-health_unit_county_id").style.display="block";
        document.getElementById("d-health_unit_province_id").style.display="block";
        document.getElementById("d-health_unit_county_id").style.display="block";


    }else{
        document.getElementById("d-health_unit_county_id").style.display="none";
        document.getElementById("d-health_unit_province_id").style.display="none";
        document.getElementById("d-health_unit_county_id").style.display="none";

        document.getElementById("d-health_unit_county").style.display="block";
        document.getElementById("d-health_unit_province").style.display="block";
        document.getElementById("d-health_unit_county").style.display="block";

    }
    if(country_id == '6'){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/provincias/'+country_id,//url+"/categorys/"+health_unit,
            type : 'GET',
            //crossDomain: true,

            dataType: 'json',
            async: false,
        })
        .done(function(response){

            console.log(response);
            let options = "<option value=''>Selecione a província</option>";

            response.forEach(dta => {
                console.log(dta["name"]);
                options += "<option value="+dta['id']+">"+dta['name']+"</option>";
            });

            $("#health_unit_province_id").html(options);

            console.log(options);

        })
        .fail(function(msg){
            console.log(msg);
        });
    }
});


$('#health_unit_province_id').on('change', function () {

    const country_id = $('#health_unit_country_id').val();
    const province_id = $('#health_unit_province_id').val();
    //alert(country_id)

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/gerenciamento/municipios/'+country_id+'/'+province_id,//url+"/categorys/"+health_unit,
        type : 'GET',
        //crossDomain: true,

        dataType: 'json',
        async: false,
    })
    .done(function(response){

        console.log(response);
        let options = "<option value=''>Selecione um município</option>";

        response.forEach(dta => {
            console.log(dta["name"]);
            options += "<option value="+dta['id']+">"+dta['name']+"</option>";
        });

        $("#health_unit_county_id").html(options);

        console.log(options);

    })
    .fail(function(msg){
        console.log(msg);
    });

});


$('#medical_area_id').on('change', function () {

    const area_id = $('#medical_area_id').val();
    //alert(area_id)
    if (area_id != "") {
        document.getElementById("specialties").style.display="block";
    }
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/gerenciamento/especialidades-medicas/'+area_id,//url+"/categorys/"+health_unit,
        type : 'GET',
        //crossDomain: true,

        dataType: 'json',
        async: false,
    })
    .done(function(response){

        console.log(response);
        let options = "<option value=''>Selecione especialidade</option>";

        response.forEach(dta => {
            console.log(dta["name"]);
            options += "<option value="+dta['id']+">"+dta['name']+"</option>";
        });

        $("#categorys").html(options);
        $("#categorys2").html(options);

        console.log(options);

    })
    .fail(function(msg){
        console.log(msg);
    });

});



$("#btn-deleteHealthUnit").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formDeleteHealthUnit"]').submit(function (event) {
        event.preventDefault();
        let health_unity_id = $(this).find("input#health_unity_id").val();
        //alert(health_unity_id);
        //return
        /*let title = $(this).find("input#title").val();
        let imageNetwork = $('input[type="file"]')[0].files[0];
        let description = $(this).find("input#description").val();

        let formData = new FormData();
        formData.append('title',title);
        formData.append('imageNetwork',imageNetwork);
        formData.append('description',description);
        console.log(formData);*/

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/eliminar-unidade-sanitaria/'+health_unity_id,
            type : 'POST',
            //enctype: 'multipart/form-data',
            cache: false,
            //contentType: false,
            //processData: false,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formDeleteHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-deleteNews").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formDeleteNews"]').submit(function (event) {
        event.preventDefault();
        let news_id = $(this).find("input#news_id2").val();
        //alert(news_id);
        //return

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/eliminar-noticia/'+news_id,
            type : 'POST',
            cache: false,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert2-text").html(data['message']);
            $('#alert2').removeClass('alert-danger');
            $('#alert2').addClass('alert-success');
            $('#alert2').show();

            $('form[name="formDeleteNews"]')[0].reset();

            setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert2-text").html(message['message']);
            $('#alert2').removeClass('alert-success');
            $('#alert2').addClass('alert-danger');
            $('#alert2').show();

        })
    })
});

$("#btn-addMedicalArea").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddMedicalArea"]').submit(function (event) {
        event.preventDefault();
        //alert()
        //return
        let name = $(this).find("input#name").val();
        
        /* formData = new FormData();
        formData.append('name',name);
        formData.append('medical_area_id',medical_area_id);
        console.log(formData);*/

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-area-medica',
            type : 'POST',
            //enctype: 'multipart/form-data',
            //cache: false,
            //contentType: false,
            //processData: false,
            //data: formData,
            data:{
                'name': name,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddmedicalArea"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-updateMedicalArea").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddMedicalArea"]').submit(function (event) {
        event.preventDefault();
        
        let area_id = $(this).find("input#area_id").val();
        let name = $(this).find("input#name").val();

        /*let formData = new FormData();
        formData.append('name',name);
        formData.append('medical_area_id',medical_area_id);*/

        //console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/editar-area-medica/'+area_id,
            type : 'POST',
            //cache: false,
            //contentType: false,
            //processData: false,
            data:{
                'name': name,
                'area_id': area_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddMedicalArea"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});


$("#btn-deleteMedicalArea").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formDeleteMedicalArea"]').submit(function (event) {
        event.preventDefault();
        let area_id = $(this).find("input#medical_area_id").val();


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/eliminar-area-medica/'+area_id,
            type : 'POST',
            cache: false,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            /*console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formDeleteSpecialtie"]')[0].reset();*/

            setTimeout(window.location.reload(), 1000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});


$("#btn-addSpecialtie").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddSpacialtie"]').submit(function (event) {
        event.preventDefault();
        //alert()
        //return
        let name = $(this).find("input#name").val();
        let medical_area_id = $(this).find("select#medical_area_id").val();
        
        /* formData = new FormData();
        formData.append('name',name);
        formData.append('medical_area_id',medical_area_id);
        console.log(formData);*/

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-especialidade',
            type : 'POST',
            //enctype: 'multipart/form-data',
            //cache: false,
            //contentType: false,
            //processData: false,
            //data: formData,
            data:{
                'name': name,
                'medical_area_id': medical_area_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddSpacialtie"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-updateSpecialtie").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddSpacialtie"]').submit(function (event) {
        event.preventDefault();
        
        let specialtie_id = $(this).find("input#specialtie_id").val();
        let name = $(this).find("input#name").val();
        let medical_area_id = $(this).find("select#medical_area_id").val();

        /*let formData = new FormData();
        formData.append('name',name);
        formData.append('medical_area_id',medical_area_id);*/

        //console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/editar-especialidade/'+specialtie_id,
            type : 'POST',
            //cache: false,
            //contentType: false,
            //processData: false,
            data:{
                'name': name,
                'medical_area_id': medical_area_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});


$("#btn-deleteSpecialtie").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formDeleteSpecialtie"]').submit(function (event) {
        event.preventDefault();
        let specialtie_id = $(this).find("input#specialtie_id").val();


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/eliminar-especialidade/'+specialtie_id,
            type : 'POST',
            cache: false,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            /*console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formDeleteSpecialtie"]')[0].reset();*/

            setTimeout(window.location.reload(), 1000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});


$("#btn-updatePassword").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formUpdatePassword"]').submit(function (event) {
        event.preventDefault();
       
        let old_password = $(this).find("input#old_password").val();
        let new_password = $(this).find("input#new_password").val();
        let renew_password = $(this).find("input#renew_password").val();
        
        let formData = new FormData();
        formData.append('old_password',old_password);
        formData.append('new_password',new_password);
        formData.append('renew_password',renew_password);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/trocar-senha',
            type : 'POST',
            //enctype: 'multipart/form-data',
            //cache: false,
            //contentType: false,
            //processData: false,
            data:{
                'old_password':old_password,
                'new_password':new_password,
                'renew_password':renew_password,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formUpdatePassword"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

function displayFileName() {
    // Obtém o elemento de entrada de arquivo
    
    var fileInput = document.getElementById('fileInput');
    
    // Obtém o elemento de exibição do nome do arquivo
    var fileNameDisplay = document.getElementById('fileNameDisplay');
    
    // Verifica se um arquivo foi selecionado
    if (fileInput.files.length > 0) {
        // Atualiza o texto de exibição com o nome do arquivo
        fileNameDisplay.textContent = 'Arquivo selecionado: ' + fileInput.files[0].name;

        $('#image_save').removeClass('d-none');
    } else {
        // Se nenhum arquivo for selecionado, limpa o texto de exibição
        fileNameDisplay.textContent = '';
    }
}

$("#btn-changeImage").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formChangeImage"]').submit(function (event) {
        event.preventDefault();
        //alert(7)
       
        let img = $('input[type="file"]')[0].files[0];
        
        let formData = new FormData();
        
        formData.append('img',img);
        //console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/trocar-imagem',
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            /*console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formUpdatePassword"]')[0].reset();*/

            setTimeout(window.location.reload(), 1000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert2-text").html(message['message']);
            $('#alert2').removeClass('alert-success');
            $('#alert2').addClass('alert-danger');
            $('#alert2').show();

        })
    })
});

$("#btn-addClinicalDatas").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddClinicalDatas"]').submit(function (event) {
        event.preventDefault();

        let user_id = $(this).find("input#user_id").val();
        let chronicdiseases = $(this).find("select#chronicdiseases").val();
        let chronicdiseases2 = $(this).find("select#chronicdiseases2").val();
        let surgerys = $(this).find("select#surgerys").val();
        let allergys = $(this).find("select#allergys").val();
        let allergys2 = $(this).find("select#allergys2").val();
        let bload_group_id = $(this).find("select#bload_group_id").val();

        let formData = new FormData();
        formData.append('user_id',user_id);
        formData.append('chronicdiseases',chronicdiseases);
        formData.append('chronicdiseases2',chronicdiseases2);
        formData.append('surgerys',surgerys);
        formData.append('allergys',allergys);
        formData.append('allergys2',allergys2);
        formData.append('bload_group_id',bload_group_id);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/adicionar-dados-clinicos',
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddDataClinics"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-updateClinicalDatas").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formAddClinicalDatas"]').submit(function (event) {
        event.preventDefault();

        let news_id = $(this).find("input#news_id").val();
        let title = $(this).find("input#title").val();
        let imageNetwork = $('input[type="file"]')[0].files[0];
        let description = $(this).find("input#description").val();

        let formData = new FormData();
        formData.append('title',title);
        formData.append('imageNetwork',imageNetwork);
        formData.append('description',description);
        //formData.append('academicLevel',academicLevel);
        console.log(formData);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/editar-noticia/'+news_id,
            type : 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formAddHealthUnit"]')[0].reset();

            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});

$("#btn-deleteAppointmentSchedule").on('click',function() {
    if (isRequesting) {
        return;
    }

    isRequesting = true;

    $('form[name="formDeleteAppointmentSchedule"]').submit(function (event) {
        event.preventDefault();
        let schedule_id = $(this).find("input#schedule_id").val();

        //alert(schedule_id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/gerenciamento/eliminar-agenda-consulta/'+schedule_id,
            type : 'POST',
            cache: false,
            dataType: 'json',
            async: false,
        })
        .done(function(data){
            /*console.log(data['message']);
            $("#alert-text").html(data['message']);
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $('#alert').show();

            $('form[name="formDeleteSpecialtie"]')[0].reset();*/

            setTimeout(window.location.reload(), 1000);
        })
        .fail(function(data){
            let message = data.responseJSON;
            $("#alert-text").html(message['message']);
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $('#alert').show();

        })
    })
});
