

    $('#formSimpananGrup').hide();
    $('#frm_OpenKamera').hide();
    $('#frm_HasilKamera').hide();
    $('#frm_OpenKameraProfile').hide();
    $('#frm_HasilKameraProfile').hide();
    $('#frm_UploadProfile').hide();
    $('#frm_submit').hide();
    $('#konfirmasiCashout').hide();


    //BUTTON UPLOAD KTP
		$('#btn_UploadKTP').click(function(){
      $('#frm_OpenKamera').show();
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kamera');
      $('#frm_UploadKTP').hide();
      }),		

    //BUTTON CAPTURE
    $('#btn_capture').click(function(){
      $('#frm_UploadProfile').show();
      $('#frm_HasilKamera').show();
      Webcam.snap( function(data_uri) {
      document.getElementById('hasilKamera').innerHTML = '<img id="imageprevKTP" src="'+data_uri+'"/>';
      });
      Webcam.reset();
      $('#frm_OpenKamera').hide();
    }),

    //BUTTON RECAPTURE
    $('#btn_recapture').click(function(){
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kamera');
      $('#frm_OpenKamera').show();
      $('#frm_HasilKamera').hide();
    }),

    //BUTTON CAPTURE SAVE
    
    $('#btn_save_capture').click(function(){
      $('#btn_recapture').hide();
      $('#btn_save_capture').hide();
      Webcam.snap( function(data_uri) {
        Webcam.upload(data_uri, 'http://localhost/warkop/auth/save_registrasi', function(code, text) {} );
     })
    }),


    //BUTTON UPLOAD PROFILE
		$('#btn_UploadProfile').click(function(){
      $('#frm_OpenKameraProfile').show();
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kameraProfile');
      $('#frm_UploadProfile').hide();
      }),		

    //BUTTON CAPTURE
    $('#btn_captureProfile').click(function(){
      $('#frm_submit').show();
      $('#frm_HasilKameraProfile').show();
      Webcam.snap( function(data_uri) {
      document.getElementById('hasilKameraProfile').innerHTML = '<img id="imageprevProfile" src="'+data_uri+'"/>';
      });
      Webcam.reset();
      $('#frm_OpenKameraProfile').hide();
    }),

    //BUTTON RECAPTURE
    $('#btn_recaptureProfile').click(function(){
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kameraProfile');
      $('#frm_OpenKameraProfile').show();
      $('#frm_HasilKameraProfile').hide();
    });