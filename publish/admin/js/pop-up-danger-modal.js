// pop up danger modal with delete model
let dangerButtons = document.querySelectorAll('[data-modal-danger-button="danger"]');
for (let item of dangerButtons) {
	item.onclick = () => {
		let modalDangerNative = document.querySelector('#modal-danger');
		modalDangerNative.querySelector('[type="submit"]').setAttribute('form', item.dataset.modalDangerForm);
		let modalDanger = $('#modal-danger');
		modalDanger.modal('show');
	}
}

