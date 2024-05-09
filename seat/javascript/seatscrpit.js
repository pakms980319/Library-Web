var seatMap = JSON.parse(localStorage.getItem('seatMap')) || {};
var selectedSeat = null;
var selectedRoom = null; // 선택한 열람실 저장
var roomSelect = document.getElementById("room-select");
roomSelect.addEventListener("change", function () {
  selectedRoom = this.value; // 선택한 열람실 업데이트
  updateSeatMap(selectedRoom);
});

function updateSeatMap(room) {
  // 열람실에 따라 좌석 정보 초기화
  if (room === "room1") {
    // seat-map1을 보여주면 됨
    document.getElementById("seat-map1").style.display = "block";
    document.getElementById("seat-map2").style.display = "none";
    document.getElementById("seat-map3").style.display = "none";
  } else if (room === "room2") {
    // seat-map2을 보여주면 됨
    document.getElementById("seat-map1").style.display = "none";
    document.getElementById("seat-map2").style.display = "block";
    document.getElementById("seat-map3").style.display = "none";
  } else if (room === "room3") {
    // seat-map3을 보여주면 됨
    document.getElementById("seat-map1").style.display = "none";
    document.getElementById("seat-map2").style.display = "none";
    document.getElementById("seat-map3").style.display = "block";
  }

  // 예약 현황 업데이트
  updateReservationStatus();
}

function handleSeatClick(room, seatIndex, element) {
  if (element.classList.contains("reserved")) {
    alert("이미 예약된 좌석입니다.");
    return;
  }
  if (element.classList.contains("selected")) {
    element.classList.remove("selected");
    return;
  }
  const previouslySelected = document.querySelector(".seat.selected");
  if (previouslySelected) {
    previouslySelected.classList.remove("selected");
  }
  selectedSeat = seatIndex;
  selectedRoom = room;
  element.classList.add("selected");
}

function cancelReservation(room, seatIndex) {
    var formData = new FormData();
    formData.append("room", room);
    formData.append("seatIndex", seatIndex);

    // AJAX 사용하여 서버에 데이터 전송
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./cancel_process.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        var response = JSON.parse(this.responseText);
        if (response.success) {
            alert(response.message);
            window.location.reload();
        } else {
            alert(response.message);
        }
        }
    };
    xhr.send(formData);
}

function updateReservationStatus() {
}

function reservation(user_id) {
  if (selectedSeat === null) {
    alert("좌석을 선택해주세요.");
    return;
  }

  // 현재 선택된 좌석 정보를 formData에 추가
  var formData = new FormData();
    formData.append("room", selectedRoom);
    formData.append("seatIndex", selectedSeat);
    formData.append("user_id", user_id);

    // AJAX 사용하여 서버에 데이터 전송
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./reservation_process.php", true);
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        var response = JSON.parse(this.responseText);
        if (response.success) {
          alert(response.message);
          window.location.reload();
        } else {
          alert(response.message);
        }
      }
    };
    xhr.send(formData);
};

var cancelButton = document.createElement("button"); // 버튼 생성
cancelButton.id = "cancel-button";
cancelButton.innerText = "예약 취소";
cancelButton.addEventListener("click", function () {
  if (selectedSeat === null) {
    alert("좌석을 선택해주세요.");
    return;
  }

  var seatIndex = selectedSeat.dataset.seatIndex;
  var currentRoom = seatMap[selectedRoom];
  if (!currentRoom.seats[seatIndex].reserved) {
    alert("선택한 좌석은 예약되어 있지 않습니다.");
    return;
  }

  currentRoom.seats[seatIndex].reserved = false;
  selectedSeat.classList.remove("reserved");
  updateReservationStatus();
  stopCountdown(selectedRoom, seatIndex);
  localStorage.setItem("seatMap", JSON.stringify(seatMap));
});

function extendReservation(user_id, room, seatIndex) {
  var formData = new FormData();
  formData.append("room", room);
  formData.append("seatIndex", seatIndex);
  formData.append("user_id", user_id);

  // AJAX 사용하여 서버에 데이터 전송
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./extend_process.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.success) {
        alert(response.message);
        window.location.reload();
      } else {
        alert(response.message);
      }
    }
  };
  xhr.send(formData);
};

// 초기 열람실에 따른 좌석 정보 업데이트
selectedRoom = roomSelect.value;
updateSeatMap(selectedRoom);

var savedSeatInfo = JSON.parse(localStorage.getItem("selectedSeat"));
if (savedSeatInfo !== null) {
  var savedRoom = savedSeatInfo.room;
  var savedSeatIndex = savedSeatInfo.seatIndex;
  var savedSeat = document.querySelector(`[data-seat-index="${savedSeatIndex}"]`);
  if (savedSeat && seatMap.hasOwnProperty(savedRoom)) {
    var currentRoom = seatMap[savedRoom];
    if (!currentRoom.seats[savedSeatIndex].reserved) {
      savedSeat.classList.add("selected");
      selectedSeat = savedSeat;
      currentRoom.seats[savedSeatIndex].reserved = true;
      startCountdown(savedRoom, savedSeatIndex); // 카운트다운 시작
    } else {
      console.log("저장된 좌석이 이미 예약되어 있습니다.");
    }
  } else {
    console.log("저장된 좌석 정보가 유효하지 않습니다.");
  }
}

function startCountdown(room, seatIndex) {
  var countdownTime = seatMap[room].seats[seatIndex].time * 60; // Convert minutes to seconds
  var countdownInterval = setInterval(function () {
    countdownTime--;
    if (countdownTime <= 0) {
      stopCountdown(room, seatIndex);
      alert("시간이 만료되었습니다.");
    } else {
      var minutes = Math.floor(countdownTime / 60); // Get the remaining minutes
      var seconds = countdownTime % 60; // Get the remaining seconds
      console.log("남은 시간: " + minutes + ":" + (seconds < 10 ? "0" : "") + seconds);
      seatMap[room].seats[seatIndex].time = minutes + ":" + (seconds < 10 ? "0" : "") + seconds; // Update seatMap with remaining time
      updateReservationStatus();
      localStorage.setItem("seatMap", JSON.stringify(seatMap)); // 예약 정보를 로컬 스토리지에 저장
    }
  }, 1000); // 1초마다 업데이트

  // 카운트다운 인터벌을 seatMap에 저장
  seatMap[room].seats[seatIndex].countdownInterval = countdownInterval;
}

function stopCountdown(room, seatIndex) {
  if (selectedSeat !== null) {
    var currentRoom = seatMap[room];
    if (currentRoom.seats[seatIndex].countdownInterval) {
      clearInterval(currentRoom.seats[seatIndex].countdownInterval);
      currentRoom.seats[seatIndex].countdownInterval = null;
      currentRoom.seats[seatIndex].time = 60; // 시간을 초기화
      localStorage.setItem("seatMap", JSON.stringify(seatMap)); // 예약 정보를 로컬 스토리지에 저장
    }
  }
}

localStorage.setItem('seatMap', JSON.stringify(seatMap)); // 좌석 정보를 로컬 스토리지에 저장
