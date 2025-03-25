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
    form.action = 'processing-check-out-form.php';

    const input = document.createElement('input');
    input.type = 'hidden'; 
    input.name = 'qrData'; 
    input.value = data;
    form.appendChild(input);

    const inputs = [
        { name: 'txtTaskId', value: qrResultTextbox1.value },
        { name: 'txtCurrentTime', value: qrResultTextbox2.value },
        { name: 'txtPlannedTimeIn', value: qrResultTextbox3.value },
        { name: 'txtPlannedTimeOut', value: qrResultTextbox4.value },
        { name: 'txtCareCalls', value: qrResultTextbox5.value },
        { name: 'txtCompanyId', value: qrResultTextbox6.value },
        { name: 'txtCarerId', value: qrResultTextbox7.value },
        { name: 'txtClientIdCode', value: qrResultTextbox8.value },
        { name: 'txtWorkedPayRate', value: qrResultTextbox9.value },
        { name: 'txtCarerMileage', value: qrResultTextbox10.value },
        { name: 'txtCareCallTime', value: qrResultTextbox11.value },
        { name: 'txtCareCallId', value: qrResultTextbox12.value }
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
