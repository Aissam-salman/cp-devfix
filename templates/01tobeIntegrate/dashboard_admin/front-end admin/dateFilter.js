$(function () {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D YYYY') + ' - ' + end.format('MMMM D YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');

        $('#startDate').val(startDate);
        $('#endDate').val(endDate);

        $.ajax({
            type: "POST",
            url: "url_de_ta_route", // Remplace "url_de_ta_route" par l'URL de ta route Symfony
            data: $('#formDatePicker').serialize(), // Sérialiser les données du formulaire
            success: function(response) {
                console.log("Le formulaire a été soumis avec succès !");
            },
            error: function(xhr, status, error) {
                console.error("Une erreur s'est produite lors de la soumission du formulaire :", error);
            }
        });

        // Réinitialiser les valeurs des champs de formulaire après la soumission
        $('#startDate').val('');
        $('#endDate').val('');
    });


    $('#btn-reset-filter').on('click',function() {
        $('#statut-filter').val('');
        $('#startDate').val('');
        $('#endDate').val('');
        cb(start, end);
    })
});

