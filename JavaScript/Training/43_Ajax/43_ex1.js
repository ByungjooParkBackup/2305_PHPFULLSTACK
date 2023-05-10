const btn1 = document.getElementById('btn1');
const divImg = document.getElementById('divImg');

btn1.addEventListener('click', function() {
	const url = document.getElementById('apiUrl').value.trim();
	getApiData(url);
});

async function getApiData(url) {
	fetch(url)
	.then(res => {
		if(res.ok) { // 응답이 200번대 이면 OK
			return res.json();
		} else { // 응답이 200번대 이외의 경우 에러 처리
			throw new Error('API 에러');
		}
	})
	.then(data => makeList(data))
	.catch(alert('전체 에러'));
}

function makeList(data) {
	removeTagImg();

	data.forEach(item => {
		console.log(item);
		const tagImg = createTagImg(item);
	});
}

function createTagImg(item) {
	const tagImg = document.createElement('img');
	tagImg.setAttribute('src', item.download_url);
	divImg.appendChild(tagImg);
}

function removeTagImg() {
	//while(divImg.firstChild) {
	//	divImg.firstChild.remove();
	//}
	//divImg.replaceChildren();

	divImg.innerHTML = '';
}