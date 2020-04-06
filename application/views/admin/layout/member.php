
    <div class="card shadow mb-4">
    
      <div class="card-header">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link nav_request active" id="nav-request-tab" data-toggle="tab" href="#nav-request" role="tab" aria-controls="nav-request" aria-selected="true">Request Upgrade</a>
          </div>
        </nav>
      </div>      
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">          
            <div class="card-body">                  
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable_member_upgrade" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="80%">Nama</th>
                            <th>View</th>
                            </tr>
                        </thead>          
                        <tbody id="member_request_full">                 
                        </tbody>
                    </table>
                </div>
            </div> 
          </div>
          <div class="tab-pane fade" id="nav-rekening" role="tabpanel" aria-labelledby="nav-rekening-tab">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th width="50%">User</th>
                            <th>Joined</th>
                            </tr>
                        </thead>          
                        <tbody id="member_request_full">                 
                        </tbody>
                    </table>
                </div>
            </div> 
          </div>
          <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <div class="card-body">
               <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
               </div>
               <hr>
               <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
               </div>
            </div> 
          </div>
        </div>
    </div>

<script>
  var JS = {
    init: function(){
        //jika tombol approve full service ditekan        
      $(document).on('click', '#btn_approve_full_service', function(){
        var user_id=$(this).attr('data');
        if (!confirm("User kan diupgrade menjadi member Full Service?")){
          return false;
        }
        $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>profile/user/approve_member_full_service',
        data  : {user_id:user_id},
        success : function(data){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Upgrade Member Berhasil',
            showConfirmButton: false,
            timer: 1300
          })
          }
        });
        
        $('#approve_member_full_modal .close').click();
        $('#member').click();

      });

      //jika tombol reject full service ditekan
      
      $(document).on('click', '#btn_reject_full_service', function(){
        var user_id=$(this).attr('data');
        if (!confirm("Pengajuan upgrade user ini akan ditolak?")){
          return false;
        }
        $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>profile/user/reject_member_full_service',
        data  : {user_id:user_id},
        success : function(data){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Pengajuan Upgrade Member Berhasil Ditolak',
            showConfirmButton: false,
            timer: 1300
          })
          }
        });
        
        $('#approve_member_full_modal .close').click();
        $('#member').click();

      });
      }
    }
  $(document).ready(function(){
    JS.init();
  });
</script>
