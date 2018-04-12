<?php
    $idProduk    = $produk[0]->idProduk;
if($this->input->post('is_submitted')){
    $kodeProduk     = set_value('kodeProduk');
    $namaProduk     = set_value('namaProduk');
    $jenisProduk    = set_value('jenisProduk');
    $kategori      = set_value('kategori');
    $deskripsi      = set_value('deskripsi');
    $satuan      = set_value('satuan');
    $hargaJual          = set_value('hargaJual');
    $hargaModal     = set_value('hargaModal');
    $statusKatalog     = set_value('statusKatalog');
    $stok      = set_value('stok');

}
else {
    $kodeProduk  = $produk[0]->kodeProduk;
    $namaProduk  = $produk[0]->namaProduk;
    $jenisProduk = $produk[0]->jenisProduk;
    $kategori      = $produk[0]->kategori;
    $deskripsi  = $produk[0]->deskripsi;
    $satuan      = $produk[0]->satuan;
    $hargaJual       = $produk[0]->hargaJual;
    $hargaModal       = $produk[0]->hargaModal;
    $statusKatalog     = $produk[0]->statusKatalog;
    $stok      = $produk[0]->stok;
    $kodeGambar  = $produk[0]->kodeGambar;
}
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surya Sumatera | Administration</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <?php include('akunlogin.php') ?>
                <?php include('sidebar.php') ?>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Produk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url();?>user/inventory">Beranda</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>user/purchaseOrder">Produk</a>
                        </li>
                        <li class="active">
                            <strong>Edit Produk</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> Info Produk</a></li>
                            </ul>
                            <div class="tab-content">
                                <?php echo form_open_multipart('user/editProduk/'.$idProduk)?>
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <fieldset class="form-horizontal">
                                            <input type="hidden" name="kodeGambar" class="form-control" value="<?php echo $kodeGambar; ?>">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Produk</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="kodeProduk" name="kodeProduk" placeholder="CLB01" class="form-control" value="<?=$kodeProduk; ?>" required="">
                                                    <small class="text-danger"><?php echo form_error('kodeProduk'); ?></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Produk</label>
                                                <div class="col-md-10">
                                                    <input type="text" required placeholder="Nama Produk" name="namaProduk" class="form-control" value="<?= $namaProduk ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jenis Produk <br/><small class="text-navy">Pilih salah satu</small></label>

                                                <div class="col-sm-2">
                                                    <div class="i-checks"><label> <input id="Cincin" type="radio" <?php $a= $jenisProduk; if($a=="Cincin"){?> checked="" <?php } ?> value="Cincin" name="jenisProduk"> <i></i> Cincin </label></div>
                                                    <div class="i-checks"><label> <input id="Liontin" type="radio" <?php $a= $jenisProduk; if($a=="Liontin"){?> checked="" <?php } ?> value="Liontin" name="jenisProduk"> <i></i> Liontin </label></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="i-checks"><label> <input id="Gelang" type="radio" <?php $a= $jenisProduk; if($a=="Gelang"){?> checked="" <?php } ?> value="Gelang" name="jenisProduk"> <i></i> Gelang </label></div>
                                                    <div class="i-checks"><label> <input id="Anting" type="radio" <?php $a= $jenisProduk; if($a=="Anting"){?> checked="" <?php } ?> value="Anting" name="jenisProduk"> <i></i> Anting </label></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="i-checks"><label> <input id="Cincin Kawin" type="radio" <?php $a= $jenisProduk; if($a=="Cincin Kawin"){?> checked="" <?php } ?> value="Cincin Kawin" name="jenisProduk"> <i></i> Cincin Kawin </label></div>
                                                    <div class="i-checks"><label> <input id="Lainnya" type="radio" <?php $a= $jenisProduk; if($a=="Lainnya"){?> checked="" <?php } ?> value="Lainnya" name="jenisProduk"> <i></i> Lainnya </label></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Deskripsi</label>
                                                <div class="col-sm-10"><textarea required name="deskripsi" value="<?= $deskripsi ?>" class="form-control" rows="8"><?= $deskripsi?></textarea></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Harga Modal</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Rp" name="hargaModal" class="form-control good" value="<?= $hargaModal ?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Harga Jual</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Rp" name="hargaJual" class="form-control good" value="<?= $hargaJual ?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <label class="col-sm-2 control-label">Satuan</label>
                                                <div class="col-md-4">
                                                    <select name="satuan" required="" class="form-control">
                                                      <option value="Pcs" <?php $a= $satuan; if($a=="Pcs"){?> selected="" <?php } ?>>Pcs</option>
                                                      <option value="Liter" <?php $a= $satuan; if($a=="Liter"){?> selected="" <?php } ?>>Liter</option>
                                                      <option value="Gram" <?php $a= $satuan; if($a=="Gram"){?> selected="" <?php } ?>>Gram</option>
                                                      <option value="Carat" <?php $a= $satuan; if($a=="Carat"){?> selected="" <?php } ?>>Carat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kategori Produk</label>
                                                <div class="col-md-4">
                                                    <select class="form-control"  name="kategori">
                                                        <option value="Katalog" <?php $a= $kategori; if($a=="Katalog"){?> selected="" <?php } ?> required>Katalog</option>
                                                        <option value="Tempahan" <?php $a= $kategori; if($a=="Tempahan"){?> selected="" <?php } ?>>Tempahan</option>
                                                        <option value="Massal" <?php $a= $kategori; if($a=="Massal"){?> selected="" <?php } ?>>Massal</option>
                                                        <option value="Perak" <?php $a= $kategori; if($a=="Perak"){?> selected="" <?php } ?>>Perak</option>
                                                        <option value="Trading" <?php $a= $kategori; if($a=="Trading"){?> selected="" <?php } ?>>Trading</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status Katalog</label>
                                                <div class="col-sm-2" style="margin-top: 7px;">
                                                    <div class="i-checks"><label> <input type="radio" <?php $a= $statusKatalog; if($a=="Tampil"){?> checked="" <?php } ?> value="Tampil" name="statusKatalog" required> <i></i> Tampil </label></div>
                                                </div>
                                                <div class="col-sm-2" style="margin-top: 7px;">
                                                    <div class="i-checks"><label> <input type="radio" <?php $a= $statusKatalog; if($a=="Tidak Tampil"){?> checked="" <?php } ?> value="Tidak Tampil" name="statusKatalog"> <i></i> Tidak Tampil </label></div>
                                                </div>
                                            </div>
                                             
                                        </fieldset>

                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Urutan
                                                    </th>
                                                    <th>
                                                        Image preview
                                                    </th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for ($i=1; $i <=4 ; $i++) { ?>
                                                <tr>
                                                    <td>
                                                        Gambar <?php echo $i;?>
                                                    </td>
                                                    <td>
                                                        <!-- <img style="max-height: 150px;" id="myImg<?php echo $i;?>" src="<?php echo base_url(); ?>uploads/gambarProduk/<?php echo $produk[0]->{'gambar'.$i} ?>" alt="your image"> -->
                                                    </td>
                                                    <td>    
                                                        <input type="file" id="file<?php echo $i;?>" name="userfile[]">
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0 20px 0;">
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url()?>user/produk"><button type="button" name="submit" class="btn btn-white" value="batal">Cancel</button></a>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                                <?php echo form_close()?> 
                            </div>
                    </div>
                </div>
            </div>    

        </div>

        <div class="footer">
             <strong>Copyright</strong> Surya Sumatra &copy; <?php echo date('Y')?>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/js/plugins/iCheck/icheck.min.js"></script>
       
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.i-checks2').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        <script type="text/javascript">
        $('.good').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            prefix: 'Rp ', //Space after $, this will not truncate the first character.
            rightAlign: false,
            oncleared: function () { self.Value(''); }
        });
    </script>
</body>

</html>
