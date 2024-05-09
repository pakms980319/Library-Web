const addButton = document.getElementById('add-button');

addButton.addEventListener('click', (event) => {
    // fomr 전송 막기
    event.preventDefault();
    const isbnInput = document.getElementById('isbn');
    const titleInput = document.getElementById('title');

    const isbn = isbnInput.value;
    const title = titleInput.value;

    if (isbn && title) {
        if (/^\d{13}$/.test(isbn)) {
            // form 전송 진행
            event.target.form.submit();
            isbnInput.value = '';
            titleInput.value = '';
        } else {
            alert('ISBN은 13자리의 숫자로 입력해주세요.');
        }
    } else {
        alert('ISBN과 책 제목을 모두 입력해주세요.');
    }
});

function cancelButton(isbn) {

    var formData = new FormData();
    formData.append("isbn", isbn);

    // AJAX 사용하여 서버에 데이터 전송
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./cancel_process.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var response = JSON.parse(this.responseText);
            if (response.success) {
                alert(response.msg);
                location.reload();
            } else {
                alert(response.msg);
            }
        }
    }

    xhr.send(formData);
}