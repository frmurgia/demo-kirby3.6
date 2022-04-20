<div class="arrow" style="width:5%;padding-top:3rem">
  <a href="<?= url('home') ?>">
    <img src="<?= asset('assets/css/img/Arrow2.svg')->url();  ?>" alt="Link to the full article page" width="100" height="auto">
    
  </a>
</div>


  <?= js('assets/lightbox/lightbox.js') ?>
  <script>

  // Instance deletion button
  document.querySelector("#killer").addEventListener("submit", (e) => {
    if (!confirm("Do you really want to delete your instance?")) {
      e.preventDefault();
    }
  });

  // Expiry time text in the dropdown
  function formatTime(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "pm" : "am";

    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? "0" + minutes : minutes;

    return hours + ":" + minutes + " " + ampm;
  }
  var span = document.querySelector(".absolute-time");
  span.innerText = "at " + formatTime(new Date(span.dataset.timestamp * 1000));

  // Lightbox
  let box = null;
  let logo = document.querySelector(".logo");

  Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
    element.onclick = (e) => {
      e.preventDefault();
      box = basicLightbox.create(`<img src="${element.href}">`);
      box.show();
    };
  });

  logo.onclick = (e) => {
    e.stopPropagation();
  };

  document.onclick = () => {
    logo.removeAttribute("open");
  };

  document.onkeydown = (e) => {
    if (e.key === "Escape") {
      if (box) {
        box.close();
      }
      logo.removeAttribute("open");
    }
  }
  </script>

</body>
</html>
