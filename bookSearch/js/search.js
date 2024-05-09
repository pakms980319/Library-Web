function search() {
    //URL에서 검색 파라미터 가져옴
    const urlParams = new URLSearchParams(window.location.search);
    const SrchType = urlParams.get('SrchType') || 'ALL';
    const SrchKey = urlParams.get('SrchKey') || '';
    const SrchSort = urlParams.get('SrchSort') || 'ASC';

    //검색바에 직전 검색값 설정
    const lastSrchType = document.getElementById('SrchType');
    const lastSrchKey = document.getElementById('SrchKey');
    const lastSrchSort = document.getElementById('SrchSort');
    lastSrchType.value = SrchType;
    lastSrchKey.value = SrchKey;
    lastSrchSort.value = SrchSort;

    let bookData = book;    //book.js의 책 정보
    let result = [];        //검색결과

    //SrchType에 따라 검색 실행
    if (SrchType !== 'ALL') {
        result = bookData.filter(function(item) {
            return String(item[SrchType]).includes(SrchKey);
        });
    } else {
        result = bookData.filter(function(item) {
            return Object.values(item).some(function(value) {
                return String(value).includes(SrchKey);
            });
        });
    }

    //검색결과 정렬
    if(SrchType === 'ALL') {
        if (SrchSort === 'ASC') {
            result.sort(function(a, b) {
                return a.Title.localeCompare(b.Title);
            });
        } else if (SrchSort === 'DESC') {
            result.sort(function(a, b) {
                return b.Title.localeCompare(a.Title);
            });
        }
    }else{
        if (SrchSort === 'ASC') {
            result.sort(function(a, b) {
                return a[SrchType].localeCompare(b[SrchType]);
            });
        } else if (SrchSort === 'DESC') {
            result.sort(function(a, b) {
                return b[SrchType].localeCompare(a[SrchType]);
            });
        }
    }


    const pageSize = 10; // 한 페이지에 보여줄 결과 개수
    const currentPage = getCurrentPage(); // 현재 페이지 번호

    showPagination(result.length, pageSize, currentPage);
    showResultsPerPage(result, currentPage, pageSize);
}

function createTable(result) {
    const tableBody = document.getElementById('tbody');
    tableBody.innerHTML = '';

    result.forEach(function(item) {
        const row = document.createElement('tr');
    
        const titleCell = row.insertCell();
        titleCell.innerHTML = item.Title;
        titleCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const authorCell = row.insertCell();
        authorCell.innerHTML = item.Author;
        authorCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const publisherCell = row.insertCell();
        publisherCell.innerHTML = item.Publisher;
        publisherCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const topicCell = row.insertCell();
        topicCell.innerHTML = item.Topic;
        topicCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        const isbnCell = row.insertCell();
        isbnCell.innerHTML = item.ISBN;
        isbnCell.addEventListener('click', function() {
            window.location.href = `detail.html?id=${item.ISBN}`;
        });
    
        tableBody.appendChild(row);
    });
}

function getCurrentPage() {
    const urlParams = new URLSearchParams(window.location.search);
    const page = parseInt(urlParams.get('page')) || 1;
    return page;
}

function showPagination(totalResults, pageSize, currentPage) {
    const totalPages = Math.ceil(totalResults / pageSize);
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const pageLink = document.createElement('a');
        pageLink.href = `search.html?page=${i}`;
        pageLink.id = 'pagelink';
        pageLink.innerText = i;

        if (i === currentPage) {
            pageLink.classList.add('active');
            pageLink.style.pointerEvents = 'none'; // Disable click events
        }

        paginationContainer.appendChild(pageLink);
    }
}

function showResultsPerPage(result, currentPage, pageSize) {
    const startIndex = (currentPage - 1) * pageSize;
    const endIndex = startIndex + pageSize;
    const resultsPerPage = result.slice(startIndex, endIndex);

    createTable(resultsPerPage);
}

//페이지 로드 시 실행
window.onload = function() {
    search();
};
