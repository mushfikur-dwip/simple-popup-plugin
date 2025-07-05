jQuery(document).ready(function ($) {
  const popupHTML = `
      <div id="spp-popup">
          <div class="spp-popup-content">
              <p>${spp_data.popup_text}</p>
              <a href="${spp_data.cta_link}" class="spp-btn" target="_blank">${spp_data.cta_text}</a>
              <span class="spp-close">&times;</span>
          </div>
      </div>
  `;

  setTimeout(() => {
    $("body").append(popupHTML);

    $(".spp-close").on("click", function () {
      $("#spp-popup").fadeOut();
    });
  }, spp_data.popup_delay * 1000);
});
