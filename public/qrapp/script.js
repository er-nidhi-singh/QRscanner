let reader = null;
let scanner = null;

function verifyQRData(qrData) {
    let couponno = ""; 
    let qrData1 = "";
    // if (qrData.includes('&')) {
    //     let parts = qrData.split('&');
    //     qrData = parts[0]; 
    //     couponno = parts[1]; 
        
    // }
    let verifyUrlWithParams = `${verifyUrl}?qrcode=${encodeURIComponent(qrData)}`;
    
    if (qrData.includes('&')) {
        let parts = qrData.split('&');
        qrData1 = parts[0].split('=')[1]; 
        couponno = parts[1].split('=')[1]; 
        verifyUrlWithParams += `&couponno=${encodeURIComponent(couponno)}`;
    }
    
    // if (qrData.includes('couponCode')) {
    //     let parts = qrData.split('couponCode');
    //     qrData = parts[0]; 
    //     couponCode = parts[1]; 
    // }
    $.ajax({
        // url: verifyUrl,
        // method: 'POST',
        // data: { qrcode: qrData, couponno: couponno }, 
        url: verifyUrlWithParams,
        method: 'GET',
        success: function(response) {
            console.log("response", response);
            if (response.success) {
                // Redirect to another page if verification is successful
                window.location.href = formUrl + `?qrcode=${encodeURIComponent(qrData1)}&couponno=${encodeURIComponent(couponno)}`;
            } else {
                console.log("Error message:", response.message);

                // Show error message using SweetAlert
                swal({
                    title: "Invalid!",
                    text: response.message,
                    icon: "error",
                    button: "OK",
                }).then(() => {
                    // Close the scanner if it's open
                    if (scanner && scanner.isVisible()) {
                        scanner.hide();
                    }
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

window.onload = async function() {
    reader = await Dynamsoft.DBR.BarcodeReader.createInstance();
    if (reader) {
        document.getElementById('ipt-file').disabled = "";
    }
    scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
    if (scanner) {
        document.getElementById('btn-show-scanner').disabled = "";
    }
    
    if (reader != null || scanner != null) {
        document.getElementById('status').remove();
    }
}

document.getElementById('ipt-file').addEventListener('change', async function(){
    let resultsToAlert = [];
    for (let i = 0; i < this.files.length; ++i) {
        let file = this.files[i];
        resultsToAlert.push(i + '. ' + file.name + ":");
        let results = await reader.decode(file);
        console.log(results);
        for (let result of results) {
            resultsToAlert.push(result.barcodeText);
            // Redirect to another page with barcodeText if scanned successfully
            verifyQRData(result.barcodeText);
            // window.location.href = formUrl + '?qrcode=' + encodeURIComponent(result.barcodeText);
        }
    }
    alert(resultsToAlert.join('\n'));
    this.value = '';
});


document.getElementById('btn-show-scanner').addEventListener('click', async () => {
    scanner.onFrameRead = results => {
        if (results.length) {
            console.log(results);
        }
    };

    scanner.onUniqueRead = (txt, result) => {
        console.log(result.barcodeFormatString);
        console.log(txt);

        // Redirect to another page with QR text data
        verifyQRData(txt);
        // window.location.href = formUrl + '?qrcode=' + encodeURIComponent(txt);
    };

    await scanner.show();
});