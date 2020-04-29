let formPosts = document.querySelectorAll('.n-form');
for (let item of formPosts) {
	item.onsubmit = async function(e) {
		e.preventDefault();
		let response = await fetch(item.action, {
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
				elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert"><strong>' + val + '</strong></span>');
				return;
			}
		}
		let result = await response.json();
		if (result.status === true) {
			return document.location.href = result.urlBack;
		}
		console.log('fail');
	}
}

