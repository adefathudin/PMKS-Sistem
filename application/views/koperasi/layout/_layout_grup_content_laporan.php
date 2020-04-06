<div class="card-body">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-simpanan-tab" data-toggle="tab" href="#nav-simpanan" role="tab" aria-controls="nav-simpanan" aria-selected="true">Simpanan</a>
      <a class="nav-item nav-link" id="nav-pinjaman-tab" data-toggle="tab" href="#nav-pinjaman" role="tab" aria-controls="nav-pinjaman" aria-selected="false">Pinjaman</a>
    </div>
  </nav>
  <br>
 
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-simpanan" role="tabpanel" aria-labelledby="nav-simpanan-tab">      
      <div class="table table-striped">
        <table class="table" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Anggota</th>
              <th>Jenis Simpanan</th>
              <th>Periode</th>
              <th>Nominal</th>
              <th>Tanggal Simpanan</th>
            </tr>
          </thead>          
          <tbody id="data_simpanan">                 
          </tbody>
        </table>
      </div>
    </div>

    <div class="tab-pane fade" id="nav-pinjaman" role="tabpanel" aria-labelledby="nav-pinjaman-tab">      
      <div class="table table-striped">
        <table class="table" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Anggota</th>
              <th>Jenis pinjaman</th>
              <th>Periode</th>
              <th>Nominal</th>
              <th>Tanggal pinjaman</th>
            </tr>
          </thead>          
          <tbody id="data_pinjaman">                 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
      simpanan_grup();
      pinjaman_grup();
      admin_grup();      
   
  //tampil simpanan grup
  function simpanan_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/simpanan/list_simpanan_by_grup',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td width="35%">'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="rounded-circle img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a>'+
            '</td>'+

            '<td>'+
              data[i].jenis_simpanan+
            '</td>'+

            '<td>'+
              data[i].periode+
            '</td>'+

            '<td>'+
              data[i].nominal+
            '</td>'+

            '<td width="25%">'+
              data[i].tanggal_simpan+
            '</td>'+
            '</tr>';
        }
        $('#data_simpanan').html(html);
      }
    });
  }; 

  //tampil pinjaman grup
  function pinjaman_grup(){
    var grup_id =  "<?php if(isset($data_grup_tmp->grup_id)){echo ($data_grup_tmp->grup_id);} ?>";
    $.ajax({
    type  : 'GET',
    url   : '<?php echo base_url()?>koperasi/pinjaman/list_pinjaman_by_grup',
    data  : {grup_id:grup_id},
    async : true,
    dataType : 'json',
    success : function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          html += '<tr>'+
            '<td width="35%">'+
              '<a href="<?= base_url()?>user/'+data[i].user_id+'">'+
                  '<img src="<?= base_url()?>assets/img/user/profile/'+data[i].profil+'" alt="Profile Picture" class="rounded-circle img-responsive" style="max-height: 50px; max-width: 50px;"/> '+data[i].nama_lengkap+
              '</a>'+
            '</td>'+

            '<td>'+
              data[i].nominal+
            '</td>'+

            '<td>'+
              data[i].tenor+
            '</td>'+

            '<td>'+
              data[i].tujuan+
            '</td>'+

            '<td width="25%">'+
              data[i].tanggal_pinjam+
            '</td>'+
            '</tr>';
        }
        $('#data_pinjaman').html(html);
      }
    });
  };


</script>