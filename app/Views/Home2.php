<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <title>Everybody Welcome</title>
   <link href="<?= base_url(); ?>/assets/css/style_theme.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
   <!-- <meta http-equiv="refresh" content="5"> -->

   <link href="<?= base_url(); ?>/assets/css/venueSearch/style.css" rel="stylesheet">


</head>

<body>
   <button type="button" class="btn btn-primary" id="showLoaderBtn">
      Test Loader
   </button>
   <div id="overlay" class="overlay d-none">
      <div class="loader">
         <!-- <h2 class="text-white">Loading...</h3> -->
         <object class="svg-loader" type="image/svg+xml" data="<?= base_url(); ?>/assets/img/vectors/a4a-circles.svg"></object>
      </div>
   </div>

   <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
      <div class="container-fluid">

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse " id="navbarScroll">

            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
               <li class="nav-item me-3">
                  <a class="nav-link active btn btn-primary" aria-current="page" href="<?= base_url() ?>/Login">Login / Register</a>
               </li>
               <li class="nav-item me-3">
                  <a class="nav-link active btn btn-outline-secondary btn-success" aria-current="page" href="#">Affiliates</a>

               </li>
            </ul>
         </div>
      </div>
   </nav>

   <div class="container-fluid px-0 fluid-banner">
      <div class="container">
         <div class="banner-search">
            <img src="<?= base_url(); ?>/assets/img/Everybody-Welcome-logo.png" alt="Bootstrap" height="80">

            <div class="input-group">
               <input type="text" placeholder="Search for location..." class="form-control search-input">
               <span class="input-group-append"> <button type="button" class="search-btn btn btn-primary">
                     <i class="fa fa-map-marker fa-3x text-white"></i>
                  </button>
               </span>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid main-content">

      <div class="container v-search-container pt-5">

         <div class="row">

            <div class="col-lg-2">
               <div class="ibox">


                  <!-- Venue types -->
                  <div class="accordion" id="venueTypeAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#venueTypeSubMenu" aria-expanded="true" aria-controls="venueTypeSubMenu">
                              Venue Type
                           </button>
                        </h2>
                        <div id="venueTypeSubMenu" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#venueTypeAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1075">Museum</a></li>
                                 <li><a href="#" data-venue-type="1075">Theme Park</a></li>
                                 <li><a href="#" data-venue-type="1075">Castles &amp; Stately Homes</a></li>
                                 <li><a href="#" data-venue-type="1075">Gardens, Nature &amp; Open Spaces</a></li>
                                 <li><a href="#" data-venue-type="1075">Places of Worship</a></li>
                                 <li><a href="#" data-venue-type="1075">Zoos &amp; Safari Parks</a></li>
                                 <li><a href="#" data-venue-type="1075">Tourist Attractions</a></li>
                                 <li><a href="#" data-venue-type="1075">Art Gallery</a></li>
                                 <li><a href="#" data-venue-type="1075">Farm</a></li>
                                 <li><a href="#" data-venue-type="1075">Exhibition and Conference Centre</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>



                  <!-- Social -->

                  <div class="accordion" id="socialAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                           <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#socialSubMenu" aria-expanded="true" aria-controls="socialSubMenu">
                              Social
                           </button>
                        </h2>
                        <div id="socialSubMenu" class="accordion-collapse show " aria-labelledby="headingTwo" data-bs-parent="#socialAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1115">Restaurants</a></li>
                                 <li><a href="#" data-venue-type="1115">Pubs &amp; Bars</a></li>
                                 <li><a href="#" data-venue-type="1115">Café, Cafés &amp; Coffee Shops</a></li>
                                 <li><a href="#" data-venue-type="1115">Takeaways &amp; Fast Food</a></li>
                                 <li><a href="#" data-venue-type="1115">Nightclubs</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- Activities -->

                  <div class="accordion" id="activitiesAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#activitiesSubMenu" aria-expanded="false" aria-controls="activitiesSubMenu">
                              Activities
                           </button>
                        </h2>
                        <div id="activitiesSubMenu" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#activitiesAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1120">Art &amp; Design</a></li>
                                 <li><a href="#" data-venue-type="1120">Music &amp; Singing</a></li>
                                 <li><a href="#" data-venue-type="1120">Stadiums &amp; Sports Venues</a></li>
                                 <li><a href="#" data-venue-type="1120">Sport &amp; Exercise</a></li>
                                 <li><a href="#" data-venue-type="1120">Outdoor Activities</a></li>
                                 <li><a href="#" data-venue-type="1120">Cinema</a></li>
                                 <li><a href="#" data-venue-type="1120">Theatres &amp; Concert Halls</a></li>
                                 <li><a href="#" data-venue-type="1120">Casino</a></li>
                                 <li><a href="#" data-venue-type="1120">Bingo</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Accommodation -->

                  <div class="accordion" id="venueTypeAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accommodationSubMenu" aria-expanded="false" aria-controls="accommodationSubMenu">
                              Accommodation
                           </button>
                        </h2>
                        <div id="accommodationSubMenu" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#venueTypeAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1128">Hotels &amp; Guesthouses</a></li>
                                 <li><a href="#" data-venue-type="1128">Camping &amp; Caravanning</a></li>
                                 <li><a href="#" data-venue-type="1128">Self-Catering</a></li>
                                 <li><a href="#" data-venue-type="1128">Youth Hostels</a></li>
                                 <li><a href="#" data-venue-type="1128">Respite Care</a></li>
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


   <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
   </script>
   <script>
      // testing loader
      const overlayElement = document.querySelector('.overlay');
      const showLoaderBtn = document.getElementById('showLoaderBtn');

      showLoaderBtn.addEventListener('click', function() {
         overlayElement.classList.remove('d-none');
      });

      overlayElement.addEventListener('click', function() {
         overlayElement.classList.add('d-none');
      });
   </script>

   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Get overlay element
         const overlayElement = document.getElementById('overlay');

         // Add overlay to the body
         overlayElement.classList.add('d-none');

         // Fetch data from server
         fetch('/venue/search')
            .then(response => response.json())
            .then(data => {
               // Get venue container element
               const venueContainer = document.getElementById('venue-container');

               // Loop through venues and create HTML element for each one
               data.venues.forEach(function(venue) {
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
                  const volumeIconElement = document.createElement('i');
                  volumeIconElement.classList.add('fa', 'fa-3x', 'fa-volume-up');

                  accessIconGroupElement.appendChild(wheelchairIconElement);
                  accessIconGroupElement.appendChild(lowVisionIconElement);
                  accessIconGroupElement.appendChild(volumeIconElement);

                  footerElement.appendChild(accessIconGroupElement);

                  venueElement.appendChild(titleElement);
                  venueElement.appendChild(contentElement);
                  venueElement.appendChild(footerElement);

                  venueContainer.appendChild(venueElement);
               });

               overlayElement.classList.add('d-none');
            })
            .catch(error => {
               console.error('Error:', error.message || String(error));
               overlayElement.classList.remove('d-none');
            });
      })
   </script>
</body>

</html>