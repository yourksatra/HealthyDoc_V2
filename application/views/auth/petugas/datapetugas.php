    <div class="home">
        <div class="home-content">
            <div class="card tabel" style="margin-right:2rem; margin-top:5rem; margin-left: 4rem;">
                <div align="left" style="margin: 1rem calc(100rem/30);">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TELEPON</th>
                                <th>PROFESI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($petugas as $row)
                                echo "
                                    <tr>
                                        <td width='50'>" . $row['NIP'] . "</td>
                                        <td width='150'>" . $row['Nama'] . "</td>
                                        <td width='50'>" . $row['JenKel'] . "</td>
                                        <td width='50'>" . $row['NoTelp'] . "</td>
                                        <td width='100'>" . $row['Profesi'] . "</td>
                                    </tr>
                                ";
                            ?>
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