@extends('layouts.index')

@section('konten')
<!-- Header -->
<div class="w-full bg-gradient-to-r from-[#FFE6E1] to-[#F0BAAF] shadow-md z-50 mt-[50px] p-8 min-h-[250px] background-color-[#F0BAAF]">
    <h1 class=" font-['Istok_Web'] font-semibold text-5xl mt-[40px] text-[#C04C4C] ">Gigiku Dental Clinic</h1>
    <h2 class="font-['Istok_Web'] font-semibold text-[#C04C4C]">JL. raden Kartini No.61/63
        <p>Kecamatan Kejaksan Kota Cirebon</p> 
        <p>Jawa Barat Indonesia</p> 
        <h1 class="font-['Istok_Web'] font-semibold text-4xl z-50 mt-[10px]  text-[#C04C4C]">Pilih Jadwal :</h1>
        </div>
</div>

<!-- Content -->
<div class="max-w-4xl mx-auto px-4 py-6">
  <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col gap-6">

    <!-- Header Kalender -->
    <div class="flex justify-between items-center mb-4">
      <button id="prev-month" class="px-3 py-1 bg-[#C04C4C] text-white rounded hover:bg-[#a93d3d]">Prev</button>
      <h2 id="calendar-title" class="text-xl font-semibold text-[#C04C4C]"></h2>
      <button id="next-month" class="px-3 py-1 bg-[#C04C4C] text-white rounded hover:bg-[#a93d3d]">Next</button>
    </div>

    <!-- Nama Hari -->
    <div class="grid grid-cols-7 gap-2 text-center font-semibold text-[#C04C4C] mb-2">
      <div>Sen</div>
      <div>Sel</div>
      <div>Rab</div>
      <div>Kam</div>
      <div>Jum</div>
      <div>Sab</div>
      <div>Min</div>
    </div>

    <!-- Grid Kalender -->
    <div id="calendar" class="grid grid-cols-7 gap-2"></div>

    <!-- Pilih Jam -->
    <div id="jam-section" class="hidden mt-6">
      <h2 class="text-[#C04C4C] font-semibold text-lg mb-4">Pilih Jam</h2>
      <div id="jam-container" class="grid grid-cols-3 sm:grid-cols-4 gap-3"></div>
    </div>

    <!-- Tombol Selanjutnya -->
    <div class="mt-6 flex justify-center">
      <form action="" method="POST" id="form-reservasi">
        @csrf
        <input type="hidden" name="tanggal" id="tanggal-hidden">
        <input type="hidden" name="jam" id="jam-hidden">

        <a href="4"
        type="submit"
                id="btn-selanjutnya"
                class="w-[320px] mb-4 px-6 py-3 rounded-xl bg-gray-400 text-white text-lg text-center transition hover:opacity-80 cursor-not-allowed pointer-events-none">
          Selanjutnya
      </a>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const calendarTitle = document.getElementById("calendar-title");
  const calendarContainer = document.getElementById("calendar");
  const prevMonthBtn = document.getElementById("prev-month");
  const nextMonthBtn = document.getElementById("next-month");
  const jamSection = document.getElementById("jam-section");
  const jamContainer = document.getElementById("jam-container");
  const btnSelanjutnya = document.getElementById("btn-selanjutnya");

  const tanggalHidden = document.getElementById("tanggal-hidden");
  const jamHidden = document.getElementById("jam-hidden");

  let selectedDate = null;
  let selectedTime = null;
  let currentMonth = new Date().getMonth();
  let currentYear = new Date().getFullYear();

  const monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
  ];

  function renderCalendar() {
    calendarContainer.innerHTML = "";
    calendarTitle.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const today = new Date();

    const startDayIndex = firstDay === 0 ? 6 : firstDay - 1;

    // Placeholder sebelum tanggal 1
    for (let i = 0; i < startDayIndex; i++) {
      const emptyCell = document.createElement("div");
      calendarContainer.appendChild(emptyCell);
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const dateButton = document.createElement("button");
      dateButton.textContent = day;
      dateButton.className = "p-2 rounded-lg border text-center transition";

      const thisDate = new Date(currentYear, currentMonth, day);

      if (thisDate < new Date(today.getFullYear(), today.getMonth(), today.getDate())) {
        dateButton.classList.add("bg-gray-200", "text-gray-400", "cursor-not-allowed");
        dateButton.disabled = true;
      } else {
        dateButton.classList.add("hover:bg-[#F0BAAF]");
        dateButton.addEventListener("click", () => {
          document.querySelectorAll("#calendar button").forEach(btn => {
            btn.classList.remove("bg-[#C04C4C]", "text-white");
          });

          dateButton.classList.add("bg-[#C04C4C]", "text-white");
          selectedDate = `${currentYear}-${String(currentMonth + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;

          jamSection.classList.remove("hidden");
          checkSelection();
        });
      }

      // Highlight hari ini
      if (
        thisDate.getDate() === today.getDate() &&
        thisDate.getMonth() === today.getMonth() &&
        thisDate.getFullYear() === today.getFullYear()
      ) {
        dateButton.classList.add("border-2", "border-[#C04C4C]");
      }

      calendarContainer.appendChild(dateButton);
    }
  }

  prevMonthBtn.addEventListener("click", () => {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    renderCalendar();
  });

  nextMonthBtn.addEventListener("click", () => {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    renderCalendar();
  });

  // Generate pilihan jam
  const jamList = ["09:00", "10:00", "11:00", "13:00", "14:00", "15:00"];
  jamList.forEach(jam => {
    const jamButton = document.createElement("button");
    jamButton.textContent = jam;
    jamButton.type = "button";
    jamButton.className = "p-2 border rounded-lg hover:bg-[#F0BAAF] transition";

    jamButton.addEventListener("click", () => {
      document.querySelectorAll("#jam-container button").forEach(btn => {
        btn.classList.remove("bg-[#C04C4C]", "text-white");
      });

      jamButton.classList.add("bg-[#C04C4C]", "text-white");
      selectedTime = jam;
      checkSelection();
    });

    jamContainer.appendChild(jamButton);
  });

  function checkSelection() {
    if (selectedDate && selectedTime) {
      tanggalHidden.value = selectedDate;
      jamHidden.value = selectedTime;
      btnSelanjutnya.classList.remove("bg-gray-400", "cursor-not-allowed", "pointer-events-none");
      btnSelanjutnya.classList.add("bg-[#C04C4C]", "cursor-pointer");
    } else {
      btnSelanjutnya.classList.add("bg-gray-400", "cursor-not-allowed", "pointer-events-none");
      btnSelanjutnya.classList.remove("bg-[#C04C4C]", "cursor-pointer");
    }
  }

  renderCalendar();
});
</script>
@endsection
