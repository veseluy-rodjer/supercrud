// send post to server
let formPosts = document.querySelectorAll('.n-form');
for (let item of formPosts) {
	item.onsubmit = async function() {
		event.preventDefault();
		let response = await fetch(item.action, {
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
			},
			method: 'POST',
			body: new FormData(item)
		});
		let	elementErrors = document.querySelectorAll('.invalid-feedback');
		for (let elementError of elementErrors) {
			elementError.remove();
		}
		if (response.status == 422) {
			let result = await response.json();
			for (let [key, val] of Object.entries(result.errors)) {
				let elem = document.querySelector('#' + key.replace(/_/g, '-'));
				elem.classList.add('is-invalid');
				elem.classList.add('error');
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert">' + val + '</span>');
				return;
			}
		}
		let result = await response.json();
		if (result.status != null) {
			localStorage.setItem('presentToastr', result.status);
			return document.location.href = result.urlBack;
			// toastr.subscribe(function(args){
				// return document.location.href = result.urlBack;
			// });
		}
		else {
			console.log('fail');
		}
	}
}

