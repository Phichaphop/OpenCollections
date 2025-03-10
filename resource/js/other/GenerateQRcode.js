function GenerateQRcode() {
    var CardQrCode = document.getElementById('Qrcode')
    var QRcode = new QRCode(CardQrCode, {
        text: `${MyID}`,
        height: 140,
        width: 140,
        colorDark: "#7d1518",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    })
}