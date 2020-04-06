
    <div class="card shadow mb-4">
      <div class="card-header">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-omset-tab" data-toggle="tab" href="#nav-omset" role="tab" aria-controls="nav-omset" aria-selected="true">Omset</a>
            <a class="nav-item nav-link" id="nav-rekening-tab" data-toggle="tab" href="#nav-rekening" role="tab" aria-controls="nav-rekening" aria-selected="false">Saldo Rekening</a>
            <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">User</a>
            <a class="nav-item nav-link" id="nav-group-tab" data-toggle="tab" href="#nav-group" role="tab" aria-controls="nav-group" aria-selected="false">Group</a>
          </div>
        </nav>
      </div>      
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-omset" role="tabpanel" aria-labelledby="nav-omset-tab">          
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
          <div class="tab-pane fade" id="nav-rekening" role="tabpanel" aria-labelledby="nav-rekening-tab">
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
    
  <!-- Page level plugins -->
<script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/chart-area-demo.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-bar-demo.js')?>"></script>
