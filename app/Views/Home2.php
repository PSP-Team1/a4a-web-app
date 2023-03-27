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
   <link rel="stylesheet" href="./assets/css/accessiblity.css" />

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
         bottom: 20px;
         right: 20px;
         width: 50px;
         height: 50px;
         background-color: #2ec1cd;
         color: #fff;
         border: none;
         border-radius: 50%;
         font-size: 24px;
         cursor: pointer;
         opacity: 0;
         transition: opacity 0.3s ease-in-out;
      }

      .btn-scroll-top:hover {
         opacity: 1;
      }
   </style>





</head>

<body>
   <?= view('templates/accessibility'); ?>
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

   <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
      <div class="container-fluid">

         <button aria-label="toggle navbar" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
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
               <li class="nav-item me-3">
   <a class="nav-link active btn btn-outline-secondary" aria-current="page" href="/FAQ">FAQ</a>
</li>
            </ul>
         </div>
      </div>
   </nav>

   <div class="container-fluid px-0 fluid-banner sticky-top">
      <div class="container">
         <div class="banner-search">
            <img src="<?= base_url(); ?>/assets/img/Making-Everybody-Welcome.png" alt="Bootstrap" height="80">

            <div class="input-group">
               <input id="search-input" type="text" placeholder="Search for location..." class="form-control search-input">
               <span class="input-group-append"> <button aria-label="search for attractions" type="button" class="search-btn btn btn-primary">
                     <i class="fa fa-map-marker fa-3x text-white"></i>
                  </button>
               </span>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid main-content">

      <div class="container v-search-container pt-2">

         <div class="row">
            <div class="col-lg-2">

               <button aria-label="update search results button" class="btn btn-primary" id="update-results-btn">Update Results <span id="search-changes"></span></button>

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
                           <button aria-label="expand social venues button" class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#socialSubMenu" aria-expanded="true" aria-controls="socialSubMenu">
                              Social
                           </button>
                        </h2>
                        <div id="socialSubMenu" class="accordion-collapse show " aria-labelledby="headingTwo" data-bs-parent="#socialAccordion">
                           <div class="accordion-body">
                              <ul class="list-group venue-types">
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
                           <button aria-label="expand activities button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#activitiesSubMenu" aria-expanded="false" aria-controls="activitiesSubMenu">
                              Activities
                           </button>
                        </h2>
                        <div id="activitiesSubMenu" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#activitiesAccordion">
                           <div class="accordion-body">
                              <ul class="list-group  venue-types">
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
                           <button aria-label="expand accomodation menu button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accommodationSubMenu" aria-expanded="false" aria-controls="accommodationSubMenu">
                              Accommodation
                           </button>
                        </h2>
                        <div id="accommodationSubMenu" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#venueTypeAccordion">
                           <div class="accordion-body">
                              <ul class="list-group venue-types">
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
               volumeIconElement.classList.add('fa', 'fa-3x', 'fa-volume');
               accessIconGroupElement.appendChild(wheelchairIconElement);
               accessIconGroupElement.appendChild(lowVisionIconElement);
               accessIconGroupElement.appendChild(volumeIconElement);
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
   </script>


   <script src="./assets/js/accessibility.js"></script>

</body>

</html>