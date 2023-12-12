				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<!-- <div class="main-container">
          <div class="row">
               <div class="col-md-4 btn btn-default">

                    <div id="qr-reader" style="width:calc(100%);"></div>

                    <div id="qr-reader-results"></div>
                  
              </div> 

               <div class="col-md-8">
              
                  <p id="data" style="display: none"></p> 
                </div>     
            </div>
    </div> -->

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      
        <div class="card-box mb-30">
          <div class="pd-20">
            <h4 class="text-blue h4">Borrow</h4>
          </div>
          <div class="row">
          
              <div class="col-md-5" style="margin-left: 1em">

                    <div id="qr-reader" style="width:calc(70%);"></div>

                    <div id="qr-reader-results"></div>
                  
              </div> 

               <div class="col-md-6" style="margin-right: 1em">
              
                  <p id="data" style="display: none"></p> 
                </div>    

          </div>
        </div>
	

<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } 
        else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(qrCodeMessage) {
               // if (qrCodeMessage !== lastResult) {
               //   ++countResults;
               //   lastResult = qrCodeMessage;
                // resultContainer.innerHTML
                    // += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
                $.ajax({
                    url:'../php/searchqr.php?id=id',
                    method:'POST',
                    data:{
                        idscan:qrCodeMessage
                    },
                    error:err=>{
                        console.log(err)
                        alert_toast('An Error Occured.');
                    },

                    success:function(data){

                        $('#data').html(data);

                          document.getElementById('data').style.display = 'block';

                         //    $(document).ready(function() {

                         //        $("#data").fadeOut(30000);

                         //        $("#id").unbind('click').on("click", function () {
                         //            $("#data").fadeTo(1000, 0).slideUp(5000, function(){
                         //            //$(this).remove();
                         //            });   
                         //        }, 5000);
                         // });
                    }
                })
            // }
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 150 });
        html5QrcodeScanner.render(onScanSuccess);
    });

</script> 

		<?php include 'footer.php'; ?>

		
