<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Form</title>
  {{-- <link rel="stylesheet" href="{{asset('assets')}}/css/boostrap.min.css"> --}}

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 id="qrText"></h2> <!-- Display barcodeText here -->
    <h2>QR Code Form</h2>
    <form id="qrForm">
        @csrf
      <!-- Display barcodeText from URL parameter as readonly input field -->
      <div class="form-group">
        <label for="qrcode">QR Code:</label>
        <input type="text" class="form-control" id="qrcode" readonly>
      </div>
      <!-- Display couponno from URL parameter as readonly input field -->
      <div class="form-group">
        <label for="couponno">Coupon Number:</label>
        <input type="text" class="form-control" id="couponno" readonly>
      </div>
      <!-- Other form fields -->
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile Number:</label>
        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
      </div>
      <div class="form-group">
        <label for="district">District:</label>
        <input type="text" class="form-control" id="district" name="district" placeholder="Enter your district" required>
      </div>
      <div class="form-group">
        <label for="taluka">Taluka:</label>
        <input type="text" class="form-control" id="taluka" name="taluka" placeholder="Enter your taluka" required>
      </div>
      <div class="form-group">
        <label for="village">Village:</label>
        <input type="text" class="form-control" id="village" name="village" placeholder="Enter your village" required>
      </div>
      <div class="form-group">
        <label for="pincode">Pin Code:</label>
        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter your pin code" required>
      </div>
      <!-- Hidden Fields -->
      <input type="hidden" id="location" value="">
      <input type="hidden" id="device" value="">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <script>
    var formSaveUrl = "{{route('app.form.save')}}";
    var homeUrl = "{{route('app.form.view')}}";
  </script>
  
  <script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>

  <script type="text/javascript" src="{{asset('js')}}/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="{{asset('qrapp')}}/form.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

  <script>
    // Get barcodeText and couponno from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const qrcode = urlParams.get('qrcode');
    const couponno = urlParams.get('couponno');

    const qrcodeValue = qrcode ? qrcode.split('=')[1] : '';


    // Display barcodeText and couponno on top of the form
    document.getElementById('qrText').innerText = `QR Code: ${qrcode}`;
    document.getElementById('qrcode').value = qrcodeValue;
    document.getElementById('couponno').value = couponno;

    // Submit form function
   
    
  </script>


</body>
</html>
