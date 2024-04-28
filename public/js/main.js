const playBtn = document.getElementById("playBtn");
playBtn.addEventListener("click", (e) => {
    e.preventDefault();
    let allQrCodes;
    const scanQrCode = document.getElementById("scanQrCode").value;
    if (scanQrCode) { 
        catchData(scanQrCode);
    } else {
        alert("Pleae Check URL");
    }
});

function catchData(scanQrCode) {
    fetch("http://127.0.0.1:8000/api/all-qrcode/")
        .then((res) => res.json())
        .then((data) => {
            allQrCodes = data;
            processUrl(data, scanQrCode);
        })
        .catch((error) => {
            console.log(error);
        });
}

function processUrl(data, shortenedUrl) {
    data.map((qr) => {
        if (qr.shortened_url === shortenedUrl) {
            // window.location.href = qr.original_url;
            console.log(qr.original_url);
            window.open(
                qr.original_url,
                "_blank" // <- This is what makes it open in a new window.
            );
        } else {
            alert("Pleae Scan Again");
        }
    });
}
