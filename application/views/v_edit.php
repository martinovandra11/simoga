<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Rekap Trip</h1>
    </div>

    <div class="row">
      <div class="col-12">
          <div class="card">
                  <div class="card-header">
                    <h4>Horizontal Form</h4>
                  </div>
                  <form action="<?= base_url('c_rekap/actionedit') ?>" method = POST>
                  <div class="card-body">
                    <div class="form-row">
                    
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Kode Rekap</label>
                        <input type="number" name="id_rekap" id="id_rekap" class="form-control" value="<?php echo $id_rekap?>"readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Kode Kebun</label>
                        <input type="text" name="kode_kebun" id="kode_kebun" class="form-control" value="<?= $editdata->kode_kebun ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Jenis</label>
                        <input type="text" name="jenis" id="jenis" class="form-control" value="<?= $editdata->jenis ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Kode Plasma</label>
                        <input type="text" name="kode_plasma" id="kode_plasma" class="form-control" value="<?= $editdata->kode_plasma ?>">
                      </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $editdata->tanggal ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Jam Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" value="<?= $editdata->masuk ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Jam Keluar</label>
                        <input type="time" name="jam_keluar" id="jam_keluar" class="form-control" value="<?= $editdata->keluar ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Durasi</label>
                        <input type="number" name="durasi" id="durasi" class="form-control" value="<?= $editdata->durasi ?>">
                      </div>
                    </div>

                    <div class="form-row">
                         <div class="form-group col-md-12">
                              <label for="inputAddress">Pemasok</label>
                              <input type="text" name="pemasok" id="pemasok" class="form-control" value="<?= $editdata->pemasok ?>">
                         </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">No Polisi</label>
                        <input type="text" name="nopol" id="nopol" class="form-control" value="<?= $editdata->nopol ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Supir</label>
                        <input type="text" name="supir" id="supir" class="form-control" value="<?= $editdata->supir ?>">
                      </div>
                      
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Bruto</label>
                        <input type="text" name="bruto" id="bruto" class="form-control" value="<?= $editdata->bruto ?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Netto</label>
                        <input type="text" name="netto" id="netto" class="form-control" value="<?= $editdata->netto ?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Jumlah TBS Diterima</label>
                        <input type="text" name="tbs_diterima" id="tbs_diterima" class="form-control" value="<?= $editdata->jumlah_tbs_diterima ?>" readonly>
                      </div> 
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">TBS Mentah</label>
                        <input type="text" name="tbs_mentah" id="tbs_mentah" class="form-control" value="<?= $editdata->tbs_mentah ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">TBS Tankos</label>
                        <input type="text" name="tbs_tankos" id="tbs_tankos" class="form-control" value="<?= $editdata->tbs_tankos ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">TBS Kecil</label>
                        <input type="text" name="tbs_kecil" id="tbs_kecil" class="form-control" value="<?= $editdata->tbs_kecil ?>">
                      </div> 
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Jumlah TBS Sample</label>
                        <input type="text" name="tbs_sample" id="tbs_sample" class="form-control" value="<?= $editdata->jumlah_tbs_sample ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Tenera</label>
                        <input type="text" name="tenera" id="tenera" class="form-control" value="<?= $editdata->tenera ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Dura</label>
                        <input type="text" name="dura" id="dura" class="form-control" value="<?= $editdata->dura ?>">
                      </div> 
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Grade</label>
                        <input type="text" name="grade" id="grade" class="form-control" value="<?= $editdata->grade ?>">
                      </div> 
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Potongan</label>
                        <input type="text" name="potongan" id="potongan" class="form-control" value="<?= $editdata->potongan ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="<?= $editdata->status ?>">
                    </div>

                    
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
          </div>
          </form>
      </div>
    </div>