const imgDiv = document.querySelector('profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function()
{
	uploadBtn.style.display = "block"
});