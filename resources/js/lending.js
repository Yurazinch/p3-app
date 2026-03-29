const regButtons = document.querySelectorAll('.regbtn');
const logButton = document.getElementById('logbtn');
const backButton = document.getElementById('backbtn');
const confirmButton = document.getElementById('confirmbtn');
const logModal = document.getElementById('logModal');
const regModal = document.getElementById('regModal');
const backModal = document.getElementById('backModal');
const confirModal = document.getElementById('confirModal');
const closeLog = document.getElementById('closeLog');
const closeReg = document.getElementById('closeReg');
const closeBack = document.getElementById('closeBack');
const closeConfirm = document.getElementById('closeConfirm');
regButtons.forEach(regButton => {
    regButton.addEventListener('click', () => {
        regModal.showModal();
    });
});
logButton.addEventListener('click', () => {
    logModal.showModal();
});
backButton.addEventListener('click', () => {
    backModal.showModal();
});
confirmButton.addEventListener('click', () => {
    confirModal.showModal();
    logModal.close();
});
closeReg.addEventListener('click', () => {
    regModal.close();
});            
closeLog.addEventListener('click', () => {
    logModal.close();
});
closeBack.addEventListener('click', () => {
    backModal.close();
});
closeConfirm.addEventListener('click', () => {
    confirModal.close();
}); 