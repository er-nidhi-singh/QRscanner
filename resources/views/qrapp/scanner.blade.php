<!DOCTYPE html>
<html>
<head>
<title>QR Code Scanner</title>
<link href="{{asset('qrapp')}}/style.css" rel="stylesheet">

</head>
<body>
    <div id="container">
        <div id="status">Initializing...</div>
        <label for="ipt-file">Choose image(s) to decode:</label><br>
        <input id="ipt-file" type="file" multiple accept="image/png,image/jpeg,image/bmp,image/gif" disabled><br><br>
        <button id="btn-show-scanner" disabled>show scanner</button>
    </div>
    
<script>
    var formUrl = "{{route('app.form.view')}}";
   
</script>

<script>
    var formSaveUrl = "{{route('app.form.save')}}";
    var homeUrl = "{{route('app.form.view')}}";
    var verifyUrl = "{{route('app.qr.verify')}}";
  </script>
  
  <script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>

  <script type="text/javascript" src="{{asset('js')}}/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@9.0.0/dist/dbr.js"></script>
<script src="{{asset('qrapp')}}/script.js"></script>



</body>
</html>