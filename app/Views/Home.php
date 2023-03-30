<!DOCTYPE html>
<?= view('templates/accessibility'); ?>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Everybody Welcome</title>
      <style type="text/css">
         #terms-and-conditions {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
         display: none;
         }
         #terms-and-conditions-overlay {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         backdrop-filter: blur(5px);
         }
         #terms-and-conditions-content {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 80%;
         max-width: 500px;
         max-height: 80%;
         overflow-y: auto;
         background-color: white;
         padding: 20px;
         text-align: center;
         }
      </style>
      <link href="<?= base_url(); ?>/assets/css/style_theme.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
      <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
      <!-- <meta http-equiv="refresh" content="5"> -->
      <link href="<?= base_url(); ?>/assets/css/venueSearch/style.css" rel="stylesheet">
      <style>
         /* chips */
         .chip-container {
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         padding: 5px;
         }
         .chip {
         display: inline-block;
         background-color: #ccc;
         color: #fff;
         padding: 5px;
         margin-right: 5px;
         margin-bottom: 5px;
         border-radius: 5px;
         }
         .close {
         margin-left: 5px;
         cursor: pointer;
         }
         #update-results-btn {
         display: none;
         }
         /* sticky banner FIXME - disappears after certain scroll distance */
         .sticky-top {
         position: sticky;
         top: 0;
         }
         /* scroll to top btn */
         .btn-scroll-top {
         position: fixed;
         bottom: 50px;
         right: 20px;
         width: 50px;
         height: 50px;
         background-color: #2e8184;
         color: #fff;
         border: none;
         border-radius: 50%;
         font-size: 24px;
         cursor: pointer;
         opacity: 0;
         transition: opacity 0.3s ease-in-out;
         z-index: 9999;
         }
         .btn-scroll-top:hover {
         opacity: 1;
         }
         #video-popup {
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         z-index: 9999;
         background-color: rgba(255, 255, 255, 0.8);
         padding: 20px;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
         }
         .nav-item {
         background-color: #0081C9 !important;
         }
      </style>
      <script type="text/javascript">
         function acceptTerms() {
             document.getElementById('terms-and-conditions').style.display = 'none';
             document.body.classList.remove('blur');
         }
         
         window.onload = function() {
             document.getElementById('terms-and-conditions').style.display = 'block';
             document.body.classList.add('blur');
         }
      </script>
   </head>
   <body>
      <!-- <div id="video-popup">
         <div class="popup-header">
            <h2>Getting started? Click here to find out how to search</h2>
         </div>
         <iframe width="560" height="315" src="https://www.youtube.com/embed/4Hz7_sxOMf4?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
         <button id="close-button">Close</button>
         </div> -->
      <script>
         window.addEventListener('load', function() {
           var popup = document.getElementById('video-popup');
           popup.style.display = 'block';
           document.getElementById('close-button').addEventListener('click', function() {
             popup.style.display = 'none';
           });
         });
      </script>
      <div id="terms-and-conditions">
         <div id="terms-and-conditions-overlay"></div>
         <div id="terms-and-conditions-content">
            <h2>Terms and Conditions</h2>
            <p>  Acceptance of Terms: By using this website, you agree to be bound by these terms and conditions. This website is for personal use only. You may not use this website for any commercial purpose without prior written permission.
               You agree to use this website in a manner that is lawful, ethical, and respectful of others. You may not use this website to harass, harm, or threaten others.
               All content on this website is the property of the website owner or its licensors and is protected by copyright and other intellectual property laws. You may not reproduce, distribute, or modify any content on this website without prior written permission.
               This website is provided on an "as is" and "as available" basis. The website owner makes no warranties, express or implied, regarding the website's operation or the information, content, or materials provided on the website.
               The website owner will not be liable for any damages of any kind arising from the use of this website, including but not limited to direct, indirect, incidental, punitive, and consequential damages.
               You agree to indemnify and hold the website owner harmless from any claim, demand, or damage arising from your use of this website.
               The website owner may terminate your access to this website at any time for any reason.
               These terms and conditions shall be governed by and construed in accordance with the laws of [insert jurisdiction].
               The website owner reserves the right to modify these terms and conditions at any time. Your continued use of this website after any such modifications shall constitute your acceptance of the modified terms and conditions. 
            </p>
            <a onclick="acceptTerms()" style="border-color: #fff; background-color: #2e8184; color: white;" class="btn btn-primary" aria-current="page">
            <i class="bi bi-check"></i> I Agree
            </a>
         </div>
      </div>
      <button aria-label="scroll to top" class="btn-scroll-top" title="Scroll to top"><i class="fa fa-chevron-up"></i></button>
      <!-- <button type="button" class="btn btn-primary" id="showLoaderBtn">
         Test Loader
         </button> -->
      <div id="overlay" class="overlay d-none">
         <div class="loader">
            <!-- <h2 class="text-white">Loading...</h3> -->
            <object class="svg-loader" type="image/svg+xml" data="<?= base_url(); ?>/assets/img/vectors/a4a-circles.svg"></object>
         </div>
      </div>
      <nav class="navbar navbar-expand-lg bg-light">
         <div class="container-fluid">
            <button aria-label="toggle navbar" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
               <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li style="margin-right: 10px;">
                     <a style="border-color: #fff; background-color: #2e8184; color: white;" class="btn btn-primary" aria-current="page" href="<?= base_url() ?>/Login">
                     <i class="bi bi-person"></i> Login / Register
                     </a>
                  </li>
                  <li style="margin-right: 10px;">
                     <a style="border-color: #fff; background-color: #2e8184; color: white;" class="btn btn-success" aria-current="page" href="/Affiliates">
                     <i class="bi bi-people"></i> About Us
                     </a>
                  </li>
                  <li>
                     <a style="border-color: #fff; background-color: #2e8184; color: white;" class="btn btn-secondary" aria-current="page" href="/FAQ">
                     <i class="bi bi-question-circle"></i> FAQ
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div style="background-image: url('https://i.imgur.com/3pF1T5w.png'); 
         background-size: contain; 
         background-position: center center; 
         height: 150px; 
         width: 100%; 
         position: relative;">
      <div class="container">
         <div class="banner-search">
         </div>
      </div>
      <br>
      <div style="background-color: #76a89b" class="container-fluid px-0 fluid-banner sticky-top">
      <div class="container">
         <div class="banner-search">
            <img style="padding: 5px; margin-bottom: -10px; margin-left: -15px;" src="<?= base_url(); ?>/assets/img/Making-Everybody-Welcome.png" alt="Bootstrap" height="110">
            <div class="input-group">
               <input style="margin-right: 50px; border-radius: 20px;" id="search-input" type="text" placeholder="Search For Venue..." class="form-control search-input" title="Enter the location you are looking for here">
               <div class="input-group-append">
                  <a style="border-radius: 10px; margin-right: 50px; border-color: #fff; background-color: #F1C40F; color: black; padding: 15px 25px; font-size: 18px;" class="btn-find-venues btn btn-primary" aria-current="page">
                  <i class="fa fa-search"></i> Find Venues
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div style="background-color: #498071">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="box">
                     <br><br><br>
                     <h2 style="font-size: 44px; color: white; font-family: 'Bradley Hand', cursive, sans-serif; text-shadow: 2px 2px 0px #006633;">Welcome to Access For All!</h2>
                     <br><br>
                     <p style="font-size: 16px; color: white; font-family: 'Arial', cursive, sans-serif; text-shadow: 2px 2px 0px #006633;">
                        Access For All UK is a company dedicated to providing accessibility solutions for businesses and public spaces across the UK. Our mission is to create an inclusive environment where everyone, regardless of their ability, can access the services they need. We offer a range of services, including access audits, disability awareness training, and consultancy on accessibility issues.
                     </p>
                     <br><br><br>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="video">
                     <iframe style="margin-left: 12px; margin-top: 45px; box-shadow: 3px 3px 7px rgba(0,0,0,0.5);" width="100%" height="300" src="https://www.youtube.com/embed/4Hz7_sxOMf4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
            <br><br>
         </div>
      </div>
      <div style="background: linear-gradient(to bottom, #498071, white);" class="container-fluid">
         <div class="container v-search-container pt-2">
            <div class="row">
               <div class="col-lg-2">
                  <button style="border-radius: 10px; border-color: #fff; background-color: #F1C40F; color: black; padding: 5px; font-size: 16px;" aria-label="update search results button" class="btn btn-secondary" id="update-results-btn">Update Results <span id="search-changes"></span></button>
                  <br>
               </div>
               <div class="col-lg-10">
                  <div class="chip-container">
                     <div class="chip-list"></div>
                  </div>
               </div>
               <div class="col-lg-2">
                  <div class="ibox">
                     <!-- Venue types -->
                     <div class="accordion" id="venueTypeAccordion">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingOne">
                              <button aria-label="expand venue types menu" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#venueTypeSubMenu" aria-expanded="true" aria-controls="venueTypeSubMenu">
                              Venue Type
                              </button>
                           </h2>
                           <div id="venueTypeSubMenu" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#venueTypeAccordion">
                              <div class="accordion-body">
                                 <ul class="list-group venue-types">
                                    <li><a data-venue-type="1075 " onclick="scrollToHalfway()">Museum</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Theme Park</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Castles &amp; Stately Homes</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Gardens, Nature &amp; Open Spaces</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Places of Worship</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Zoos &amp; Safari Parks</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Tourist Attractions</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Art Gallery</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Farm</a></li>
                                    <li><a data-venue-type="1075" onclick="scrollToHalfway()">Exhibition and Conference Centre</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Social -->
                     <div class="accordion" id="socialAccordion">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingTwo">
                              <button aria-label="expand social venues button" class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#socialSubMenu" aria-expanded="true" aria-controls="socialSubMenu">
                              Social
                              </button>
                           </h2>
                           <div id="socialSubMenu" class="accordion-collapse show " aria-labelledby="headingTwo" data-bs-parent="#socialAccordion">
                              <div class="accordion-body">
                                 <ul class="list-group venue-types">
                                    <li><a data-venue-type="1115" onclick="scrollToHalfway()">Restaurants</a></li>
                                    <li><a data-venue-type="1115" onclick="scrollToHalfway()">Pubs &amp; Bars</a></li>
                                    <li><a data-venue-type="1115" onclick="scrollToHalfway()">Café, Cafés &amp; Coffee Shops</a></li>
                                    <li><a data-venue-type="1115" onclick="scrollToHalfway()">Takeaways &amp; Fast Food</a></li>
                                    <li><a data-venue-type="1115" onclick="scrollToHalfway()">Nightclubs</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Activities -->
                     <div class="accordion" id="activitiesAccordion">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingThree">
                              <button aria-label="expand activities button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#activitiesSubMenu" aria-expanded="false" aria-controls="activitiesSubMenu">
                              Activities
                              </button>
                           </h2>
                           <div id="activitiesSubMenu" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#activitiesAccordion">
                              <div class="accordion-body">
                                 <ul class="list-group  venue-types">
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Art &amp; Design</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Music &amp; Singing</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Stadiums &amp; Sports Venues</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Sport &amp; Exercise</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Outdoor Activities</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Cinema</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Theatres &amp; Concert Halls</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Casino</a></li>
                                    <li><a data-venue-type="1120" onclick="scrollToHalfway()">Bingo</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Accommodation -->
                     <div class="accordion" id="venueTypeAccordion">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingFour">
                              <button aria-label="expand accomodation menu button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accommodationSubMenu" aria-expanded="false" aria-controls="accommodationSubMenu">
                              Accommodation
                              </button>
                           </h2>
                           <div id="accommodationSubMenu" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#venueTypeAccordion">
                              <div class="accordion-body">
                                 <ul class="list-group venue-types">
                                    <li><a data-venue-type="1128" onclick="scrollToHalfway()">Hotels &amp; Guesthouses</a></li>
                                    <li><a data-venue-type="1128" onclick="scrollToHalfway()">Camping &amp; Caravanning</a></li>
                                    <li><a data-venue-type="1128" onclick="scrollToHalfway()">Self-Catering</a></li>
                                    <li><a data-venue-type="1128" onclick="scrollToHalfway()">Youth Hostels</a></li>
                                    <li><a data-venue-type="1128" onclick="scrollToHalfway()">Respite Care</a></li>
                                 </ul>
                                 <div class="card-footer">Footer</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- results container -->
               <div class="col-lg-10" id="venue-container">
               </div>
            </div>
         </div>
      </div>
      <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
         
         
            let tags = [];
            let searchTerm = '';
            let encTags;
            let encTerm;
            let url;
         
            //method to get the data, encoded params
            const getData = () => {
               encTags = tags.map(tag => encodeURIComponent(tag)).join(",");
               encTerm = encodeURIComponent(searchTerm);
               url = `/venue/search?tags=${encTags}&searchTerm=${encTerm}`;
         
               console.log(url);
               // url = '/venue/search?tags=Museum,Castles%20%26%20Stately%20Homes,Art%20Gallery&searchTerm=';
               console.log(url)
               return fetch(url)
                  .then(response => response.json())
                  .catch(error => {
                     // console.error('Error:', error.message || String(error));
                     throw error;
                  });
            };
         
            // button event listeres , when search input is clicked, update results is cliecked
            const searchInput = document.querySelector('#search-input');
            searchInput.addEventListener('change', (event) => {
               updateSearchCriteria(event.target.value);
            });
         
            // fetch updated data (i.e. update res is clicked
            const updateResultsBtn = document.getElementById('update-results-btn');
            updateResultsBtn.addEventListener('click', () => {
               tags = JSON.parse(sessionStorage.getItem('search_tags'));
               console.log(tags);
               getData().then(data => {
                  detectChanges()
                  renderResults(data)
               });
            });
         
            // get data - this is where we'll add the tags
            const chipList = document.querySelector('#chip-list');
         
         
            // UPdate search term and tags and call get data method
            const updateSearchCriteria = (value) => {
               searchTerm = value.trim();
               tags = JSON.parse(sessionStorage.getItem('search_tags'));
               getData().then(data => {
                  renderResults(data)
               });
            };
         
         
            // Create search results
            const renderResults = (data) => {
               // Get venue container element
               const venueContainer = document.getElementById('venue-container');
         
               // Clear existing search results
               venueContainer.innerHTML = '';
         
               // Create each venue item - some of this needs refactoring
               data.venues.forEach(function(venue) {
                  const venueId = venue.id;
                  const venueName = venue.venue_name;
                  const venueAbout = venue.about;
         
                  const venueElement = document.createElement('div');
                  venueElement.classList.add('ibox');
         
                  const titleElement = document.createElement('div');
                  titleElement.classList.add('ibox-title');
         
                  const venueSummaryElement = document.createElement('div');
                  venueSummaryElement.classList.add('venue-summary');
         
                  const venueNameElement = document.createElement('h2');
                  venueNameElement.textContent = venueName;
         
                  const ratingElement = document.createElement('div');
                  ratingElement.classList.add('rating');
         
                  for (let i = 0; i < 5; i++) {
                     const clipStarElement = document.createElement('div');
                     clipStarElement.classList.add('clip-star');
                     ratingElement.appendChild(clipStarElement);
                  }
         
                  venueSummaryElement.appendChild(venueNameElement);
                  venueSummaryElement.appendChild(ratingElement);
         
                  titleElement.appendChild(venueSummaryElement);
         
                  const contentElement = document.createElement('div');
                  contentElement.classList.add('ibox-content');
         
                  const rowElement = document.createElement('div');
                  rowElement.classList.add('row');
         
                  const leftColumnElement = document.createElement('div');
                  leftColumnElement.classList.add('col-lg-7');
                  leftColumnElement.textContent = venueAbout || "No information available.";
         
                  const rightColumnElement = document.createElement('div');
                  rightColumnElement.classList.add('col-lg-5');
         
                  const photosElement = document.createElement('div');
                  photosElement.classList.add('photos');
         
                  for (let i = 0; i < 4; i++) {
                     const photoLinkElement = document.createElement('a');
                     photoLinkElement.setAttribute('href', '#');
                     const photoElement = document.createElement('img');
                     photoElement.setAttribute('alt', 'image');
                     photoElement.classList.add('feed-photo');
                     photoElement.setAttribute('src', 'https://picsum.photos/100?random');
                     photoLinkElement.appendChild(photoElement);
                     photosElement.appendChild(photoLinkElement);
                  }
         
                  rightColumnElement.appendChild(photosElement);
         
                  rowElement.appendChild(leftColumnElement);
                  rowElement.appendChild(rightColumnElement);
         
                  contentElement.appendChild(rowElement);
         
                  const footerElement = document.createElement('div');
                  footerElement.classList.add('ibox-footer', 'mt-4');
         
                  const accessIconGroupElement = document.createElement('div');
         
                  accessIconGroupElement.classList.add('access-icon-group');
         
                  const wheelchairIconElement = document.createElement('i');
                  wheelchairIconElement.classList.add('fa', 'fa-3x', 'fa-wheelchair');
                  const lowVisionIconElement = document.createElement('i');
                  lowVisionIconElement.classList.add('fa', 'fa-3x', 'fa-low-vision');
                  const viewVenueButtonElement = document.createElement('button');
         viewVenueButtonElement.classList.add('btn', 'btn-success');
         viewVenueButtonElement.innerHTML = '<i class="fa fa-eye"></i> View Venue Details';
         viewVenueButtonElement.style.marginLeft = 'auto';
         viewVenueButtonElement.style.backgroundColor = '#F1C40F';
         viewVenueButtonElement.style.borderColor = 'black';
         viewVenueButtonElement.style.color = 'black';
         
         
                  viewVenueButtonElement.addEventListener('click', () => {
                  window.location.href = `/HomeViewVenue/${venueId}`;
                  });
         
         
                  accessIconGroupElement.appendChild(wheelchairIconElement);
                  accessIconGroupElement.appendChild(lowVisionIconElement);
                  accessIconGroupElement.appendChild(viewVenueButtonElement);
                  footerElement.appendChild(accessIconGroupElement);
                  contentElement.appendChild(footerElement);
                  venueElement.appendChild(titleElement);
                  venueElement.appendChild(contentElement);
                  venueContainer.appendChild(venueElement);
               });
         
               overlayElement.classList.add('d-none');
            };
         
         
         
            // overlay methods
            const overlayElement = document.getElementById('overlay');
         
            const showOverlay = () => {
               overlayElement.classList.remove('d-none');
            }
         
            const hideOverlay = () => {
               overlayElement.classList.add('d-none');
            }
         
            // get data from server
         
            showOverlay()
            getData()
               .then(data => {
                  console.log('ssss');
                  renderResults(data);
                  hideOverlay()
               })
               .catch(error => {
                  // console.error('Error:', error.message || String(error));
                  overlayElement.classList.remove('d-none');
               });
         
         });
         
         const chipList = document.querySelector('.chip-list');
         const venueTypes = document.querySelector('.venue-types');
         let searchTags = sessionStorage.getItem('search_tags');
         let tags = [];
         
         if (searchTags) {
            tags = JSON.parse(searchTags);
         } else {
            sessionStorage.setItem('search_tags', JSON.stringify(tags));
         }
         
         
         const createTagElement = (tag) => {
            const chip = document.createElement('div');
            chip.classList.add('chip');
            chip.innerHTML = `${tag} <span class="close">&times;</span>`;
            chip.setAttribute('data-tag', tag);
            return chip;
         };
         
         
         // INitialise from storage
         tags.forEach(tag => {
            chipList.appendChild(createTagElement(tag));
         });
         
         
         
         // Add the item
         const addTag = (tag) => {
            if (!tags.includes(tag)) {
               tags.push(tag);
               sessionStorage.setItem('search_tags', JSON.stringify(tags));
               chipList.appendChild(createTagElement(tag));
               detectChanges()
            }
         };
         
         
         // Remove tag with data attr, avoids collisions KW
         const removeTag = (tag) => {
            tags = tags.filter(t => t !== tag);
            sessionStorage.setItem('search_tags', JSON.stringify(tags));
            chipList.querySelectorAll('.chip').forEach(chip => {
               const chipTag = chip.getAttribute('data-tag');
               if (chipTag === tag) {
                  chip.remove();
                  detectChanges();
               }
            });
         };
         
         
         
         // Event listener for venue types list
         venueTypes.addEventListener('click', (event) => {
            if (event.target.tagName === 'A') {
               const venueType = event.target.innerText;
               addTag(venueType);
            }
         });
         
         chipList.addEventListener('click', (event) => {
            if (event.target.classList.contains('close')) {
               const tag = event.target.parentNode.getAttribute('data-tag');
               removeTag(tag);
            }
         });
         
         
         // Set loaded search key in session storage when page loads
         // Set on load to same as the search term - can't think of a better solution FIXME
         
         const updateResultsBtn = document.getElementById('update-results-btn');
         if (searchTags) {
            sessionStorage.setItem('loaded', searchTags) //store initial state
         }
         
         // detect changes to search
         const detectChanges = () => {
            const searchTags = sessionStorage.getItem('search_tags');
            const loadedSearchKey = sessionStorage.getItem('loaded');
         
            if (searchTags !== loadedSearchKey) {
               updateResultsBtn.style.display = 'block';
            } else {
               updateResultsBtn.style.display = 'none';
         
            }
         };
      </script>
      <!-- scroll to top button -->
      <script>
         const btnScrollTop = document.querySelector('.btn-scroll-top');
         
         window.addEventListener('scroll', () => {
            if (window.pageYOffset > 0) {
               btnScrollTop.style.opacity = 1;
            } else {
               btnScrollTop.style.opacity = 0;
            }
         });
         
         btnScrollTop.addEventListener('click', () => {
            window.scrollTo({
               top: 0,
               behavior: 'smooth'
            });
         });
         
         
         const btnFindVenues = document.querySelector('.btn-find-venues');
         
         btnFindVenues.addEventListener('click', () => {
         const pageHeight = window.innerHeight;
         window.scrollTo({
         top: pageHeight / 1,
         behavior: 'smooth'
         });
         });

         function scrollToHalfway() {
         const halfwayPosition = window.innerHeight / 1; 
         window.scroll({
            top: halfwayPosition,
            behavior: 'smooth' 
         });
         }

         
         
      </script>
   </body>
</html>