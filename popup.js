jQuery(document).ready(function ($) {
  const currentPath = window.location.pathname;
  const targetPath = spp_data.display_url.trim();

  if (targetPath && currentPath !== targetPath) {
    return;
  }

  setTimeout(function () {
    const popupHTML = `
          <div id="spp-popup">
              <div class="spp-popup-content">
                  <p style="color: #000;">${spp_data.popup_text}</p>
                  <a href="${spp_data.cta_link}" class="spp-btn" target="_blank">${spp_data.cta_text}</a>
                  <span class="spp-close" style="color: #000;">&times;</span>
              </div>
          </div>
      `;

    $("body").append(popupHTML);
    $("#spp-popup").hide().fadeIn(500);

    $(".spp-close").on("click", function () {
      $("#spp-popup").fadeOut(300);
    });
  }, spp_data.popup_delay * 1000);
});
