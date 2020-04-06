<div class="row">
  <div class="col-lg-8 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="text-center font-weight-bold text-primary">Topup Saldo Rekening</div>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                Total Cash In
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->total_cash_in, 0, ".", ".") ?> kali</h6>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                Nominal Cash In
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->total_nominal_cash_in, 0, ".", ".") ?></h6>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                Total Saldo
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->saldo_akhir, 0, ".", ".") ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>

<div class="col-lg-4 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header">
       Form Top Up
    </div>
    <div class="card-body">  
        <div class="font-weight-bold">Nominal Saldo</div><br>
        <button value="10000" class="btn btn-secondary" onClick="getTopup(this)">10.000</button>
        <button value="50000" class="btn btn-secondary" onClick="getTopup(this)">50.000</button>
        <button value="100000" class="btn btn-secondary" onClick="getTopup(this)">100.000</button>
        <button value="500000" class="btn btn-secondary" onClick="getTopup(this)">500.000</button>
        <br><br>            
      <div class="form-group">
          <input type="number" min="10000" id="nominalTopup" name="nominalTopup" class="form-control" placeholder="Minimal Rp10.000"> 
          <hr>
        <button class="btn btn-primary form-control" id="pay-button"><i class="fas fa-fw fa-money-bill-wave"></i> Top Up</button>
      </div>
    </div>
  </div>
</div>
</div><!--END ROW-->


<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-yXauJI1zHbAPH4dl"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){ //jika tombol top-up ditekan
    <?php
    $order_id = md5(uniqid(rand().$user_id.$email,true)); //traksaksi ID diambil dari hash user id, email dan timestamp microsecond
    ?>
    var requestBody =  {      
      transaction_details: {
        gross_amount: document.getElementById('nominalTopup').value, //mengambil nilai nominal topup
        deskripsi: 'Top Up',        
        order_id: '<?= $order_id ?>'
      }
    }    
    var user_id =  "<?= $user_id ?>";
    var nominal = document.getElementById('nominalTopup').value; 
      $.ajax({ //data akan disimpan terlebih dahulu ke database, dengan status FALSE
        type  : 'GET',
        url   : '<?php echo base_url()?>rekening/topup/insert',
        data  : {user_id:user_id, nominal:nominal, order_id:'<?= $order_id ?>'},
        async : true,
        success : function(data){
          console.log('sukses insert topup');
          }, 
          error : function(data){
            console.log('gagal insert topup');
        }
      });
    //memanggil function form pembayaran dari payment gateway
    getSnapToken(requestBody, function(response){
      var response = JSON.parse(response);
      console.log("new token response", response);
      snap.pay(response.token);
    })
  };
  function getSnapToken(requestBody, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        callback(xmlHttp.responseText);
      }
    }
    //mengirim data request ke modul verification
    xmlHttp.open("post", "<?= base_url('payment/checkout.php')?>");
    xmlHttp.send(JSON.stringify(requestBody));
  }  
</script>

<script>
function getTopup(objButton){
        document.getElementById("nominalTopup").value = objButton.value;
}
</script>
