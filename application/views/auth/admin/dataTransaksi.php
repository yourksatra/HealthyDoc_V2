    <div class="home">
        <div class="home-content">
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
            <div class="card tabel" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(100rem/30);">
                    <div style="margin: 2rem;">
                        <a href="<?= base_url('authadmin/langganan') ?>" class="btn btn-primary" style="margin-left: -2rem;">+ Transaksi Baru</a>
                    </div>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Gross Amount</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Va Number</th>
                                <th scope="col">Transaction Time</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Pdf Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($result)) { ?>
                                <?php foreach ($result as $d) { ?>
                                    <tr>
                                        <td><?php echo $d['order_id']; ?></td>
                                        <td><?php echo $d['gross_amount']; ?></td>
                                        <td><?php echo $d['payment_type']; ?></td>
                                        <td><?php echo $d['bank']; ?></td>
                                        <td><?php echo $d['va_number']; ?></td>
                                        <td><?php echo $d['transaction_time']; ?></td>
                                        <td>
                                            <?php
                                            if ($d['status_code'] == '200') {
                                            ?>
                                                <span for="" class="btn bg-success btn-sm">Success</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span for="" class="btn bg-warning btn-sm">Pending</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $d['pdf_url']; ?>" target="_blank" class="btn btn-success btn-sm">Download</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8">Tidak ada data pembayaran.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="<?php echo base_url('asset\js') ?>\script.js"></script>
</body>
</html>