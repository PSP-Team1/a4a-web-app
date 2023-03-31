
      <div class="dropdown">
         <button href="#accessibilityModal" data-bs-toggle="modal" class="accessButton floating-btn" type="button">
         <b>Accessibility</b>
         </button>
      </div>
      <link rel="stylesheet" href="/assets/css/accessiblity.css" />
   <div id="accessibilityModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Accessibility Features</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <button class="btn btn-outline-secondary" id="increase-font"><i class="fa fa-plus "></i> Increase Font Size</button>
               <button class="btn btn-outline-secondary" id="decrease-font"><i class="fa fa-minus "></i> Decrease Font Size</button>
               <hr>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="negative-contrast-button">
                  <label class="form-check-label" for="negative-contrast-button">
                     Inverted Contrast
                  </label>
               </div>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="high-contrast-button">
                  <label class="form-check-label" for="high-contrast-button">
                     High Contrast
                  </label>
               </div>
               <hr>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="grayscale-toggle">
                  <label class="form-check-label" for="grayscale-toggle">
                     Toggle Greyscale
                  </label>
               </div>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="light-mode-toggle">
                  <label class="form-check-label" for="light-mode-toggle">
                     Light mode (very bright)
                  </label>
               </div>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="dark-mode-toggle">
                  <label class="form-check-label" for="dark-mode-toggle">
                   Dark mode (decrease brightness)
                  </label>
               </div>

               <div class="form-check form-switch">
               <input class="form-check-input" type="checkbox" id="text-speech" onclick="speakPageText()">
               <label class="form-check-label" for="text-speech">
                  Text to speech
               </label>
           </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" id="reset-button">Reset</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <script src="./assets/js/accessibility.js"></script>