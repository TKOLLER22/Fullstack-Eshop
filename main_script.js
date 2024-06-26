function navOpen() {
	document.getElementById('nav').classList.add('activeNav');
	document.getElementById('navArrowButton').classList.add('activeArrow');

	if (document.getElementById('nav').classList.contains('activeNav')) {
		document
			.getElementById('navArrowButton')
			.setAttribute('onclick', 'navClose()');
	}
}

function navClose() {
	document.getElementById('nav').classList.remove('activeNav');
	document.getElementById('navArrowButton').classList.remove('activeArrow');

	if (!document.getElementById('nav').classList.contains('activeNav')) {
		document
			.getElementById('navArrowButton')
			.setAttribute('onclick', 'navOpen()');
	}
}

function kosikOpen() {
	document.getElementById('kosik').classList.add('activeKosik');
	document.getElementById('kosikButton').classList.add('activeKosikButton');

	if (document.getElementById('kosik').classList.contains('activeKosik')) {
		document
			.getElementById('kosikButton')
			.setAttribute('onclick', 'kosikClose()');
	}
}

function kosikClose() {
	document.getElementById('kosik').classList.remove('activeKosik');
	document.getElementById('kosikButton').classList.remove('activeKosikButton');

	if (!document.getElementById('kosik').classList.contains('activeKosik')) {
		document
			.getElementById('kosikButton')
			.setAttribute('onclick', 'kosikOpen()');
	}
}
