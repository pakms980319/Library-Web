const boardInfo = data;
const boardDetail = document.getElementById('tb01');

boardInfo.forEach((item, index) => {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td align="center" valign="top">${item.no}</td>
        <td class="book_titletd" style="text-align: left; padding-left: 50px;">
            <a href="./boardDetail.html?no=${index + 1}">${item.Title}</a>
        </td>
        <td> ${item.Writer} </td>
        <td>${item.Date}</td>
        <td>${item.View}</td>
    `;
    boardDetail.appendChild(row);
});