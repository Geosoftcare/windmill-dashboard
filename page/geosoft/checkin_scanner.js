const video = document.getElementById('cameraFeed');
const scanButton = document.getElementById('scanButton');
const cameraPopup = document.getElementById('cameraPopup');
const closePopup = document.getElementById('closePopup');
const qrResultTextbox = document.getElementById('qrResultTextbox');
const qrResultTextbox1 = document.getElementById('qrResultTextbox1');
const qrResultTextbox2 = document.getElementById('qrResultTextbox2');
const qrResultTextbox3 = document.getElementById('qrResultTextbox3');
const qrResultTextbox4 = document.getElementById('qrResultTextbox4');
const qrResultTextbox5 = document.getElementById('qrResultTextbox5');
const qrResultTextbox6 = document.getElementById('qrResultTextbox6');
const qrResultTextbox7 = document.getElementById('qrResultTextbox7');
const qrResultTextbox8 = document.getElementById('qrResultTextbox8');
const qrResultTextbox9 = document.getElementById('qrResultTextbox9');
const qrResultTextbox10 = document.getElementById('qrResultTextbox10');
const qrResultTextbox11 = document.getElementById('qrResultTextbox11');
const qrResultTextbox12 = document.getElementById('qrResultTextbox12');
const qrResultTextbox13 = document.getElementById('qrResultTextbox13');
const qrResultTextbox14 = document.getElementById('qrResultTextbox14');
const qrResultTextbox15 = document.getElementById('qrResultTextbox15');
const qrResultTextbox16 = document.getElementById('qrResultTextbox16');
const qrResultTextbox17 = document.getElementById('qrResultTextbox17');
const qrResultTextbox18 = document.getElementById('qrResultTextbox18');
const qrResultTextbox19 = document.getElementById('qrResultTextbox19');
const qrResultTextbox20 = document.getElementById('qrResultTextbox20');
const qrResultTextbox21 = document.getElementById('qrResultTextbox21');
const qrResultTextbox22 = document.getElementById('qrResultTextbox22');

scanButton.addEventListener('click', async () => {
    cameraPopup.style.display = 'block';
    const constraints = { video: { facingMode: 'environment' } };

    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        video.srcObject = stream;

        video.addEventListener('loadeddata', () => {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const context = canvas.getContext('2d');

            const scan = () => {
                if (video.readyState === video.HAVE_ENOUGH_DATA) {
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, canvas.width, canvas.height);

                    if (code) {
                        qrResultTextbox.value = `QR Code Data: ${code.data}`;
                        stream.getTracks().forEach(track => track.stop());
                        sendQRCodeData(code.data);
                    } else {
                        requestAnimationFrame(scan);
                    }
                }
            };
            setTimeout(scan, 2000);
        });

    } catch (error) {
        console.error('Error accessing camera: ', error);
        alert('Error accessing camera: ' + error.message);
    }
});

closePopup.addEventListener('click', () => {
    cameraPopup.style.display = 'none';
    if (video.srcObject) {
        video.srcObject.getTracks().forEach(track => track.stop());
    }
});

const sendQRCodeData = (data) => {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'processing-start-shift.php';

    const input = document.createElement('input');
    input.type = 'hidden'; 
    input.name = 'qrData'; 
    input.value = data;
    form.appendChild(input);

    const inputs = [
        { name: 'txtCarerId', value: qrResultTextbox1.value },
        { name: 'txtCarerName', value: qrResultTextbox2.value },
        { name: 'txtCarerPC', value: qrResultTextbox3.value },
        { name: 'txtStart', value: qrResultTextbox4.value },
        { name: 'txtStartDate', value: qrResultTextbox5.value },
        { name: 'txtStartTime', value: qrResultTextbox6.value },
        { name: 'txtClientName', value: qrResultTextbox7.value },
        { name: 'txtClientId', value: qrResultTextbox8.value },
        { name: 'txtClientArea', value: qrResultTextbox9.value },
        { name: 'txtClientAddLi1', value: qrResultTextbox10.value },
        { name: 'txtClientAddLi2', value: qrResultTextbox11.value },
        { name: 'txtClientCity', value: qrResultTextbox12.value },
        { name: 'txtClientPostCode', value: qrResultTextbox13.value },
        { name: 'txtTimeSheetDate', value: qrResultTextbox14.value },
        { name: 'txtClientSpecialUserId', value: qrResultTextbox15.value },
        { name: 'txtColAreaId', value: qrResultTextbox16.value },
        { name: 'txtcompanyId', value: qrResultTextbox17.value },
        { name: 'txtVariousCareCalls', value: qrResultTextbox18.value },
        { name: 'txtFirstCarerIdPin', value: qrResultTextbox19.value },
        { name: 'txtCareCallsStartTime', value: qrResultTextbox20.value },
        { name: 'txtCareCallsEndTime', value: qrResultTextbox21.value },
        { name: 'txtClientCareCallsDate', value: qrResultTextbox22.value }
    ];

    inputs.forEach(inputData => {
        const input = document.createElement('input');
        input.type = 'hidden'; 
        input.name = inputData.name; 
        input.value = inputData.value;
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
};
