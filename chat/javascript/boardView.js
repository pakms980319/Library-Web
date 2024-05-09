const boardInfo = data;
const boardDetail = document.getElementById('notice');

for (let i = 0; i < 4; i++) {
    const item = boardInfo[i];
    const row = document.createElement('li');
    row.innerHTML = `
        <a href="./board/boardDetail.html?no=${i+1}">${item.Title}</a>
        <span class="date">${item.Date}</span>
    `;
    boardDetail.appendChild(row);
}