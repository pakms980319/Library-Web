const urlParams = new URLSearchParams(window.location.search);
const postId = urlParams.get('no');

const Container = document.getElementById('search_result');
const boardInfo = data;
const selectedPost = boardInfo.find((item) => item.no === postId);

if (selectedPost) {
    const postHTML = `
        <table id="tb01">
            <tr style="border-bottom: 1px solid #d2d2d2;"></tr>
            <tr>
                <th style="width: 50px; text-align: center;">Title</th>
                <td style="border-right: 1px solid #d2d2d2;"></td>
                <td>&nbsp${selectedPost.Title}</td>
            </tr>
            <tr style="border-bottom: 1px solid #d2d2d2;"></tr>
            <tr>
                <th style="width: 50px; text-align: center;">작성자</th>
                <td style="border-right: 1px solid #d2d2d2;"></td>
                <td>&nbsp${selectedPost.Writer}</td>
                <td style="border-right: 1px solid #d2d2d2;"></td>
                <th style="width: 50px; text-align: center;">DATE</th>
                <td style="border-right: 1px solid #d2d2d2;"></td>
                <td>&nbsp${selectedPost.Date}</td>
            </tr>
            <tr style="border-bottom: 1px solid #d2d2d2;"></tr>
            <tr>
                <th>&nbsp내용</th>
            </tr>
            <tr style="border-bottom: 1px solid #d2d2d2;"></tr>
        </table>
        <br>
        <table>
            <tr>
                <span>${selectedPost.Content}</span>
            </tr>
        </table>
    `;
    Container.innerHTML = postHTML;
} else {
    Container.innerHTML = '<p>게시글을 찾을 수 없습니다.</p>';
}