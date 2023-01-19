<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftmenu'); ?>
<div class="row">
        <div class="col-4">
            <form action="<?php echo base_url('admin/aboutpost/'); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label>Hakkında Bilgi Yazısı</label>
                    <input type="text" name="info" required class="form-control" value="<?= $about->info; ?>">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>Kısa Yazı</label>
                            <textarea name="textShort" cols="30" class="form-control" required rows="10"><?= $about->textShort; ?></textarea>
                        </div>
                        <div class="col-6">
                            <label>Uzun Yazı</label>
                            <textarea name="textLong" cols="30" class="form-control" required rows="10"><?= $about->textLong; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Doğum Günü</label>
                            <input type="text" name="birthday" required class="form-control" value="<?= $about->birthday; ?>">
                        </div>
                        <div class="col-4">
                            <label>Web Site Linki</label>
                            <input type="text" name="website" required class="form-control" value="<?= $about->website; ?>">
                        </div>
                        <div class="col-4">
                            <label>Telefon</label>
                            <input type="text" name="phone" required class="form-control" value="<?= $about->phone; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>Yaş</label>
                            <input type="text" name="age" required class="form-control" value="<?= $about->age; ?>">
                        </div>
                        <div class="col-6">
                            <label>Okul Derecesi</label>
                            <input type="text" name="degree" required class="form-control" value="<?= $about->degree; ?>">
                        </div>
                        <div class="col-6">
                            <label>Şehir</label>
                            <input type="text" name="city" required class="form-control" value="<?= $about->city; ?>">
                        </div>
                        <div class="col-6">
                            <label>Freelance Uygunluk</label>
                            <input type="text" name="freelance" required class="form-control" value="<?= $about->freelance; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-flat btn-block">Kaydet</button>
                </div>
            </form>
        </div>
</div>
<?php $this->load->view('admin/include/footer'); ?>