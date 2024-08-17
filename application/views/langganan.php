<!DOCTYPE html>
<html lang="en">

<head>
    <title>HealthyDOC | Pendaftaran Baru</title>
    <link rel="icon" href="<?php echo base_url('asset\image/logo.png') ?>">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/asset/css/regis.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-fZzSOY1XL-yd2Hyx"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <?php
        if($this->session->flashdata('notifikasi')){
            ?>
    <script>
    Swal.fire({
        title: "Layanan HealthyDoc",
        text: "<?= $this->session->flashdata('notifikasi') ?>"
    });
    </script>
    <?php
        }
    ?>
    <div id="Regist" class="card">
        <h5 class="card-header"><img src="<?= base_url('asset/image/logo.png') ?>" alt="Logo" width="auto" height="50"
                class="d-inline-block align-text-center">
            Langganan</h5>
        <div class="card-body">
            <form id="payment-form" class="row g-2" action="<?= site_url() ?>Snap/finish" method="POST">
                <input type="hidden" name="result_type" id="result-type" value="">
                <input type="hidden" name="result_data" id="result-data" value="">
                <div class="col-md-12">
                    <label for="input" class="form-label">Akun</label>
                    <input type="hidden" class="form-control" name="idUser" id="idUser" value="<?=$InfoAkun['IdAkun']?>"
                        readonly>
                    <input type="text" class="form-control" name="User" id="User" value="<?=$InfoAkun['Name']?>"
                        readonly>
                </div>
                <label for="jmlbayar" class="mt-4">Jenis Paket</label>
                <div class="form-group">
                    <select name="jmlbayar" class="form-control" id="jmlbayar">
                        <option value="0">Starter Rp0/Bulan</option>
                        <option value="255000">Advanced Rp.255.000/3Bulan</option>
                        <option value="320000">Premium Rp.320.000/4Bulan</option>
                    </select>
                </div>
                <button id="pay-button" class="btn btn-primary mt-4">Bayar</button>
            </form>
        </div>
        <div class="card-footer text-muted" align="center">
            <a class="btn btn-secondary" type="button" onclick="goBack()">Kembali</a>
            <script>
            function goBack() {
                window.history.back();
            }
            </script>
        </div>
    </div>
</body>
<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    var id = $("#idUser").val()
    var jmlbayar = $("#jmlbayar").val()

    $.ajax({
        type: 'POST',
        data: {
            id: id,
            jmlbayar: jmlbayar
        },
        url: '<?= site_url() ?>Snap/token',
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                }
            });
        }
    });
});
</script>

</html>