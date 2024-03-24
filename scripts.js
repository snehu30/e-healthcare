const startButton = document.getElementById('startButton');
const endButton = document.getElementById('endButton');
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');

let localStream;
let remoteStream;
let pc;

startButton.addEventListener('click', startCall);
endButton.addEventListener('click', endCall);

async function startCall() {
    try {
        localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        localVideo.srcObject = localStream;

        pc = new RTCPeerConnection();
        pc.addStream(localStream);
        pc.ontrack = handleRemoteStreamAdded;
        
        const offer = await pc.createOffer();
        await pc.setLocalDescription(offer);

        // Send the offer to a signaling server, handle signaling here
    } catch (error) {
        console.error('Error starting call:', error);
    }
}

function handleRemoteStreamAdded(event) {
    remoteStream = event.streams[0];
    remoteVideo.srcObject = remoteStream;
}

function endCall() {
    if (pc) {
        pc.close();
    }
    localVideo.srcObject = null;
    remoteVideo.srcObject = null;
}