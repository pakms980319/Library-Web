

function createTable() {
    const userId = '사용자ID';     //로그인 정보에서 가져올 것
    var loanList = [];
    const loanHistory = JSON.parse(localStorage.getItem('loanHistory')) || []; 

    loanList = loanHistory.filter(function(item){
        return String(item.userId).matchAll(userId);
    });

    const tableBody = document.getElementById('tbody');
    tableBody.innerHTML = '';

    loanList.forEach(function(item) {
        const row = document.createElement('tr');
    
        const titleCell = row.insertCell();
        titleCell.innerHTML = item.Title;
        titleCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const loanDateCell = row.insertCell();
        loanDateCell.innerHTML = item.loanDate;
        loanDateCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const dueDateCell = row.insertCell();
        dueDateCell.innerHTML = item.dueDate;
        dueDateCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
        
        tableBody.appendChild(row);
    });
}

window.onload = function(){
    createTable();
}
