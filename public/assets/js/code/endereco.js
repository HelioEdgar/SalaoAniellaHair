$(document).ready(function () {
    var provincias = {
        'Luanda': ['Luanda', 'Belas', 'Cazenga', 'Viana', 'Quiçama', 'Cacuaco ', 'Ícolo e Bengo', 'Talatona', 'Kilamba Kiaxi'],
    };

    var municipiosDistritos = {
        'Luanda': ['Sambizanga', 'Rangel', 'Maianga', 'Ingombota', 'Samba', 'Neves Bendinha', 'Ngola Kiluanje'],
        'Belas': ['Quenguela', 'Morro dos Veados', 'Ramiros', 'Vila Verde', 'Cabolombo', 'Kilamba'],
        'Cazenga': ['Cazenga', 'Hoji ya Henda', '11 de Novembro', 'Kima Kieza', 'Tala Hadi', 'Kalawenda'],
        'Viana': ['Viana', 'Estalagem', 'Kikuxi', 'Baía', 'Zango', 'Vila Flôr'],
        'Quiçama': ['Sem distritos'],
        'Cacuaco': ['Kikolo', 'Cacuaco', 'Mulenvos de Baixo', 'Sequele'],
        'Ícolo e Bengo': ['Catete', 'Bela Vista'],
        'Talatona': ['Benfica', 'Futungo de Belas', 'Lar do Patriota', 'Talatona', 'Camama', 'Cidade Universitária'],
        'Kilamba Kiaxi': ['Golfe', 'Sapú', 'Palanca', 'Nova Vida'],
        // Adicione todos os seus municípios e distritos aqui
    };

    // Preencha a província dropdown
    $.each(provincias, function (key, value) {
        $('#provincia').append($('<option></option>').attr('value', key).text(key));
    });

    // Quando uma província é selecionada
    $('#provincia').change(function () {
        var provinciaSelecionada = $(this).val();
        var municipios = provincias[provinciaSelecionada];

        //$('#municipio').empty().append($('<option></option>').text('Selecione o Município'));
        //$('#distrito').empty().append($('<option></option>').text('Selecione o Distrito')).attr('disabled', 'disabled');

        if (municipios) {
            $.each(municipios, function (index, value) {
                $('#municipio').append($('<option></option>').attr('value', value).text(value));
            });
            $('#municipio').removeAttr('disabled');
        } else {
            $('#municipio').attr('disabled', 'disabled');
        }
    });

    // Quando um município é selecionado
    $('#municipio').change(function () {
        var municipioSelecionado = $(this).val();
        var distritos = municipiosDistritos[municipioSelecionado];

        //$('#distrito').empty().append($('<option></option>').text('Selecione o Distrito'));

        if (distritos) {
            $.each(distritos, function (index, value) {
                $('#distrito').append($('<option></option>').attr('value', value).text(value));
            });
            $('#distrito').removeAttr('disabled');
        } else {
            $('#distrito').attr('disabled', 'disabled');
        }
    });
});