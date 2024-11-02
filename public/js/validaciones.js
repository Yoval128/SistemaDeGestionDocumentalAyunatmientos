/* Validation of numbers of the register, alter form */

document.getElementById('id_tramite').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
