var form = document.querySelector('#letter')

const fadeIn = (el, timeout, display) => {
	el.style.opacity = 0;
	el.style.display = display || 'block';
	el.style.transition = `opacity ${timeout}ms`;
	setTimeout(() => {
		el.style.opacity = 1;
	}, 10);
};

const fadeOut = (el, timeout) => {
	el.style.opacity = 1;
	el.style.transition = `opacity ${timeout}ms`;
	el.style.opacity = 0;

	setTimeout(() => {
		el.style.display = 'none';
	}, timeout);
};

form.addEventListener('click', function(event) {

	if(event.target.id === 'submit') {
		event.preventDefault();

		let name = this.name.value
		let email = this.email.value
		let topic = this.topic.value
		let message = this.message.value
		let url = this.getAttribute('action')
		let token = this._token.value

		let data = {
			name:name,
			email:email,
			topic:topic,
			message: message
		}

		let preloader = document.querySelector('#preloader')
		preloader.style.display = 'block'


		var request = new XMLHttpRequest();

		request.open('POST', url, true);
		request.setRequestHeader("Content-type", "application/json")
		request.setRequestHeader("X-CSRF-TOKEN", token)


		request.onreadystatechange = function() {

			if(request.readyState === 4 && request.status === 200) {
				preloader.style.display = 'none'
				let response = JSON.parse(request.responseText)
				form.querySelectorAll('.error').forEach(function(item) {
					item.remove()
				})
				if(response.error) {
					for(let item in response.error) {
						if(form[item]) {
							let div = document.createElement('div')
							div.classList.add('error')
							form[item].insertAdjacentElement('afterend', div)
						}

						form[item].nextElementSibling.innerHTML = response.error[item]

					}
				}else if (response.success) {
					let status = document.querySelector('#status')

					if(status.innerHTML = response.success) {
						form.reset()

						fadeIn(document.querySelector('#status'), 300)
						setTimeout(function() {
							fadeOut(document.querySelector('#status'), 300)
						}, 3000)
					}
				}
			}
		}
		request.send(JSON.stringify(data))
	}


})
