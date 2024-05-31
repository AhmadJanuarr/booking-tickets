document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".needs-validation").forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
});

function hitungHarga() {
  let form = document.getElementById("formPemesanan");
  let checkBox = form.querySelectorAll("input[type=checkbox]:checked");
  totalHarga = 0;

  checkBox.forEach((element) => {
    total = parseInt(element.getAttribute("data-harga"));
    totalHarga += total;
  });

  let hargaPaket = document.getElementById("harga");
  hargaPaket.value = totalHarga;

  updateTagihan();
}

function updateTagihan() {
  let tagihan = document.getElementById("tagihan");
  let peserta = document.getElementById("peserta").value;
  let hargaPaket = document.getElementById("harga").value;

  if (peserta && hargaPaket) {
    tagihan.value = peserta * hargaPaket;
  } else {
    tagihan.value = 0;
  }
}

let checkBoxes = document.querySelectorAll("input[type=checkbox]");
checkBoxes.forEach((element) => {
  element.addEventListener("change", hitungHarga);
});

let peserta = document.getElementById("peserta");
peserta.addEventListener("input", updateTagihan);

document.addEventListener("DOMContentLoaded", function () {
  if (typeof showModal !== "undefined" && showModal) {
    let myModal = new bootstrap.Modal(
      document.getElementById("successModal"),
      {}
    );
    myModal.show();
  }
});
